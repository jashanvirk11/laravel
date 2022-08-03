@extends('layouts.around-header')
@section('page-title') 
    Checkout Page
@endsection
@section('meta-schema')
@endsection
@section('custom-css')
<style>

    .ai-x-circle{
        color:red;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>
@endsection
@section('main')
       <!-- Page content-->
       @php
       $total = 0;
       @endphp
    @if(!$cart->isEmpty())
      
        <div class="container">
            <form id="chekout-form" action="{{route('stripe.payment')}}" method="post" class="sidebar-enabled sidebar-end" >
                @csrf
                <div class="row">
            <!-- Content-->
            <div class="col-lg-7 content py-4">
              <!--<nav aria-label="breadcrumb">-->
              <!--  <ol class="py-1 my-2 breadcrumb">-->
              <!--    <li class="breadcrumb-item"><a href="index.html">Home</a></li>-->
              <!--    <li class="breadcrumb-item"><a href="shop-ls.html">Shop</a>-->
              <!--    </li>-->
              <!--    <li class="breadcrumb-item active" aria-current="page">Checkout</li>-->
              <!--  </ol>-->
              <!--</nav>-->
              <!--<center><h1 class="mb-3 pb-4">Checkout</h1></center>-->
              <!--<div class="alert d-flex alert-info fs-md mb-5" role="alert"><i class="ai-alert-circle fs-xl me-3"></i>-->
              <!--  <div>Have a coupon code? <a href='#modal-coupon' data-bs-toggle='modal' class='alert-link'>Click here to enter your code</a></div>-->
              <!--</div>-->
              
              <center><h2 class="h3 mt-lg-3 pb-3">Shipping Details</h2></center>
              <div class="row mb-4">
                 
                <div class="col-12 mb-3 pb-1">
                  <label class="form-label" for="ch-fn">Full name<sup class="text-danger ms-1">*</sup></label>
                  <input class="form-control   @error('name') is-invalid @enderror" type="text" id="ch-fn" placeholder="Your Full Name"  value="{{Session::get('user_session')->name ?? ''}}" name="name" >
                  <p class="text-danger" id="name"></p>
                   @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6 mb-3 pb-1">
                  <label class="form-label" for="ch-country">Country<sup class="text-danger ms-1">*</sup></label>
                  <input class="form-control  @error('country') is-invalid @enderror" type="text" id="ch-country" placeholder="Country name" value="{{Session::get('user_session')->country ?? ''}}" name="country" >
                   <p class="text-danger" id="country"></p>
                   @error('country')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                 <div class="col-6 mb-3 pb-1">
                  <label class="form-label" for="ch-State">State<sup class="text-danger ms-1">*</sup></label>
                  <input class="form-control  @error('state') is-invalid @enderror" type="text" id="ch-State" placeholder="State name" value="{{Session::get('user_session')->State ?? ''}}" name="state" >
                   <p class="text-danger" id="state"></p>
                   @error('state')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
                <div class="col-6 mb-3 pb-1">
                  <label class="form-label" for="ch-address">Street address<sup class="text-danger ms-1">*</sup></label>
                  <input class="form-control  @error('street') is-invalid @enderror" type="text" id="ch-street" placeholder="House number and Street name" value="{{Session::get('user_session')->street ?? ''}}" name="street" >
                   <p class="text-danger" id="street"></p>
                   @error('street')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6 mb-3 pb-1">
                     <label class="form-label" for="ch-address">Apartment<sup class="text-danger ms-1">*</sup></label>
                  <input class="form-control  @error('landmark') is-invalid @enderror" type="text" placeholder="Apartment, Suite, Unit etc. (optional)" value="{{Session::get('user_session')->landmark ?? ''}}" name="landmark"  >
                </div>
                <div class="col-6 mb-3 pb-1">
                  <label class="form-label" for="ch-city">Town / City<sup class="text-danger ms-1">*</sup></label>
                  <input class="form-control  @error('city') is-invalid @enderror" type="text" id="ch-city" placeholder="Your City" value="{{Session::get('city') ?? ''}}" name="city" >
                  <p class="text-danger" id="city"></p>
                   @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!--<div class="col-6 mb-3 pb-1">-->
                <!--  <label class="form-label" for="ch-county">County</label>-->
                <!--  <input class="form-control " type="text" id="ch-county">-->
                <!--</div>-->
                <div class="col-6 mb-3 pb-1">
                  <label class="form-label" for="ch-postcode">Postal Code/Zip Code<sup class="text-danger ms-1">*</sup></label>
                  <input class="form-control  @error('postcode') is-invalid @enderror" type="text" id="ch-postcode" placeholder="Enter Postal  Code" value="{{Session::get('postcode') ?? ''}}" name="postcode" >
                  <p class="text-danger" id="postcode"></p>
                   @error('postcode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-6 mb-3 pb-1">
                  <label class="form-label" for="ch-phone">Phone<sup class="text-danger ms-1">*</sup></label>
                  <input class="form-control  @error('phone') is-invalid @enderror" type="text" id="ch-phone" placeholder="Your Phone Number" value="{{Session::get('user_session')->phone ?? ''}}" name="phone" >
                    <p class="text-danger" id="phone"></p>
                   @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-6 mb-3 pb-1">
                  <label class="form-label" for="ch-email">Email address<sup class="text-danger ms-1">*</sup></label>
                  <input class="form-control  @error('email') is-invalid @enderror" type="email" id="ch-email" placeholder="Your Email" value="{{Session::get('user_session')->email ?? ''}}" name="email" >
                   <p class="text-danger" id="e"></p>
                   @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
              <h2 class="h3 pb-3">Additional information</h2>
              <div class="mb-3 pb-1 pb-3 pb-lg-5">
                <label class="form-label" for="ch-order-notes">Order notes</label>
                <textarea class="form-control " id="ch-order-notes" rows="5" placeholder="Notes about your order, e.g. special notes for delivery." name="description"></textarea>
              </div>
            </div>
            <!-- Sidebar-->
            <div class="col-lg-5 sidebar pt-5 ps-lg-4 pb-md-2">
              <div class="ps-lg-4  mb-3 pb-5">
                <h2 class="h4 pb-3">Your cart</h2>
                <div class="cart_body">
                    @php
                        $sub_total=0; 
                        $cart_ids = null;
                        $qty = 0;
                        $weight = 0;
                        $gst = 0;
                       
                        
                    @endphp
                    @foreach($cart as $cart)
                        @php 
                            $sub_total +=$cart->price * $cart->qty; 
                            $cart_ids .= $cart->id.':';
                            $qty += $cart->qty;
                            $weight += $cart->weight;
                        @endphp
                        <div class="d-flex align-items-center mb-3"><a class="d-block flex-shrink-0" href="{{route('single.product')}}"><img class="rounded" src="{{asset('uploads')}}/{{$cart->image}}" alt="Product" width="60"></a>
                            <div class="w-100 ps-2 ms-1">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="me-3">
                                        <h4 class="nav-heading fs-md mb-1"><a class="fw-medium" href="{{route('single.product')}}">{{$cart->product_name}}</a></h4>
                                        <div class="d-flex align-items-center fs-sm"><span class="me-2 price">${{$cart->price}}</span><span class="me-2">x</span>
                                            <span class="qty">{{$cart->qty}}</span>
                                        </div>
                                    </div>
                                    <div class="">
                                    <!--<a href="{{route('minus',$cart->id)}}"> <button type="button" class="btn btn-button btn-sm bg-white minus"><i class="ai-minus"></i></button></a>-->
                                    <!--<a href="{{route('plus',$cart->id)}}"> <button type="button" class="btn btn-button btn-sm bg-white minus"><i class="ai-plus"></i></button></a>-->
                                    <div class="ps-3 border-start">
                                        <a href="{{route('minus',$cart->id)}}" type="button" class="btn btn-butto btn-sm bg-white " data-id="{{$cart->id}}"><i class="ai-minus"></i></a>
                                        <a href="{{route('plus',$cart->id)}}" type="button" class="btn btn-butto btn-sm bg-white " data-id="{{$cart->id}}"><i class="ai-plus"></i></a>
                                    </div>
                                    
                                    
                                    </div>
                                    <div class="ps-3 border-start">
                                        @if(Session::has('user_session'))
                                            <a href ="{{route('checkout.remove',$cart->id)}}" type="button" class="btn btn-button  btn-sm bg-white removeProduct" data-id="{{$cart->id}}"><i class="ai-x-circle"></i></a>
                                        @else
                                        <a class="d-block text-danger text-decoration-none fs-xl" href="{{route('checkout.remove',$cart->id)}}" data-bs-toggle="tooltip" title="Remove"><i class="ai-x-circle"></i></a>
                                        @endif
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                    

                <!-- Calucaltion -->
                @php 
                    $gst = (13/100)*$sub_total;
                    $gst = number_format($gst,3);
                    $shipping_charges= $sub_total >=75 ? 0 : 3.99;
                    
                    $total = $sub_total+$gst+$shipping_charges;
                    $total = number_format($total,3);
                @endphp
      
                <hr class="mt-0 mb-4">
                <div class="d-flex justify-content-between mb-3"><span class="h6 mb-0">Subtotal:</span><span class="text-nav">${{ $sub_total  }}</span></div>
                <div class="d-flex justify-content-between mb-3"><span class="h6 mb-0">Hst:</span><span class="text-nav">${{  $gst }}</span></div>
                <div class="d-flex justify-content-between mb-3"><span class="h6 mb-0">Shipping:</span><span class="text-nav">${{ $shipping_charges  }}</span></div>
                <div class="d-flex justify-content-between mb-3"><span class="h6 mb-0">Total:</span><span class="h6 mb-0">${{$total }}</span></div>
                 <input type="hidden" name="cart" value="{{$cart_ids}}" id="cart">
                <input type="hidden" name="gst" value="{{$gst}}" id="gst">
                <input type="hidden" name="shipping_charges" value="{{$shipping_charges}}" id="shipping_charges">
                <!--<input type="hidden" name="weight" value="{{$weight}}" id="weight">-->
                <input type="hidden" name="qty" value="{{$qty}}" id="qty">
                <input type="hidden" name="sub_total" value="{{$sub_total}}" id="sub_total">
                <input type="hidden" name="total" value="{{$total}}" id="total">
                  
                <input type="hidden" name="courier_rate" value="{{$courier_details['rate'] ?? ''}}" id="courier_rate">
                <input type="hidden" name="courier_name" value="{{$courier_details['courier_name'] ?? ''}}" id="courier_name">
                <input type="hidden" name="courier_company_id" value="{{$courier_details['courier_company_id'] ?? ''}}" id="courier_company_id">
                
                <button class="btn btn-primary d-block w-100 mt-5" id="rzp-button1" type="submit">Place order</button>
             
                



 
                           
                    {{--<form action="{{route('card.charge')}}" method="POST">
                          {{ csrf_field() }}
                        <script
                                src="https://checkout.stripe.com/checkout.js" class="stripe-button "
                                data-key="{{ env('STRIPE_KEY') }}"
                                data-amount="{{number_format($total)  *100}}"
                                data-name="Uniqueproducts"
                                data-description="Uniqueproduct"
                                data-image="https://uniqueproducts.ca/unique/public/uploads/logo/favicon.png"
                                data-locale="auto"
                                data-currency="cad">
                        </script>
                        
                       </form>--}}
                       
              
          
                </div>

              </div>
            </div>
          </div>
          </form>
        </div>
      
      

       @else
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 p-5">
                        
                         <center> 
                            <div class="my-5">
                                <center class="my-5"><h2>Your Cart is Empty</h2></center>
                                <i class="ai-shopping-cart" style="color:red;font-size:200px;"></i><span class="navbar-tool-badge"></span>
                            </div>
                         </center>
                         
                    </div>
                </div>
            </div>
           
    @endif
    </main>
    
   
@endsection

@section('custom-js')

   

@endsection