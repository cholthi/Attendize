    <div class="online_payment">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('card-number', trans("Public_ViewEvent.card_number")) !!}
                    <input required="required" type="text" autocomplete="off" placeholder="**** **** **** ****"
                           class="form-control card-number" name="cn" size="20" data="number">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                    {!! Form::label('card-expiry-month', trans("Public_ViewEvent.expiry_month")) !!}
                    {!! Form::selectRange('card-expiry-month', 1, 12, null, [
                    'class' => 'form-control card-expiry-month',
                    'data' => 'exp_month'
                    ] ) !!}
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    {!! Form::label('card-expiry-year', trans("Public_ViewEvent.expiry_year")) !!}
                    {!! Form::selectRange('card-expiry-year',date('Y'),date('Y')+10,null, [
                    'class' => 'form-control card-expiry-year',
                    'data' => 'exp_year'
                    ] ) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('card-expiry-year', trans("Public_ViewEvent.cvc_number")) !!}
                    <input required="required" placeholder="***" class="form-control card-cvc" data="cvc" name="cvc">
                </div>
            </div>
        </div>

    </div>
