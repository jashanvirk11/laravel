@extends('layouts.around-header')
@section('page-title') 
   All Products |  Rural Pure | 
@endsection
@section('meta-schema')
@endsection
@section('custom-css')
@endsection
@section('main')
      <!-- Page content-->
      <div class="container py-4 mb-2 mb-sm-0 pb-sm-5">
        <nav aria-label="breadcrumb">
          <ol class="py-1 my-2 breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Shop grid</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">All Products</li>
          </ol>
        </nav>
        <!-- Sorting + Pager-->
        <div class="d-flex justify-content-between align-items-center py-3 mb-3">
          <div class="d-flex justify-content-center align-items-center">
            <select class="form-select me-2" style="width: 15.25rem;">
              <option value="popularity">Sort by popularity</option>
              <option value="rating">Sort by average rating</option>
              <option value="newness">Sort by newness</option>
              <option value="price: low to high">Sort by price: low to high</option>
              <option value="price: high to low">Sort by price: high to low</option>
            </select>
            <div class="d-none d-sm-block fs-sm text-nowrap ps-1 mb-1">of 135 products</div>
          </div>
          <div class="d-none d-lg-flex justify-content-center align-items-center">
            <label class="pe-1 me-2 mb-0 form-label px-0">Show</label>
            <select class="form-select me-2" style="width: 5rem;">
              <option value="12">12</option>
              <option value="24">24</option>
              <option value="36">36</option>
              <option value="48">48</option>
              <option value="60">60</option>
            </select>
            <div class="fs-sm text-nowrap ps-1 mb-1">products per page</div>
          </div>
        </div>
        <!-- Shop grid-->
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
            <div class="card card-product card-hover"><a class="card-img-top" href="{{route('single.product',$product_name)}}"><img src="{{asset('uploads')}}/{{ $product->cover_photo }}" alt="Product thumbnail"></a>
              <div class="card-body"><a class="meta-link fs-xs mb-1" href="#"></a>
                <h3 class="fs-md fw-medium mb-2"><a class="meta-link" href="{{route('single.product',$product_name)}}">{{ $product->name }}</a></h3><span class="text-heading fw-semibold">₹ {{ $product->price }}</span>
              </div>
              <div class="card-footer">
                <div class="star-rating mt-n1"><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star"></i><i class="sr-star ai-star"></i>
                </div>
                <div class="d-flex align-items-center">
                                      
                     @if($product->wishlist($product->id))
                     <a class="btn-wishlist" href="{{route('add.wishlist',[$product->id])}}">
                             <i class="fas fa-heart" style="color:red"></i><span class="btn-tooltip">Wishlist</span>
                      </a>
                     @else
                         <a class="btn-wishlist" href="{{route('add.wishlist',[$product->id])}}">
                          <i class="fas fa-heart"></i><span class="btn-tooltip">Wishlist</span>
                      </a>
                      @endif
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
      
        <!-- Pagination-->
        
        <!--<div class="d-md-flex justify-content-between align-items-center pt-3 pb-2">-->
        <!--  <div class="d-flex justify-content-center align-items-center mb-4">-->
        <!--    <label class="pe-1 me-2 mb-0 form-label px-0">Show</label>-->
        <!--    <select class="form-select me-2" style="width: 5rem;">-->
        <!--      <option value="12">12</option>-->
        <!--      <option value="24">24</option>-->
        <!--      <option value="36">36</option>-->
        <!--      <option value="48">48</option>-->
        <!--      <option value="60">60</option>-->
        <!--    </select>-->
        <!--    <div class="fs-sm text-nowrap ps-1 mb-1">products per page</div>-->
        <!--  </div>-->
        <!--  <nav class="mb-4" aria-label="Page navigation">-->
        <!--    <ul class="pagination justify-content-center">-->
        <!--      <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><i class="ai-chevron-left"></i></a></li>-->
        <!--      <li class="page-item d-sm-none"><span class="page-link page-link-static">2 / 10</span></li>-->
        <!--      <li class="page-item d-none d-sm-block"><a class="page-link" href="#">1</a></li>-->
        <!--      <li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">2<span class="visually-hidden">(current)</span></span></li>-->
        <!--      <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>-->
        <!--      <li class="page-item d-none d-sm-block"><a class="page-link" href="#">4</a></li>-->
        <!--      <li class="page-item d-none d-sm-block">...</li>-->
        <!--      <li class="page-item d-none d-sm-block"><a class="page-link" href="#">10</a></li>-->
        <!--      <li class="page-item"><a class="page-link" href="#" aria-label="Next"><i class="ai-chevron-right"></i></a></li>-->
        <!--    </ul>-->
        <!--  </nav>-->
        <!--</div>-->
      
      </div>
    </main>
  
@endsection