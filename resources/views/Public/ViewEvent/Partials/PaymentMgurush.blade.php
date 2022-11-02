<!-- <div class="online_payment"> --!>
      <div class="row">
          <div class="col-md-12">
              <div class="form-group">
                  {!! Form::label('phone-number', trans("Public_ViewEvent.phone_number")) !!}
                  <input required="required" type="text" autocomplete="off" placeholder="091xxxxxxx"
                         class="form-control phone-number" name="phone" size="15" data="number" value="091">
              </div>
          </div>
        </div>

        <div id="card-errors" role="alert"></div>
    </div>

<!-- </div> --!>
<style type="text/css">

    .StripeElement {
        box-sizing: border-box;

        height: 40px;

        padding: 10px 12px;

        border: 1px solid #e0e0e0 !important;
        border-radius: 4px;
        background-color: white;

        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
        margin-bottom: 20px;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }

</style>
