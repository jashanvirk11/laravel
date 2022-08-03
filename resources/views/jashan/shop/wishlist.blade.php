@extends('layouts.around-header')
@section('main')
    <div class="container">
        <div class="categories_product_area">
            <div class="row" style=" padding-top:15px">
                @if ($wish->count() > 0)
                    @foreach ($wish as $item)
                        <div class="col-md-3">
                            <div class="l_product_item" style="height: 440px">
                                <div class="l_p_img">
                                    <a href="{{ url('product') }}/{{ $item->product[0]->slug }}">
                                        <img src="{{ url($item->product[0]->cover_photo) }}" alt="" height="300"
                                            width="300">
                                        @if ($item->product[0]->qty <= 0)
                                            <h5 class="new bg-danger">Unavailable</h5>
                                        @else
                                            <h5 class="new bg-white border"><a href="#" id="closewish"><i
                                                        class="fa fa-1x fa-trash" style="color: black"
                                                        value="{{ $item->id }}"></i></a></h5>
                                        @endif
                                    </a>
                                </div>
                                <div class="l_p_text" style="height: 105px">
                                    <ul>
                                        <li>
                                            <form action="{{ url('/cart') }}" method="post" id="cartform">
                                                @csrf
                                                <input type="text" name="wishid" value="{{ $item->id }}" hidden>
                                                <input type="text" name="product_id" value="{{ $item->product[0]->id }}"
                                                    hidden>
                                                <button type="submit" class="add_cart_btn" href="#">Move To
                                                    Cart</button>
                                            </form>
                                        </li>
                                    </ul>
                                    <a href="{{ url('product') }}/{{ $item->product[0]->slug }}">
                                        <h4>{{ substr($item->product[0]->name, 0, 50) }}</h4>
                                    </a>
                                    @if (!empty($item->product[0]->offer_price))
                                        <h5>&#8377;{{ $item->product[0]->offer_price }} <del class="text-dark">
                                                &#8377;{{ $item->product[0]->price }}</del></h5>
                                    @else
                                        <h5>&#8377;{{ $item->product[0]->price }}</h5>
                                    @endif
                                </div>
                                <form action="{{ url('/shop') }}" method="post" id="cartform" style="margin-left: 20%">
                                    @csrf
                                    <input type="text" name="wishid" value="{{ $item->id }}" hidden>
                                    <input type="text" name="qty" value="1" hidden>
                                    <input type="text" name="product_id" value="{{ $item->product[0]->id }}" hidden>
                                    @if (Auth::check())
                                        <button class="primary-btn pd-cart" id="add_cart_btn" type="submit">Move To
                                            Cart</button>
                                    @else
                                        <a href="{{ url('product') }}/{{ $item->product[0]->slug }}">
                                            <button class="primary-btn pd-cart" id="add_cart_btn" type="button">Move To
                                                Cart</button>
                                        </a>
                                    @endif                                   
                                </form>
                            </div>
                        </div>
                    @endforeach
            </div>
        @else
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body cart">
                                <div class="col-sm-12 empty-cart-cls text-center"> <img
                                        src="https://cdn2.mageplaza.com/media/shopify_appicons//9dfb71723120e80811826bdaaf5e279d.png"
                                        width="130" height="130" class="img-fluid mb-4 mr-3">
                                    <h3><strong>Your Wishlist is Empty</strong></h3>
                                    <h4>Add Your Wish to make me happy :)</h4> <a href="{{ url('/shop') }}"
                                        class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <script>
            var mainsite = "{{ url('/') }}";
            $('#closewish i').on('click', function(e) {
                var element = $(this);
                var id = $(this).attr('value');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content')
                    }
                });
                $.ajax({
                    url: `${mainsite}/wishlist/${id}`,
                    dataType: 'json',
                    type: "DELETE",
                    success: function(data) {
                        console.log(data);
                        location.reload();
                        toastr.success(data.message);
                    }
                });
            })

        </script>
    @endsection
