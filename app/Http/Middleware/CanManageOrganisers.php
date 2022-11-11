<?php

namespace App\Http\Middleware;

use App\Models\Organiser;
use Auth;
use Closure;

class CanManageOrganisers
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /** @var $user App\Models\User */
        $user = Auth::user();

        // Normal users should not be able to see organiser views
        if (!$user->can('manage organisers')) {
            if ($this->accountHasNoOrganisers($request)) {
                abort(403, 'No organisers can be found. Please ask your system administrator to finish setup.');
            }

            if($user->can('customize organisers') && ($request->route()->getName() === 'showOrganiserCustomize'
               || $request->route()->getName() === 'postCreateBankDetail'
               || $request->route()->getName() === 'postEditOrganiser') || $request->route()->getName() === 'postEditOrganiserPageDesign') {
               if($user->organiser->id == $request->route('organiser_id')){
               return $next($request);
               }

                return redirect(route('index'));
              }

            // Normal users should not be able to switch between organisers
            return redirect(route('index'));
        }

        return $next($request);
    }

    private function accountHasNoOrganisers($request): bool
    {
        return (Organiser::scope()->count() === 0
            && !($request->route()->getName() === 'showCreateOrganiser')
            && !($request->route()->getName() === 'postCreateOrganiser')
        );
    }
};
