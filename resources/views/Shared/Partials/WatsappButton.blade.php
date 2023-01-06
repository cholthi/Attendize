{!! Html::script('vendor/floating-whatsapp/floating-wpp.min.js') !!}

{!!Html::style('vendor/floating-whatsapp/floating-wpp.min.css') !!}


<!--Div where the WhatsApp will be rendered-->
<div id="WAButton"></div>

<script type="text/javascript">
   $(function () {
           $('#WAButton').floatingWhatsApp({
               phone: '211917821026', //WhatsApp Business phone number
               headerTitle: 'Chat with us on WhatsApp!', //Popup Title
               popupMessage: 'Hello, how can we help you?', //Popup Message
               showPopup: true, //Enables popup display
               buttonImage: '<img src="{{ asset('vendor/floating-whatsapp/whatsapp.svg') }}" />', //Button Image
               //headerColor: 'crimson', //Custom header color
               //backgroundColor: 'crimson', //Custom background button color
               position: "right", //Position: left | right
               size: '60px'

           });
       });
</script>
