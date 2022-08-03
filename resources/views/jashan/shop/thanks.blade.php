@extends('layouts.around-header')
@section('main')

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.php">Shop</a>
                        <span>Thanks</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
            <div class="center" align="center">
                <h3>Order Successful</h3>
                <img src="https://livingroomtoballroom.com/wp-content/uploads/2019/10/payment_successful.gif" width="150">
                <p> Thanks for your Order. Your Order ID is #5675, And your transaction id is #567GVGD456vg46</p>
                <p> We will proceed your order soon.</p>

                <a href="{{ url('/') }}" class="site-btn place-btn">Continue Shopping</a>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

@endsection
