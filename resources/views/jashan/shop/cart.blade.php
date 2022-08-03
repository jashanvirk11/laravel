@extends('layouts.around-header')
@section('page-title') 
    Product| 
@endsection
@section('meta-schema')
@endsection
@section('custom-css')
@endsection
@section('main')

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">                        
                        <div class="card-body cart">
                            <div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png"
                                    width="130" height="130" class="img-fluid mb-4 mr-3">
                                <h3><strong>Your Cart is Empty</strong></h3>
                                <h4>Add something to make me happy :)</h4> <a href="{{ url('/') }}"
                                    class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    
        <script>
             window.addEventListener( "pageshow", function ( event ) {
                var historyTraversal = event.persisted || 
                                        ( typeof window.performance != "undefined" && 
                                            window.performance.navigation.type === 2 );
                if ( historyTraversal ) {
                    // Handle page restore.
                    window.location.reload();
                }
            });
            var mainsite = "{{ url('/') }}";
            $('.dec').click(function() {
                var clcikevent = $(this);
                var p_id = $(this).closest('.quantity').find('.p_id').val();
                var qty = $(this).closest('.quantity').find('.qty').val();
                var qtyval = parseInt(qty) - 1;
                if (qtyval < 1) {
                    return false;
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "PUT",
                    url: `${mainsite}/shop/${p_id}`,
                    data: {
                        p_id: p_id,
                        qty: qtyval,
                    },
                    success: function(data) {
                        console.log(data);
                        var totalgst = data.totalgst;
                        var subtotal = data.subtotal;
                        var grandtotal = data.grandtotal;
                        var shipping = data.shipping;
                        var freeshipping = data.freeshipping;
                        var product_price  = data.product_price;
                        $(clcikevent).closest('.qty_table').find('.total-price').html(`Rs.${parseFloat(data.grandtotalproduct).toFixed(2)}`);
                        $(clcikevent).closest('.qty_table').find('#tdgst').html(`Rs.${ parseFloat(data.product_gst).toFixed(2) }`)
                        $(clcikevent).closest('.qty_table').find('#tdlogistick').html(`Rs.${ parseFloat(data.product_shipping).toFixed(2)}`);
                        $(clcikevent).closest('.qty_table').find('#tdprice').html(`Rs.${ parseFloat(data.initial_price).toFixed(2) }`);
                        $('.sub-total').html(`Rs.${parseFloat(product_price).toFixed(2)}`);
                        if (data.freeshipping == true) {
                            $('.logistick-title').html(`Logistic Cost Free`);
                            $('.logistick-cost').html(`<strike> Rs.${ parseFloat(shipping) } </strike>`);

                        } else {
                            $('.logistick-title').html(`Logistic Cost`);
                            $('.logistick-cost').html(`Rs.${ parseFloat(shipping).toFixed(2)}`);
                        }
                        
                         $('.product_price').html(`Rs.${ parseFloat(product_price).toFixed(2) }`);
                        $('.logistick-gst').html(`Rs.${ parseFloat(totalgst).toFixed(2) }`);
                        $('.final_price').html(`Rs.${parseFloat(grandtotal).toFixed(2)}`);                       
                    }
                });
            });
            $('.inc').click(function() {
                var clcikevent = $(this);
                var p_id = $(this).closest('.quantity').find('.p_id').val();
                var qty = $(this).closest('.quantity').find('.qty').val();
                var qtyval = parseInt(qty) + 1;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "PUT",
                    url: `${mainsite}/shop/${p_id}`,
                    data: {
                        p_id: p_id,
                        qty: qtyval,
                    },
                    success: function(data) {
                        console.log(data);
                        var totalgst = data.totalgst;
                        var subtotal = data.subtotal;
                        var grandtotal = data.grandtotal;
                        var shipping = data.shipping;
                        var freeshipping = data.freeshipping;
                        var product_price  = data.product_price;
                        $(clcikevent).closest('.qty_table').find('.total-price').html(`Rs.${parseFloat(data.grandtotalproduct).toFixed(2)}`);
                        $(clcikevent).closest('.qty_table').find('#tdgst').html(`Rs.${ parseFloat(data.product_gst).toFixed(2) }`)
                        $(clcikevent).closest('.qty_table').find('#tdlogistick').html(`Rs.${ parseFloat(data.product_shipping).toFixed(2) }`);
                        $(clcikevent).closest('.qty_table').find('#tdprice').html(`Rs.${ parseFloat(data.initial_price).toFixed(2) }`);
                        $('.sub-total').html(`Rs.${parseFloat(product_price).toFixed(2)}`);                        
                        if (data.freeshipping == true) {
                            $('.logistick-title').html(`Logistic Cost Free`);
                            $('.logistick-cost').html(`<strike> Rs.${ parseFloat(shipping).toFixed(2) } </strike>`);

                        } else {
                            $('.logistick-title').html(`Logistic Cost`);
                            $('.logistick-cost').html(`Rs.${ parseFloat(shipping).toFixed(2)}`);
                        }
                        $('.product_price').html(`Rs.${ parseFloat(product_price).toFixed(2) }`);                        
                        $('.logistick-gst').html(`Rs.${ parseFloat(totalgst).toFixed(2) }`);
                        $('.final_price').html(`Rs.${parseFloat(grandtotal).toFixed(2)}`);                       
                    }
                });
            });

        </script>
    
@endsection
