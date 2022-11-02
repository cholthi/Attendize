<h3>@lang("Public_ViewEvent.payment_information")</h3>
@lang("Public_ViewEvent.below_payment_information_header")
@if($event->enable_offline_payments)
<div class="offline_payment_toggle">
    <div class="custom-checkbox">
        @if($payment_gateway === false)
        {{-- Force offline payment if no gateway --}}
        <input type="hidden" name="pay_offline" value="1">
        <input id="pay_offline" type="checkbox" value="1" checked disabled>
        @else
        <input data-toggle="toggle" id="pay_offline" name="pay_offline" type="checkbox" value="1">
        @endif
        <label for="pay_offline">@lang("Public_ViewEvent.pay_using_offline_methods")</label>
    </div>
</div>
<div class="offline_payment" style="display: none;">
    <h5>@lang("Public_ViewEvent.offline_payment_instructions")</h5>
    <div class="well">
        {!! Markdown::convertToHtml($event->offline_payment_instructions) !!}
    </div>
</div>
<style>
    .offline_payment_toggle {
        padding: 20px 0;
    }
</style>
@endif
