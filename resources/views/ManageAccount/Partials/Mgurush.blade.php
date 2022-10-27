<section class="payment_gateway_options" id="gateway_{{$payment_gateway['id']}}">
    <h4>@lang("ManageAccount.mgurush_settings")</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('mgurush[accessKey]', trans("ManageAccount.mgurush_access_key"), array('class'=>'control-label ')) !!}
                {!! Form::text('mgurush[accessKey]', $account->getGatewayConfigVal($payment_gateway['id'], 'accessKey'),[ 'class'=>'form-control'])  !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('secretKey', trans("ManageAccount.mgurush_secret_key"), array('class'=>'control-label ')) !!}
                {!! Form::text('mgurush[secretKey]', $account->getGatewayConfigVal($payment_gateway['id'], 'secretKey'),[ 'class'=>'form-control'])  !!}
            </div>
        </div>
    </div>
</section>
