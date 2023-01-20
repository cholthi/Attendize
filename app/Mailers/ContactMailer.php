<?php

namespace App\Mailers;

use App\Models\Message;
use Carbon\Carbon;
use Log;
use Mail;


class ContactMailer extends Mailer
{

    public function sendContactReciept($contact_info)
    {

        Log::info("Received message from: " . $contact_info['email']);

        $data = [
            'contact_info' => $contact_info,
        ];

        $cc = ['chol@ticketana.com','sales@ticketana.com'];

        Mail::send('en.Mailers.ContactMailer.ContactUsReceipt', $data, function ($message) use ($cc) {
            $message->to($contact_info['email']);
            $message->cc($cc);
            $message->subject("Thank you! Your message has been received");
        });

      return true;

    }


}
