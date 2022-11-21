@extends('Shared.Layouts.MasterFront')

@section('head')
@stop

@section('content')
<section class="mx-auto bg-white container" style="color:black; width:80%;">
<h5 class="text-center mb-4 pb-2  fw-bold">Features</h5>
  <p class="text-center mb-5">
    We support event organisers to make great events happen
  </p>

  <div class="row">
    <div class="col-sm-6  mb-4">
      <h6 class="mb-3 text-primary"><i class="icon icon-paper pe-2"></i>Free events are free</h6>
      <p>
        <strong><u>Always free!</u></strong> We only charge when a transaction is processed, so free ticket types, complimentary tickets, invitations and RSVPs are all free!
      </p>
    </div>
    <div class="col-sm-6 mb-4">
      <h6 class="mb-3 text-primary"><i class="icon icon-ticket" pe-2></i> Multiple ticket types</h6>
      <p>
        Create as many paid and free ticket types as you need for your event e.g Ordinary, VIP etc. Keep it simple for your guests by organising the ticket types into groups on your event page
      </p>
    </div>

    <div class="col-sm-6  mb-4">
      <h6 class="mb-3 text-primary"><i class="icon icon-barcode pe-2"></i> Quickly check in event attendees
      </h6>
      <p>
        Use our built-in ticket scanner to quickly checkin your guess. No hassle, No fraud. Just joy of creating great events.
      </p>
    </div>

    <div class="col-sm-6 mb-4">
      <h6 class="mb-3 text-primary"><i class="icon icon-printer pe-2"></i>Need to sell  tickets offline?
      </h6>
      <p>
        No problem. Generate PDF tickets from your dashboard for  free and allow guests to buy directly from you or an outlet. These tickets are equiped with QR codes for easy check in.
      </p>
    </div>

    <div class="col-sm-6  mb-4">
      <h6 class="mb-3 text-primary"><i class="icon icon-mail pe-2"></i> Send event invites
      </h6>
      <p>Create, upload and import contact lists to send out invites to people in your networks.</p>
    </div>

    <div class="col-sm-6  mb-4">
      <h6 class="mb-3 text-primary"><i class="icon-bank pe-2"></i> Payment and Reporting</h6>
      <p>
        After your event ended your funds from tickets sale will be paid to your bank account of your choice after three days. You set the bank details the payment will be made to in the admin dashboard.
      </p>
    </div>
    <div class="row">
<div class="col-sm-12 my-10">
<span class="small">Need more help?</span> <a href="#" class="btn btn-primary">Contact us</a>
  </div>
</div>
</div>
</section>
@stop

@section('footer')

@stop
