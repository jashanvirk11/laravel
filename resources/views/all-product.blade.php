@extends('layouts.around-header')
@section('page-title') 
   All Products  
@endsection
@section('meta-schema')
@endsection
@section('custom-css')

@endsection
@section('main')
      <!-- Page content-->
      <div class="container py-4 mb-2 mb-sm-0 pb-sm-5">
     
        <style>
        .btn-wishlist .fas{
            color: #cbcbcb;
        }
        .btn-wishlist .fas:hover{
            color: #ff7007;
        }
            
        </style>
        <div class="row">
          <!-- Item-->
          @if(!$products->isEmpty())
              @foreach($products as $product)
                @php 
                $product_name = str_replace(' ', '-',strtolower($product->name))
                @endphp
                <div class="col-lg-3 col-md-4 col-sm-6 mb-grid-gutter">
            <div class="card card-product card-hover">
                <a class="card-img-top" href="{{route('single.product',$product_name)}}"><img src="{{asset('uploads')}}/{{ $product->cover_photo }}" alt="Product thumbnail"></a>
              <div class="card-body"><a class="meta-link fs-xs mb-1" href="#"></a>
                <h3 class="fs-md fw-medium mb-2"><a class="meta-link" href="{{route('single.product',$product_name)}}">{{ $product->name }}</a></h3><span class="text-heading fw-semibold">{{ $product->price }}</span>
              </div>
              <div class="card-footer">
                <div class="star-rating mt-n1"><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star"></i><i class="sr-star ai-star"></i>
                </div>
                <div class="d-flex align-items-center">
                                      
                    {{-- @if($product->wishlist($product->id))
                     <a class="btn-wishlist" href="{{route('add.wishlist',[$product->id])}}">
                             <i class="fas fa-heart" style="color:red"></i><span class="btn-tooltip">Wishlist</span>
                      </a>
                     @else
                         <a class="btn-wishlist" href="{{route('add.wishlist',[$product->id])}}">
                          <i class="fas fa-heart"></i><span class="btn-tooltip">Wishlist</span>
                      </a>
                      @endif--}}
                         <span class="btn-divider"></span>
                    <!--<a class="btn-addtocart" href="#"><i class="ai-shopping-cart"></i><span class="btn-tooltip">To Cart</span></a>-->
                    <a class="btn-addtocart add_to_cart" href="javascript:void(0)" data-id="{{ $product->id }}">
                        <i class="ai-shopping-cart"></i><span class="btn-tooltip">To Cart</span>
                    </a>
                </div>
              </div>
            </div>
          </div>
            @endforeach
            {{ $products->links() }}
          @endif
        
        </div>

      </div>
    </main>
  
@endsection