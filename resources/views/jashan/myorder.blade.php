@extends('layouts.around-header')
@section('page-title')
    orders | Rural Pure
@endsection
@section('main')
    <link rel="stylesheet" href="{{ asset('css/order.css') }}">
    <div class="container mt-3 mt-md-5">
    @if(count($order) > 0)
        <h2 class="text-charcoal hidden-sm-down">Your Orders</h2>                
        @foreach ($order as $item)
            <div class="row">
                <div class="col-12">
                    <div class="list-group mb-5">
                        <div class="list-group-item p-3 bg-snow" style="position: relative;">
                            <div class="row w-100 no-gutters">
                                <div class="col-6 col-md">
                                    <h6 class="text-charcoal mb-0 w-100">Order Number</h6>
                                    <a href="" class="text-pebble mb-0 w-100 mb-2 mb-md-0">#{{ $item->id }}</a>
                                </div>
                                <div class="col-6 col-md">
                                    <h6 class="text-charcoal mb-0 w-100">Date</h6>
                                    <p class="text-pebble mb-0 w-100 mb-2 mb-md-0">{{ $item->created_at }}
                                    </p>
                                </div>
                                <div class="col-6 col-md">
                                    <h6 class="text-charcoal mb-0 w-100">Total</h6>
                                    <p class="text-pebble mb-0 w-100 mb-2 mb-md-0">{{ $item->subtotal }}</p>
                                </div>
                                <div class="col-6 col-md">
                                    <h6 class="text-charcoal mb-0 w-100">Shipped To</h6>
                                    <p class="text-pebble mb-0 w-100 mb-2 mb-md-0">{{ $item->shiping_address->city_name }}</p>
                                </div>
                                <div class="col-12 col-md-3">
                                    <a href="{{ url('trackshipment/'.$item->id) }}" class="btn btn-primary w-100">Track Shipment</a>
                                </div>
                            </div>

                        </div>                        
                        <div class="list-group-item p-3 bg-white">
                            <div class="row no-gutters">
                                <div class="col-12 col-md-12 pr-0 pr-md-3">
                                    <div class="p-2  w-100 mb-0">
                                        <h6 class="text-green mb-0"><b>Shipping</b></h6>
                                        <p class="text-green hidden-sm-down mb-0">Est. delivery {{ $item->delivery_date }}
                                        </p>
                                    </div>
                                </div>
                                @foreach($item->order_product as $product)
                                <div class="row no-gutters mt-3">
                                    <div class="row  mt-3">
                                        <div class="col-3 col-md-1">
                                            <img class="img-fluid pr-3" src="{{ $product->cover_photo }}"
                                                alt="">
                                        </div>
                                        <div class="col-12   col-md-8 pr-0 pr-md-3">
                                            <h6 class="text-charcoal mb-2 mb-md-1">
                                                <a href="{{ url('product/'.Str::slug($product->name)) }}" class="text-charcoal">{{ $product->qty }} x
                                                    {{ $product->name }}</a>
                                            </h6>
                                            <h6 class="text-charcoal text-left mb-0 mb-md-2">
                                                <b>{{ $product->offer_price ?? $product->price }}</b>
                                            </h6>
                                        </div>
                                        <div class="col-12 col-md-3 hidden-sm-down">
                                            <a href="{{ url('product/'.Str::slug($product->name)) }}" class="btn btn-secondary w-100 mb-2">Buy It Again</a>
                                            {{-- <a href="" class="btn btn-secondary w-100">Request a Return</a> --}}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>                        
                    </div>
        @endforeach
        @else
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <h5>Cart</h5>
                        </div> --}}
                        <div class="card-body cart">
                            <div class="col-sm-12 empty-cart-cls text-center"> <img src="https://cdn0.iconfinder.com/data/icons/shopping-ecommerce-7/2048/1036_-_Cancel_Order-512.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                                <h3><strong>You  Haven't shopped anything yet !</strong></h3>
                                 <a href="{{ url('/shop') }}" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        {{-- <div class="col-12 col-md-4">
            <div class="pt-5 pt-md-0">
                <div class="list-group mb-3">
                    <div class="list-group-item p-3 bg-snow">
                        <h6 class="mb-0">Order Summary</h6>
                    </div>
                    <div class="list-group-item py-2 px-3 bg-white">
                        <div class="row w-100 no-gutters">
                            <div class="col-6 text-pebble">
                                Subtotal
                            </div>
                            <div class="col-6 text-right text-charcoal">
                                $54.97
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item py-2 px-3 bg-white">
                        <div class="row w-100 no-gutters">
                            <div class="col-6 text-pebble">
                                Sales Tax
                            </div>
                            <div class="col-6 text-right text-charcoal">
                                $4.30
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item py-2 px-3 bg-white">
                        <div class="row w-100 no-gutters">
                            <div class="col-6 text-pebble">
                                Shipping
                            </div>
                            <div class="col-6 text-right text-charcoal">
                                FREE
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item py-2 px-3 bg-white">
                        <div class="row w-100 no-gutters">
                            <div class="col-8 text-pebble">
                                Gift certificate
                            </div>
                            <div class="col-4 text-right text-red text-charcoal">
                                -$5.55
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item py-2 px-3 bg-snow">
                        <div class="row w-100 no-gutters">
                            <div class="col-8 text-charcoal">
                                <b>Total</b>
                            </div>
                            <div class="col-4 text-right text-green">
                                <b>$53.65</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    </div>
@endsection
