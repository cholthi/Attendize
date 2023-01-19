@extends('Shared.Layouts.MasterFront')

@section('head')
@stop

@section('content')
<div class="container mx-auto" style="color:black;width:90%;">
<div class="card shadow">
          <div class="card-header bg-primary text-white">
            <h2 class="h3 mb-3 px-2 text-center">How to buy a ticket online</h2>
          </div>
          <div class="card-body px-2">
            <ol class="instructions list-unstyled">
              <li class="mb-3">
                <h6>
                  <span>Step 1.</span> <a href="{{route('home')}}" class="text-primary">Find</a> your event in the upcoming event list and click on it.
                </h6>
                <p>
                  <img class="mt-5 mb-5 img-fluid" src="{{asset('assets/images/static/0.png')}}" alt="Find Ticket" title="Find Ticket">
                </p>
              </li>
              <li class="mb-3">
                <h6>
                    Step 2. On the event page, choose the ticket type and quantity of tickets you want to buy and click "Buy Ticket" button.
                </h6>
                <p>
                  <img class="mt-5 mb-5 img-fluid" src="{{asset('assets/images/static/1.png')}}" alt="Tickets" title="Tickets">
                </p>
              </li>
              <li class="mb-3">
                <h6>Step 3. Enter your information to appear in the ticket and click "Continue to payment".</h6>
                <p>
                  <img class="mt-5 mb-5 img-fluid" src="{{asset('assets/images/static/2.png')}}" alt="Payment" title="Payment">
                </p>
              </li>
              <li class="mb-3">
                <h6>Step 4. Choose your payment method of your choice among the provided one and click "Complete Payment".</h6>
                <p>
                  <img class="mt-5 mb-5 img-fluid" src="{{asset('assets/images/static/3.png')}}" alt="Buy">
                </p>
              </li>
              <li class="mb">
                <h6>Step 5. Upon successful payment, you will receive an email from Ticketana with ticket attached to it. You can print it or have the pdf in your phone to show during the event check in.</h6>
                <p>
                  <img class="mt-5 mb-5 img-fluid" src="{{asset('assets/images/static/4.png')}}" alt="Email">
                </p>
              </li>
            </ol>
          </div>
        </div>

</div>
@stop

@section('footer')

@stop
