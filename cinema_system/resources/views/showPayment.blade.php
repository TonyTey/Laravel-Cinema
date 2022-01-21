@extends('layout')
@section('content')
@if(Session::has('success'))
    <div class="alert alert-success" role="alert" style="margin-top: 4.4%;">
        {{Session::get('success')}}
    </div>
@endif
<script>
function cal() {
    var name = document.getElementsByName('subtotal[]');
    var subtotal = 0;
    var tax = 0;
    var total = 0;
    var cboxes = document.getElementsByName('cid[]');
    var len = cboxes.length;
    for (var i = 0; i < len; i++) {
        if (cboxes[i].checked) {
            subtotal = parseFloat(name[i].value) + parseFloat(subtotal);
        }
    }
    document.getElementById('sub').value = subtotal.toFixed(2);
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container mt-3" style="">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <table class="table table-bordered">
                <h3 class="text-center p-3">Payment List</h3>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Movie Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Quantity</th>
                        <th>Seat Number</th>
                        <th>Food Name</th>
                        <th>Total Amount(RM)</th>
                    </tr>
                </thead>
                <form action="{{ route('payment.post') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                    @csrf
                    <tbody>
                    @foreach($payments as $payment)
                        <tr>
                            <td><input type="checkbox" name="cid[]" id="cid[]" value="{{$payment->id}}" onclick="cal()"  checked disabled><input type="hidden" name="id" value="{{$payment->id}}"></td>
                            <td style="word-wrap: break-word;"><input type="hidden" name="paymentID" value="{{$payment->id}}">{{$payment->movieName}}</td>
                            <td>{{$payment->date}}</td>
                            <td>{{$payment->time}}</td>
                            <td>{{$payment->quantityTicket}}</td>
                            <td>{{$payment->seatNo}}</td>
                            <td>{{$payment->foodName}}</td>
                            <td><input type="text" value="{{$payment->totalAmount}}" name="sub" id="sub" size="7" readonly></td>
                        </tr>
                    @endforeach

                    </tbody>
            </table>
            <div class="col-sm-1"></div>

            <div class="col-sm-12">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-default credit-card-box">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-3" style="height: 100% ;display-inline: block;">
                                        <h3>Card Payment</h3>
                                    </div>
                                    <div class="col-1"></div>
                                    <div class="col-3">
                                        <img src="https://www.visa.com.my/dam/VCOM/regional/lac/ENG/Default/Partner%20With%20Us/Payment%20Technology/visapos/full-color-800x450.jpg" class="img-fluid" style="width: 70px;height: 60px;">
                                    </div>
                                    <div class="col-3">
                                        <img style="width: 80px;height: 60px;" src="data:image/png;base64,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" class="img-fluid">
                                    </div>
                                    <div class="col-2"></div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <br>
                                <div class='form-row row'>
                                    <div class='col-xs-4 col-md-4 form-group required'>
                                    
                                        <label class='control-label'>Name on Card</label>
                                        <input class='form-control' size='4' type='text' >
                                    
                                    </div>
                                    <div class='col-xs-5 col-md-5 form-group required'>
                                        <label class='control-label'>Card Number</label>
                                        <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                                    </div>
                                    <div class='col-xs-3 col-md-3 form-group cvc required'>
                                        <label class='control-label'>CVC</label>
                                        <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                                    </div>
                                </div>
                                <div class='form-row row'>
                                    <div class='col-xs-12 col-md-6 form-group expiration required'>
                                        <label class='control-label'>Expiration Month</label>
                                        <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-6 form-group expiration required'>
                                        <label class='control-label'>Expiration Year</label>
                                        <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                                    </div>
                                </div>
                                {{--
                                    <div class='form-row row'>
                                        <div class='col-md-12 error form-group hide'>
                                            <div class='alert-danger alert'>Please correct the errors and try again.</div>
                                        </div>
                                    </div> 
                                --}}
                                <div class="form-row row">
                                    <div class="col-xs-6">
                                        <button class="btn btn-danger btn-xs btn-block" type="reset">Cancel</button>
                                    </div>
                                    <div class="col-xs-6">
                                        <button class="btn btn-primary btn-xs btn-block" type="submit">Pay Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </br>
            </div>
        </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
$(function() {
  var $form = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form = $(".require-validation"),
    inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]', 'textarea'].join(', '),
    $inputs = $form.find('.required').find(inputSelector),
    $errorMessage = $form.find('div.error'),
    valid = true;
    $errorMessage.addClass('hide');
    $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
        var $input = $(el);
        if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
        }
    });
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
          number: $('.card-number').val(),
          cvc: $('.card-cvc').val(),
          exp_month: $('.card-expiry-month').val(),
          exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  });

  function stripeResponseHandler(status, response) {
      if (response.error) {
          $('.error')
              .removeClass('hide')
              .find('.alert')
              .text(response.error.message);
      } else {
          /* token contains id, last4, and card type */
          var token = response['id'];
          $form.find('input[type=text]').empty();
          $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
          $form.get(0).submit();
      }
  }
});

</script>
@endsection