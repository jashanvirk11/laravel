@extends('layouts.around-header')
@section('main')
    <script type="text/javascript">
        function valueChanged() {
            if ($('#acc-create').is(":checked")){
                $('#chekout-form').find("input[type=text],textarea").val("");
                $("#cun").val("India")
            }else{
                location.reload();
            }
                
        }

    </script>
    <style>
        .answer {
            display: none;
        }

        /* .control-group {
          display: inline-block;
          vertical-align: top;
          background: #fff;
          text-align: left;
          box-shadow: 0 1px 2px rgba(0,0,0,0.1);
          padding: 30px;
          width: 200px;
          height: 210px;
          margin: 10px;
        } */

    </style>

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                        <a href="{{ url('/shop') }}">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- address card  -->
    <div class="container">
        @auth
        <h1>Address</h1>
        @if($address != null || $address != '')
        @foreach ($address as $addr)
            <label for="{{ $addr->address_type }}" class="text-dark">{{ $addr->address_type }}</label>
            <input id="{{ $addr->address_type }}" class="deafult_address" name="deafult_address" type="checkbox"
                @if ($addr->is_defualt == 'Y') checked
        @endif value="{{ $addr->id }}" >
        @endforeach
       @endif
       @endauth 
    </div>
    <!-- address card End -->
    <section class="checkout-section spad">
        <div class="container">
            {{-- Login Form --}}
            <div class="row">
                <div class="col-lg-6">
                    <div class="mt-4" id="">
                        <small  class="form-text text-muted">Kindly enter Complete address with Pincode for Logistics/Courier Charges</small>
                    </div>
                </div>
            </div>

            {{-- Login Form --}}

            <div class="checkout-form">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="login-form" id="checkout-login-form" style="display: none;">
                            <form method="POST" action="{{ route('login') }}" id="chekout-login">
                                @csrf
                                <div class="group-input">
                                    <label for="username">Email address *</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="group-input">
                                    <label for="pass">Password *</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="group-input gi-check">
                                    <div class="gi-more">
                                        </label>
                                        <a href="{{ route('password.request') }}" class="forget-pass">Forgot
                                            Password</a>
                                    </div>
                                </div>
                                <button type="submit" id="chekout-login-button" class="site-btn login-btn">Sign In</button>
                            </form>
                            <div class="switch-login">
                                <a href="{{ url('/register') }}" class="or-login">Or Create An Account</a>
                            </div>
                        </div>
                        {{--
                    </div>
                    <div class="col-lg-6"> --}}
                        {{-- @if (!Auth::user())
                            <div class="checkout-content">
                                <a href="{{ url('/login') }}" class="content-btn">Click Here To Login</a>
                            </div>
                        @endif --}}
                        <form id="chekout-form">
                            @csrf
                            <h4 id="form-title">Billing Details</h4>
                            <div class="row">
                                <div class="col-lg-12 form-row">
                                    <label for="fir">Full Name<span>*</span></label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        id="fir" value="{{ $default_address->name ?? '' }}">
                                    <p class="text-danger" id="name"></p>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-lg-12 form-row">
                                    <label for="cun">Country<span>*</span></label>
                                    <input type="text" name="country"
                                        class="form-control @error('country') is-invalid @enderror" id="cun"
                                        value="{{ $default_address->country ?? 'India' }}" readonly>
                                    <p class="text-danger" id="country"></p>
                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-12 p-2 form-row">
                                    <label for="cun">State<span>*</span></label>
                                    <select name="state" id="state" class="form-control">
                                        <option value="" disabled selected>Select</option>
                                        @php $city = App\Model\State::has('cities')->get(); @endphp
                                        @if (count($city) > 0)
                                            @foreach ($city as $item)
                                                <option data-id='{{ $item->id }}' value="{{ $item->id }}"@if($default_address) @if($default_address->states()->id == $item->id)
                                                    id="address_state" selected
                                            @endif @endif>{{ $item->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    <p class="text-danger" id="stateerror"></p>
                                    @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-12 p-2 form-row">
                                    <label for="town">Town / City<span>*</span></label>
                                    <select name="city" id="city" class="form-control">
                                        @auth
                                        @php $state =
                                        App\Model\City::whereState(optional($default_address->states())->id)->get();@endphp
                                        @endauth 
                                                 
                                        @guest
                                        @php $state =
                                        App\Model\City::get();@endphp
                                        @endguest

                                        @if ($state)
                                            @foreach ($state as $item)
                                                <option value="{{ $item->id }}" @if($default_address) @if($default_address->cityies()->id == $item->id)
                                                    id="address_city" selected
                                            @endif @endif>{{ $item->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    <p class="text-danger" id="cityerror"></p>
                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-12 p-2 form-row">
                                    <label for="street">Street Address<span>*</span></label>
                                    <input type="text" name="street"
                                        class="form-control @error('street') is-invalid @enderror" class="street-first"
                                        id="street-first" value="{{ (isset($default_address->address) ? ($default_address->address.' '.$default_address->street)  :'') }} ">
                                    <p class="text-danger" id="street"></p>
                                    @error('street')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-12 form-row">
                                    <label for="zip">PinCode (Required)</label>
                                    <input type="text" name="postcode"
                                        class="form-control @error('postcode') is-invalid @enderror" id="zip"
                                        value="{{ $default_address->postcode ?? '' }}" autocomplete="disabled">
                                    <p class="text-danger" id="postcode"></p>
                                    @error('postcode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 form-row">
                                    <label for="email">Email Address<span>*</span></label>
                                    <input type="text" name="email" id="input-email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ $default_address->email ?? '' }}">
                                    <p class="text-danger" id="email"></p>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 form-row">
                                    <label for="phone">Phone<span>*</span></label>
                                    <input type="text" name="phone_no" id="input-phone"
                                        class="form-control @error('phone_no') is-invalid @enderror"
                                        value="{{ $default_address->phone_no ?? '' }}">
                                    <p class="text-danger" id="phone"></p>
                                    @error('phone_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <div class="create-item">
                                        @if (Auth::user())
                                            <label for="acc-create" style="font-size:18px;">
                                                Add Another Shipping Address ?
                                                <input type="checkbox" id="acc-create" onclick="valueChanged()">
                                                <span class="checkmark"></span>
                                            </label>
                                        @endif
                                        @if (!Auth::user())
                                            <label for="acc-guest" style="font-size:18px;" class="m-3">
                                                Checkout As Guest ?
                                                <input type="checkbox" id="acc-guest" checked="checked">
                                                <span class="checkmark"></span>
                                            </label>
                                        @endif
                                    </div>
                                </div>
                            </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Total</span></li>
                                    
                                    @foreach ($cart as $item)
                                        @if ($loop->first)
                                           <input type="hidden" name="" class="p_id" value="{{ $item->id }}">
                                        @endif
                                        <li class="fw-normal">{{ $item->product_name }} x {{ $item->qty }} <span>Rs.
                                                {{ $item->price }}</span></li>
                                        <input type="number" id="product_id" name="cart_id[]" value="{{ $item->id }}"
                                            hidden>
                                        <input type="number" id="product_id" name="product_id[]"
                                            value="{{ $item->product_id }}" hidden>
                                        <input type="text" name="qty[]" id="" value="{{ $item->qty }}" hidden>
                                    @endforeach
                                    {{-- <li class="fw-normal">Subtotal x {{ $item->qty }}
                                        <span>Rs. {{ $total }}</span>
                                    </li> --}}
                                    <li class="fw-normal"> GST <span>Rs.
                                            {{ number_format($gst,2) }}</span></li>
                                    @if (!empty($offer))
                                    
                                        @if ($total > $offer->option_value)
                                            <li class="fw-normal">Logistics Cost
                                                 
                                                   <span id="logistic-cost"><strike>Rs.{{ $deliverycharg }}</strike></span>
                                                
                                                   
                                                
                                                 <input type="hidden" name="delivery_charg" id="delivery_charg" value="0">
                                            </li>
                                        @else
                                            <li class="fw-normal">Logistics Cost 
                                                <span id="logistic-cost">Rs.
                                                    {{ $deliverycharg }}
                                                </span>
                                                <input type="hidden" name="delivery_charg" id="delivery_charg" value="{{ $deliverycharg ?? '' }}">
                                            </li>
                                        @endif
                                    @else
                                        <li class="fw-normal">Logistics Cost <span id="logistic-cost">Rs.
                                                {{ $deliverycharg }}</span></li>
                                        <input type="hidden" name="delivery_charg" id="delivery_charg" value="{{ $deliverycharg ?? '' }}">

                                    @endif
                                    <li class="total-price"> Subtotal <span id="logistic-subtotal">Rs.
                                            {{ $product_price }}</span></li>
                                    <li class="total-price">Total (inclusive GST) <span id="logistic-total">Rs.
                                            {{ $finaltotalWithDelivery }}</span></li>
                                    <input type="hidden" name="total" id="total" value="{{ $finaltotalWithDelivery ?? '' }}">
                                    <input type="hidden" name="gst" id="gst" value="{{ number_format($gst,2) ?? '' }}">
                                </ul>
                                <div class="payment-check">                                    
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-0.5"></div>
                                        <div class="col-md-2">
                                            <div class="pc-item" style="display: none">
                                                <label for="pc-check">
                                                    COD
                                                    <input type="radio" name="payment_type" class="payment_type" value="cod"
                                                        id="pc-check" disabled>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="pc-item">
                                                <label for="pc-paypal">                                                    
                                                    <input type="radio" name="payment_type" class="payment_type"
                                                        value="razorpay" id="pc-paypal" checked hidden>
                                                    <span class="checkmark" hidden></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            @error('payment_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <rong>{{ $message }}</rong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn" id="rzp-button1">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
    <script type="text/javascript">
        $('.payment_type').click(function() {
            $('.payment_type').not(this).prop('checked', false);
        });

    </script>
    <script>
        $(document).on('click', '.deafult_address', function() {
            $('.deafult_address').not(this).prop('checked', false);
        });

    </script>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
       
         var mainsite = "{{ url('/') }}";
        $(window).on('load click', function() {
            var user = "{{ Auth::check() }}";
            if (user == 0) {
                if ($('#acc-guest').is(":checked")) {
                    $('.form-row').show();
                    $('#form-title').show();
                    $('#checkout-login-form').hide();
                } else {
                    $('#checkout-login-form').show();
                    $('#form-title').hide();
                    $('.form-row').hide();
                }
            } else {
                $('#checkout-login-form').hide();
               
                
            }
             
                
        });
        $('body').on('click', '#chekout-login-button', function(e) {
            //e.preventDefault();
            $('#chekout-login').submit();
        });
        $('body').on('click', '#rzp-button1', function(e) {
            e.preventDefault();
            $('.payment_type').prop
            var total_amount = '{{ $finaltotalWithDelivery * 100 }}',
            //var totalamount = $("#total").val();
            //var total_amount = totalamount * 100;
                options = {
                    "key": "rzp_live_o9d0VAR1saVXvl", // Enter the Key ID generated from the Dashboard
                    //"key": "rzp_test_Gs8a5mxc82IKyH",
                    "amount": parseFloat(
                        total_amount
                    ), // Amount is in currency subunits. Default currency is INR. Hence, 10 refers to 1000 paise
                    "currency": "INR",
                    "name": "RuralPure",
                    "description": "Test Transaction",
                    "image": "https://www.nicesnippets.com/image/imgpsh_fullsize.png",
                    "order_id": "", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                    "handler": function(response) {
                        var form = $('#chekout-form');
                        console.log(response);
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('pay') }}",
                            data: form.serialize() + `&payment_id=${response.razorpay_payment_id}`,
                            success: function(data) {
                                window.location.href = "thankyou";
                            }
                        });
                    },
                    "prefill": {
                        "name": $("#fir").val(),
                        "email": $("#input-email").val(),
                        "contact": $("#input-phone").val()
                    },
                    "notes": {
                        "address": "test test"
                    },
                    "theme": {
                        "color": "#F37254"
                    }
                };

            function validate() {
                var form = $('#chekout-form');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "{{ route('validate') }}",
                    data: form.serialize(),
                    success: function(data) {
                        var rzp1 = new Razorpay(options);
                        rzp1.open();
                    },
                    error: function(errors) {
                        console.log(errors.responseJSON.errors);
                         $('.text-danger').empty();
                        if (errors.responseJSON.errors.name != '') {
                            $('#name').html(errors.responseJSON.errors.name);
                        }
                        if (errors.responseJSON.errors.country != '') {
                            $('#country').html(errors.responseJSON.errors.country);
                        }
                        if (errors.responseJSON.errors.street != '') {
                            $('#street').html(errors.responseJSON.errors.street);
                        }
                        if (errors.responseJSON.errors.postcode != '') {
                            $('#postcode').html(errors.responseJSON.errors.postcode);
                        }
                        if (errors.responseJSON.errors.city != '') {
                            $('#town').html(errors.responseJSON.errors.city);
                        }
                        if (errors.responseJSON.errors.email != '') {
                            $('#email').html(errors.responseJSON.errors.email);
                        }
                        if (errors.responseJSON.errors.phone_no != '') {
                            $('#phone').html(errors.responseJSON.errors.phone_no);
                        }
                        if (errors.responseJSON.errors.city != '') {
                            $('#cityerror').html(errors.responseJSON.errors.city);
                        }
                        if (errors.responseJSON.errors.state != '') {
                            $('#stateerror').html(errors.responseJSON.errors.state);
                        }
                    }
                });
            }
            if ($('.payment_type').prop('checked') == true) {
                $('.text-danger').hide();
                $('#chekout-form').submit();
            } else {
                validate();
            }
        });
        $('#state').change(function() {
            var id = $(this).children("option:selected").attr('data-id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "GET",
                url: `city/${id}`,
                success: function(data) {
                    console.log(data);      
                    var len = data.length;
                    $('#city').empty();
                    for (var i = 0; i < len; i++) {
                        var name = data[i].name;
                        var id = data[i].id;
                        var option = '<option value="' +  id + '">' + name +
                            '</option>';
                        $('#city').append(option);
                    }
                }
            });
        });
        
        $('input[name="deafult_address"]').click(function() {
            var id = $(this).val();
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "GET",
                url: `address/${id}`,
                success: function(data) {
                    console.log(data);
                    $('#fir').val(data.name);
                    $('#input-email').val(data.email);
                    $('#input-address').val(data.address);
                    $('#cun').val(data.country);
                    $('#zip').val(data.postcode);
                    $('#input-phone').val(data.phone_no);
                    $('#street-first').val(data.street);
                    $('#address_state').html(data.state.name);
                    $('#address_city').html(data.city.name);
                    $('#address_state').val(data.state.id);
                    $('#address_city').val(data.city.id);
                    var chekweight = "{{ $allproductweight }}";
                    var productWeight = "{{ $allproductweight }}";
                    var pincode= data.postcode;
                    if (chekweight > 0.5 && chekweight < 1) {
                        productWeight = 1;
                    } else if (chekweight <= 0.5) {

                        productWeight = 0.5;

                    } else {

                        productWeight = "{{ number_format($allproductweight) }}";
                    }

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "GET",
                        url: "https://apiv2.shiprocket.in/v1/open/courier/serviceability?pickup_postcode=305801&delivery_postcode=" +
                            pincode + "&weight=" + productWeight +
                            "&cod=1&declared_value=1",

                        success: function(resultData) {
                            if (resultData.status == 404) {
                                jQuery('#postcode').html(" Pincode not serviceable")
                                    .removeClass('text-success')
                                    .addClass('text-danger');
                                $('#rzp-button1').attr('disabled', 'disabled');
                            } else {

                                
                                if (pincode != '') {
                                    price = parseFloat(resultData.data.rates.Basic.surface
                                        .cod_charges.max);
                                    calPrice = ((productWeight * price) / 0.5);
                                    var p_id = $('.p_id').val();
                                    let deliveryChargOld =  jQuery('#delivery_charg').val();
                                    let deliveryTotal =  jQuery('#total').val();
                                    let freeshiping = "{{$freeshiping}}";
                                    console.log(freeshiping);
                                    if(freeshiping==0){
                                        if(deliveryChargOld != calPrice){
                                            $.ajax({
                                                type: "PUT",
                                                url: `${mainsite}/check-out/${p_id}`,
                                                data: {
                                                    p_id: p_id,
                                                    initial_dilevery_charg: calPrice,
                                                },
                                                success: function(resultData) {
                                                    console.log(resultData);
                                                
                                                    location.reload();
                                                },
                                                error: function(textStatus, errorThrown) {
                                                    
                                                    console.log(pincode);
                                                    location.reload();
                                                }
                                            });
                                        }
                                    }        
                                    jQuery('#postcode').html(" Pincode serviceable")
                                         .removeClass('text-danger').addClass('text-success');
                                    jQuery('#logistic-cost').html("Rs. " + calPrice )

                                    
                                     if(freeshiping==0){
                                        deliveryTotal = parseFloat(deliveryTotal) - parseFloat(deliveryChargOld);
                                        let newDeliveryTotal =parseFloat(deliveryTotal)  + parseFloat(calPrice)
                                        jQuery('#logistic-cost').html("Rs. " + calPrice )
                                        jQuery('#total').val(newDeliveryTotal);
                                        jQuery('#logistic-total').html("Rs. " + newDeliveryTotal)
                                    }else{
                                        jQuery('#logistic-cost').html("<strike>Rs. " + calPrice + "</strike>")
                                    }
                                     //let deliveryCharg =  jQuery('#total').val();
                                    //total
                                    // jQuery('#postcode').html("pincode Available")
                                    //     .removeClass('text-danger').addClass(
                                    //         'text-success');
                                    $('#rzp-button1').removeAttr('disabled', 'disabled');
                                }
                            }
                        },
                        error: function(textStatus, errorThrown) {
                            console.log(pincode);
                            if (pincode != '') {
                                jQuery('#postcode').html(" Pincode is not valid")
                                    .removeClass('text-success')
                                    .addClass('text-danger');
                                $('#rzp-button1').attr('disabled', 'disabled');
                            } else {
                                jQuery('#postcode').empty();
                                jQuery('#postcode').html("Pincode is Required").addClass(
                                    'text-danger');
                                $('#rzp-button1').attr('disabled', 'disabled');
                            }
                        }
                    });
                }
            });
        });

    </script>
    @push('script')
        <script>
            $(function(){ 
            var mainsite = "{{ url('/') }}";
            
            $("#zip").keyup( function(e) {
                $('#addtocartbtn').attr('disabled', 'disabled');
                var event = $(this);
                var pincode = $('#zip').val();
                console.log(pincode);
                if(pincode.length < 6){
                    return false;
                }
                var chekweight = "{{ $allproductweight }}";
                var productWeight = "{{ $allproductweight }}";
                console.log("chekweight",chekweight)
                console.log("productWeight",productWeight)
                if (chekweight > 0.5 && chekweight < 1) {
                    productWeight = 1;
                } else if (chekweight <= 0.5) {

                    productWeight = 0.5;

                } else {

                    productWeight = "{{ ceil($allproductweight) }}";
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "GET",
                    url: "https://apiv2.shiprocket.in/v1/open/courier/serviceability?pickup_postcode=305801&delivery_postcode=" +
                        pincode + "&weight=" + productWeight + "&cod=1&declared_value=1",

                    success: function(resultData) {
                        console.log(resultData);
                        if (resultData.status == 404) {
                            jQuery('#postcode').html(" Pincode not serviceable").removeClass('text-success')
                                .addClass('text-danger');
                            $('#rzp-button1').attr('disabled', 'disabled');
                        } else {
                            if (pincode != '') {
                                price = parseFloat(resultData.data.rates.Basic.surface.cod_charges.max);
                                calPrice = ((productWeight * price) / 0.5);
                                var p_id = $('.p_id').val();
                               let deliveryChargOld =  jQuery('#delivery_charg').val();
                                let deliveryTotal =  jQuery('#total').val();
                                let freeshiping = "{{$freeshiping}}";
                                console.log("freeshiping:",freeshiping);
                                    if(freeshiping==0){
                                        if(deliveryChargOld != calPrice){
                                            $.ajax({
                                                type: "PUT",
                                                url: `${mainsite}/check-out/${p_id}`,
                                                data: {
                                                    p_id: p_id,
                                                    initial_dilevery_charg: calPrice,
                                                },
                                                success: function(resultData) {
                                                    console.log(resultData);
                                                
                                                    location.reload();
                                                },
                                                error: function(textStatus, errorThrown) {
                                                    
                                                    console.log(pincode);
                                                    location.reload();
                                                }
                                            });
                                        }
                                        
                                    }
                                    
                                jQuery('#postcode').html(" Pincode serviceable")
                                     .removeClass('text-danger').addClass('text-success');
                                
                                    
                                    if(freeshiping==0){
                                        deliveryTotal = parseFloat(deliveryTotal) - parseFloat(deliveryChargOld);
                                        let newDeliveryTotal =parseFloat(deliveryTotal)  + parseFloat(calPrice)
                                        jQuery('#logistic-cost').html("Rs. " + calPrice )
                                        jQuery('#total').val(newDeliveryTotal);
                                        jQuery('#logistic-total').html("Rs. " + newDeliveryTotal)
                                    }else{
                                        jQuery('#logistic-cost').html("<strike>Rs. " + calPrice + "</strike>")
                                    }
                                    
                                //jQuery('#postcode').html("pincode Available")
                                //    .removeClass('text-danger').addClass('text-success');
                                $('#rzp-button1').removeAttr('disabled', 'disabled');
                            }
                        }
                    },
                    error: function(textStatus, errorThrown) {
                        console.log(pincode);
                        if (pincode != '') {
                            jQuery('#postcode').html(" Pincode is not valid").removeClass('text-success')
                                .addClass('text-danger');
                            $('#rzp-button1').attr('disabled', 'disabled');
                        } else {
                            jQuery('#postcode').empty();
                            jQuery('#postcode').html("Pincode is Required").addClass('text-danger');
                            $('#rzp-button1').attr('disabled', 'disabled');
                        }
                    }
                });
            });
            $("#zip").keyup()
                //setTimeout(function(){ $("#zip").keyup(); }, 3000);
            });
        </script>
    @endpush
@endsection
