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

        $recipients = [$contact_info['email'],'chol@ticketana.com','sales@ticketana.com'];
      foreach($recipients as $recipient)
       {
        Mail::send('en.Mailers.ContactMailer.ContactUsReceipt', $data, function ($message) use ($recipient) {
            $message->to($recipient);
            $message->subject("Thank you! Your message has been received");
        });
      }

    }


}
