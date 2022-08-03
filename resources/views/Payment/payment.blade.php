@extends('layouts.around-header')

@section('page-title') 
    Payment Page
@endsection
@section('meta-schema')
@endsection
@section('custom-css')
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha256-YLGeXaapI0/5IgZopewRJcFXomhRMlYYjugPLSyNjTY=" crossorigin="anonymous" />
    <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}"></script>

@endsection
@section('main')
<div class="row">
<div class="col-3"></div>
<div class="col-6">
    <div class="accordion pt-4 mb-grid-gutter" id="payment-methods">
                  <div class="accordion-item bg-white shadow">
                     <h3 class="text-center my-3"> Payment </h3> 
                        @if($message = Session::get('error'))
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>Error!</strong> {{ $message }}
                            </div>
                        @endif
  
                        @if($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade {{ Session::has('success') ? 'show' : 'in' }}" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>Success!</strong> {{ $message }}
                            </div>
                        @endif
  
                    <h2 class="accordion-header" id="heading-1">
                      <button class="accordion-button no-indicator" type="button">
                        <div class="form-check w-100" data-bs-toggle="collapse" data-bs-target="#credit-card" aria-expanded="true" aria-controls="credit-card">
                          <input class="form-check-input" type="radio" id="credit-card-radio" name="payment_method" checked="">
                          <label class="form-check-label d-flex align-items-center fs-base text-heading mb-0 mt-1" for="credit-card-radio"><span>Credit Card</span><img class="ms-3" src="{{asset('img/shop/cards.png')}}" alt="Accepted cards" width="130"></label>
                        </div>
                      </button>
                    </h2>
                    <div class="accordion-collapse collapse show" id="credit-card" aria-labelledby="heading-1" data-bs-parent="#payment-methods">
                     <div class="container">
                 @if (Session::has('success'))
                     <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                     </div>
                     @endif

                     <form
                        role="form"
                        action="{{ route('card.charge') }}"
                        method="post"
                         data-amount="{{$total *100}}"
                        data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                        id="payment-form">
                        @csrf
                      <script
                                src="https://checkout.stripe.com/checkout.js" class="stripe-button py-3 " id="payment1234"
                                data-key="{{ env('STRIPE_KEY') }}"
                                data-amount="{{$total  *100}}"
                                data-name="Uniqueproducts"
                                data-description="Uniqueproduct"
                                data-image="https://uniqueproducts.ca/unique/public/uploads/logo/favicon.png"
                                data-locale="auto"
                                data-currency="cad">
                        </script>
                        
                       
                     </form>
                     </div>
           
                    </div>
                  </div>
                  <div class="accordion-item bg-white shadow">
                    <h2 class="accordion-header" id="heading-2">
                      <button class="accordion-button no-indicator" type="button">
                        <div class="form-check w-100" data-bs-toggle="collapse" data-bs-target="#applepay" aria-expanded="false" aria-controls="applepay">
                          <input class="form-check-input" type="radio" id="applepay-radio" name="payment_method">
                          <label class="form-check-label d-flex align-items-center fs-base text-heading mb-0 mt-1" for="applepay-radio"><span>Apple Pay</span><img class="ms-3" src="{{asset('img/shop/applepay.png')}}" alt="applepay" width="40"></label>
                        </div>
                      </button>
                    </h2>
                    <div class="accordion-collapse collapse" id="applepay" aria-labelledby="heading-2" data-bs-parent="#payment-methods">
                      <div class="accordion-body">
                        <p class="fs-ms">By clicking on the button below you will be redirected to your applepay account to complete the payment.</p><a class="d-inline-block" href="#"><img class="d-block" src="{{asset('img/shop/applepay.png')}}" alt="applepay" width="200"></a>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item bg-white shadow">
                    <h2 class="accordion-header" id="heading-3">
                      <button class="accordion-button no-indicator" type="button">
                        <div class="form-check w-100" data-bs-toggle="collapse" data-bs-target="#paypal" aria-expanded="false" aria-controls="paypal">
                          <input class="form-check-input" type="radio" id="paypal-radio" name="payment_method">
                          <label class="form-check-label d-flex align-items-center fs-base text-heading mb-0 mt-1" for="paypal-radio"><span>Paypal</span><img class="ms-3" src="{{asset('img/shop/paypal.png')}}" alt="paypal" width="40"></label>
                        </div>
                      </button>
                    </h2>
                    <div class="accordion-collapse collapse" id="paypal" aria-labelledby="heading-2" data-bs-parent="#payment-methods">
                      <div class="accordion-body">
                        <p class="fs-ms">By clicking on the button below you will be redirected to your paypal account to complete the payment.</p>
                            <!--<form method="post" action="{{ route('processTransaction') }}" >-->
                            
                              <a class="btn btn-primary m-3" href="{{ route('processTransaction') }}">Pay ${{$total}}</a>
<!--@if(\Session::has('error'))-->
<!--        <div class="alert alert-danger">{{ \Session::get('error') }}</div>-->
<!--        {{ \Session::forget('error') }}-->
<!--    @endif-->
<!--    @if(\Session::has('success'))-->
<!--        <div class="alert alert-success">{{ \Session::get('success') }}</div>-->
<!--        {{ \Session::forget('success') }}-->
<!--    @endif-->
                            <!--</form>-->
                      </div>
                    </div>
                  </div>
                 
</div>

<div class="col-3"></div>
 </div>
</main>
 <script>
    paypal.Buttons().render('#paypal-button-container');
    // This function displays Smart Payment Buttons on your web page.
  </script>
  <script>
  paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '{{$total}}'
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        alert('Transaction completed by ' + details.payer.name.given_name);
      });
    }
  }).render('#paypal-button-container');
  //This function displays Smart Payment Buttons on your web page.
</script>
       <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
   <script type="text/javascript">
      $(function() {
    var $form = $(".require-validation");
    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]',
                'input[type=text]', 'input[type=file]',
                'textarea'
            ].join(', '),
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