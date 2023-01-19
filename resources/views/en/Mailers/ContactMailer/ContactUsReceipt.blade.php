@extends('en.Emails.Layouts.Master')

@section('message_content')
Hello {{$contact_info['full_name']},<br><br>

Your message has been received. Our representative will get to back you shortly.

Your Name: {{$contact_info['full_name']}
Your Email: {{$contact_info['email']}
Your Message: {{$contact_info['message']}

<br><br>
Regards
@stop
