
@extends('Shared.Layouts.MasterFront')

@section('head')
@stop
@section('content')
<div class="container bg-white mt-3" style="height:100vh;">
	<h5 class="card-header mb-5 ms-5">We are happy to talk to you.</h5>
	@foreach (['danger', 'warning', 'success', 'info'] as $key)
 @if(Session::has($key))
     <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
 @endif
@endforeach
{!! Form::open(array('url' => route('postContactUs'))) !!}
	<div class="row text-black">
		<div class="col-sm-6">
			<div class="card ms-5">
				<div class="card-body">
					<div class="mb-3">
						<label for="ContactName" class="form-label">Your Name</label>
						<input type="text" class="form-control" id="ContactName" name="full_name">
					</div>
					<div class="mb-3">
            <label for="ContactEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="ContactEmail" placeholder="name@example.com" name="email">
          </div>
					<div class="form-outline mb-3">
						<label class="form-label" for="contactMessage">Message</label>
           <textarea class="form-control" id="contactMessage" rows="6" name="message"></textarea>
				 </div>
				 <button type="submit" class="btn btn-primary btn-block mb-4">
    Submit your Message
  </button>
			</div>
		</div>
	</div>
		<div class="col-sm-6">
			<div class="card">
				<img class="img-fluid" src="{{asset('assets/images/static/contact_us.svg')}}" class="card-img top" alt="contact us"/>
			</div>
		</div>
	</div>
{!! Form::close() !!}
</div>
@stop
