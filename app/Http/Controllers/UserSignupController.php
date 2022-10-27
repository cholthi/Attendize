<?php

namespace App\Http\Controllers;

use Redirect;
use App\Attendize\Utils;
use App\Models\Account;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Hash;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Mail;
use Services\Captcha\Factory;

class UserSignupController extends Controller
{
    protected $auth;
    protected $captchaService;

    public function __construct(Guard $auth)
    {
        if (Account::count() > 0 && !Utils::isAttendize()) {
            return redirect()->route('login')->send();
        }

        $this->auth = $auth;

        $captchaConfig = config('attendize.captcha');
        if ($captchaConfig["captcha_is_on"]) {
            $this->captchaService = Factory::create($captchaConfig);
        }

        $this->middleware('guest');
    }

    public function showSignup()
    {
        $is_attendize = Utils::isAttendize();
        return view('Public.LoginAndRegister.Signup', compact('is_attendize'));
    }

    /**
     * Creates an account.
     *
     * @param Request $request
     *
     * @return Redirect
     */
    public function postSignup(Request $request)
    {
        $is_attendize = Utils::isAttendizeCloud();
        $this->validate($request, [
            'email'        => 'required|email|unique:users',
            'password'     => 'required|min:8|confirmed',
            'first_name'   => 'required',
            'last_name'   => 'required',
            'terms_agreed' => $is_attendize ? 'required' : ''
        ]);

        if (is_object($this->captchaService)) {
            if (!$this->captchaService->isHuman($request)) {
                return Redirect::back()
                    ->with(['message' => trans("Controllers.incorrect_captcha"), 'failed' => true])
                    ->withInput();
            }
        }

        $account_data = $request->only(['email', 'first_name', 'last_name']);
        $account_data['currency_id'] = config('attendize.default_currency');
        $account_data['timezone_id'] = config('attendize.default_timezone');
        $account = Account::create($account_data);

        $user = new User();
        $user_data = $request->only(['email', 'first_name', 'last_name']);
        $user_data['password'] = Hash::make($request->get('password'));
        $user_data['account_id'] = $account->id;
        $user_data['is_parent'] = 1;
        $user_data['is_registered'] = 1;
        $user = User::create($user_data);

        // We need to assign the first ever user as super admin to be able to add the first organiser
        if ($request->get('first_run') === 'yup') {
            $user->assignRole('super admin');
        }

        if ($is_attendize) {
            // TODO: Do this async?
            Mail::send('Emails.ConfirmEmail',
                ['first_name' => $user->first_name, 'confirmation_code' => $user->confirmation_code],
                function ($message) use ($request) {
                    $message->to($request->get('email'), $request->get('first_name'))
                        ->subject(trans("Email.attendize_register"));
                });
        }

        session()->flash('message', 'Success! You can now login.');

        return redirect('login');
    }
    
    public function postSignupv2(Request $request)
    {
        $is_attendize = Utils::isAttendizeCloud();
        $this->validate($request, [
            'email'        => 'required|email|unique:users',
            'password'     => 'required|min:8|confirmed',
            'first_name'   => 'required',
            'last_name'   => 'required',
            'terms_agreed' => $is_attendize ? 'required' : ''
        ]);

        if (is_object($this->captchaService)) {
            if (!$this->captchaService->isHuman($request)) {
                return Redirect::back()
                    ->with(['message' => trans("Controllers.incorrect_captcha"), 'failed' => true])
                    ->withInput();
            }
        }
        /*
        $account_data = $request->only(['email', 'first_name', 'last_name']);
        $account_data['currency_id'] = config('attendize.default_currency');
        $account_data['timezone_id'] = config('attendize.default_timezone');
        $account = Account::create($account_data);
        */

        $user = new User();
        $user_data = $request->only(['email', 'first_name', 'last_name']);
        $user_data['password'] = Hash::make($request->get('password'));
        $user_data['account_id'] = 1;
        $user_data['is_parent'] = 0;
        $user_data['is_registered'] = 1;
        $user_data['organiser_id']  = 0;
        $user = User::create($user_data);

        //assign non super admin user a default role `user`
        // $manageEvents = Permission::findByName('manage events', 'web');
        $assignedRole = Role::findByName('user');
        $user->assignRole($assignedRole);
        $user->givePermissionTo($user->getAllPermissions());
        //Signup user acts as the admin of thier organisers and can manage events of the organiser
        // $user->givePermissionTo($manageEvents);

        if ($is_attendize) {
            // TODO: Do this async?
            Mail::send('en.Emails.ConfirmEmail',
                ['first_name' => $user->first_name, 'confirmation_code' => $user->confirmation_code],
                function ($message) use ($request) {
                    $message->to($request->get('email'), $request->get('first_name'))
                        ->subject(trans("Email.attendize_register"));
                });
        }

        session()->flash('message', 'Success! You can now login.');

        return redirect()->route('showCreateOrganiser');
    }


    /**
     * Confirm a user email
     *
     * @param $confirmation_code
     * @return mixed
     */
    public function confirmEmail($confirmation_code)
    {
        $user = User::whereConfirmationCode($confirmation_code)->first();

        if (!$user) {
            return view('Public.Errors.Generic', [
                'message' => trans("Controllers.confirmation_malformed"),
            ]);
        }

        $user->is_confirmed = 1;
        $user->confirmation_code = $confirmation_code;
        $user->save();

        session()->flash('message', trans("Controllers.confirmation_successful"));

        return redirect()->route('login');
    }
}
