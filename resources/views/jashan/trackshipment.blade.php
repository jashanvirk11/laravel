@extends('layouts.master-layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/track.css') }}">
    <section class="root">
        <figure>
            <img src="https://image.flaticon.com/icons/svg/970/970514.svg" alt="">
            <figcaption>
                <h4>Tracking Details</h4>
                <h6>Order Number</h6>
                <h2># {{ $orders->id }}</h2>
            </figcaption>
        </figure>
        <div class="order-track">
            <div class="order-track-step">
                <div class="order-track-status">
                 <span class="order-track-status-dot" id="processing"></span>
                    <span class="order-track-status-line"></span>
                </div>
                <div class="order-track-text">
                    <p class="order-track-text-stat">Processing</p>
                    <span class="order-track-text-sub">{{ $orders->created_at }}</span>
                </div>
            </div>
            <div class="order-track-step">
                <div class="order-track-status">
                 <span class="order-track-status-dot" id="packed"></span>
                    <span class="order-track-status-line"></span>
                </div>
                <div class="order-track-text">
                    <p class="order-track-text-stat">Packed</p>
                    <span class="order-track-text-sub"></span>
                </div>
            </div>
            <div class="order-track-step">
                <div class="order-track-status">
                    <span class="order-track-status-dot" id="onway"></span>
                    <span class="order-track-status-line"></span>
                </div>
                <div class="order-track-text">
                    <p class="order-track-text-stat"> Shipped - {{ $orders->shiping_address->city_name }}</p>
                    <span class="order-track-text-sub"></span>
                </div>
            </div>
            <div class="order-track-step">
                <div class="order-track-status">
                    <span class="order-track-status-dot" id="deliverd"></span>
                    <span class="order-track-status-line"></span>
                </div>
                <div class="order-track-text">
                    <p class="order-track-text-stat">Delivery date</p>
                    <span class="order-track-text-sub">{{ $orders->delivery_date }}</span>
                </div>
            </div>
        </div>
    </section>
    @push('script')
        <script>
            $(document).ready(function() {                               
                var status = "{{ $orders->status }}";                
                if (status == 'processing') {
                    $('#processing').append('<img  src="https://img2.pngio.com/right-icon-of-flat-style-available-in-svg-png-eps-ai-icon-fonts-right-icon-png-512_512.png">')
                }else if(status == 'packed')
                {
                    $('#packed').append('<img  src="https://img2.pngio.com/right-icon-of-flat-style-available-in-svg-png-eps-ai-icon-fonts-right-icon-png-512_512.png">')
                }else if(status  == 'onway')
                {
                    $('#onway').append('<img  src="https://img2.pngio.com/right-icon-of-flat-style-available-in-svg-png-eps-ai-icon-fonts-right-icon-png-512_512.png">')
                }else if(status == 'deliverd')
                {
                    $('#deliverd').append('<img  src="https://img2.pngio.com/right-icon-of-flat-style-available-in-svg-png-eps-ai-icon-fonts-right-icon-png-512_512.png">')
                }
            })
        </script>
    @endpush
@endsection
