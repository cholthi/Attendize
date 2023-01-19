<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Mailers\ContactMailer;

class ContactUsController extends Controller
{
    /**
     * Show the public home page with events list
     *
     * @return View
     */
    public function showContactPage(Request $request)
    {
        return view('Public.ContactPage.ContactUspage');
    }

    public function postContactPage(Request $request)
    {
      //dd($request->all());
      $contact_info = [];
      if ($request->has('full_name') && empty($request->get('full_name'))){
        $request->session()->flash('danger', 'The full name can not be empty!');
        return redirect()->back();
      }
      $contact_info['full_name'] = $request->get('full_name');

      if ($request->has('email') && empty($request->get('email'))){
        $request->session()->flash('danger', 'The email can not be empty!');
        return redirect()->back();
      }
      $contact_info['email'] = $request->get('email');

      if ($request->has('message') && empty($request->get('message'))){
        $request->session()->flash('danger', 'The message can not be empty!');
        return redirect()->back();
      }
      $contact_info['message'] = $request->get('message');

      $contact_mailer = new ContactMailer($contact_info);
      if($contact_mailer->sendContactReciept($contact_info)){
      $request->session()->flash('success', 'Record successfully added!');
      return redirect()->back();
    }
    $request->session()->flash('danger', 'There was a problem, Please try again');
    return redirect()->back();
    }

}
