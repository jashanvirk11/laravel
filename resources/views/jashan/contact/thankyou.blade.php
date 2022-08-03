@extends('layouts.around-header')
@section('main')

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--<div class="breadcrumb-text product-more">-->
                    <!--    <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>-->
                    <!--    <a href="{{route('contact')}}">Contact</a>-->
                    <!--    <span>Thanks</span>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad mb-5">
        <div class="container">
            <div class="card shadow mx-7 py-7">
            <div class="center" align="center">
                <h3> Query has been  Send Successfully </h3>
                <h2>&nbsp</h1>
                <h1>Thank You !</h1>
                <h2>&nbsp</h2>
                <!--<img src="https://livingroomtoballroom.com/wp-content/uploads/2019/10/payment_successful.gif" width="150">-->
                <p> Thanks for your interest, We have received your message.</p>
                <p>We normally respond within 2 business days</p>

                <!--<a href="{{ url('/contact') }}" class="btn btn-primary">Back</a>-->
            </div>
            </div>
        </div>
    </section>
    
    <!-- Shopping Cart Section End -->
<script>
setTimeout(function()  {   window.location="{{route('index')}}"  },10000);
</script>
@endsection
