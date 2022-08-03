@extends('layouts.around-header')
@section('page-title') 
    Rural Pure | 
@endsection
@section('meta-schema')
@endsection
@section('custom-css')
    <style>
        /*.bg-gradient{*/
        /*    background:black ! important;*/
        /*}*/
        .category-icon{
            font-size:50px;
        }
        .btn-wishlist .fas{
            color: #cbcbcb;
        }
        .btn-wishlist .fas:hover{
            color: #ff7007;
        }
        
        
        .card-type {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 60%;
            height: 40px;
              }

        .card-type:hover {
          box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }
        .hover{
            color: dark;
            
        }
        
    </style>
@endsection
@section('main')



      <!-- Page content-->
      <!-- Hero - Featured Products (tabs)-->
      <section class="position-relative bg-primary-light pt-5 pt-lg-6 pb-7 mb-7 squares" >
        <div class="shape shape-bottom shape-curve bg-body" >
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3000 185.4">
            <path fill="currentColor" d="M3000,0v185.4H0V0c496.4,115.6,996.4,173.4,1500,173.4S2503.6,115.6,3000,0z"></path>
          </svg>
        </div>
        <!-- Tabs-->
        <div class="container pb-7">
          <div class="row align-items-center pb-7">
            <div class="col-lg-3">
              <ul class="nav nav-tabs media-tabs media-tabs-dark justify-content-center justify-content-lg-start pb-3 mb-4 pb-lg-0 mb-lg-0" role="tablist">
                  
                   
                    <li class="nav-item me-3 mb-3 square" onmouseover="hover('Pure Ruralpure Haldi')"><a class="nav-link" href="{{route('all.product')}}" role="tab">
                    <div class="d-flex align-items-center"><img class="flex-shrink-0 rounded" src="{{asset('frontend-theme/ruralpure/product/rai.png')}}" alt="Product" width="60">
                      <div class="w-100 ps-2 ms-1">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="fs-sm pe-1">Pure Ruralpure Haldi</div><i class="ai-chevron-right lead ms-2 me-1"></i>
                        </div>
                      </div>
                    </div></a></li>
                <li class="nav-item me-3 mb-3 square" onmouseover="hover('Pure  Grains Collections')"><a class="nav-link" href="{{route('all.product')}}" role="tab">
                    <div class="d-flex align-items-center"><img class="flex-shrink-0 rounded" src="{{asset('frontend-theme/ruralpure/product/rai.png')}}" alt="Product" width="60">
                      <div class="w-100 ps-2 ms-1">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="fs-sm pe-1">Pure Grains Poducts</div><i class="ai-chevron-right lead ms-2 me-1"></i>
                        </div>
                      </div>
                    </div></a></li>
                <li class="nav-item me-3 mb-3 square" onmouseover="hover('Pure Product<br> Rai')"><a class="nav-link" href="{{route('all.product')}}" role="tab">
                    <div class="d-flex align-items-center"><img class="flex-shrink-0 rounded" src="{{asset('frontend-theme/ruralpure/product/rai.png')}}" alt="Product" width="60">
                      <div class="w-100 ps-2 ms-1">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="fs-sm pe-1">Pure Ruralpure  Rai </div><i class="ai-chevron-right lead ms-2 me-1"></i>
                        </div>
                      </div>
                    </div></a></li>
              </ul>
            </div>
            <div class="col-lg-9">
              <div class="tab-content">
                 
                <div class="tab-pane fade show active" id="camera">
                  <div class="row align-items-center">
                    <div class="col-lg-6 order-lg-2 pb-1 mb-4 pb-lg-0 mb-lg-0">
                      <div class="mx-auto" style="max-width: 443px;"><img src="{{asset('frontend-theme/ruralpure/product/rai.png')}}" alt="Security Camera"></div>
                    </div>
                    <div class="col-lg-6 order-lg-1 text-center text-lg-start">
                      <div class="ps-xl-5" >
                        <h2 class="h1 text-dark" id="onhover">Pure  Ruralpure Haldi</h2>
                        <p class="fs-lg text-dark mb-lg-5">Fresh products at your doorstep</p><div class="card card-type text-center py-2">starting from - ₹ 45.00</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="sneakers ">
                  <div class="row align-items-center">
                    <div class="col-lg-6 order-lg-2 pb-1 mb-4 pb-lg-0 mb-lg-0">
                      <div class="mx-auto" style="max-width: 443px;"><img src="{{asset('frontend-theme/ruralpure/product/rai.png')}}" alt="Pure Grocery"></div>
                    </div>
                    <div class="col-lg-6 order-lg-1 text-center text-lg-start">
                      <div class="ps-xl-5">
                        <h2 class="h1 text-dark">Pure  Grains Collections</h2>
                        <p class="fs-lg text-dark mb-lg-5">Fresh products at your doorstep</p><a class="btn btn-translucent-dark" href="#">starting from - ₹ 99.00</a>
                      </div>
                    </div>
                  </div>
                </div> 
                <div class="tab-pane fade" id="vr">
                  <div class="row align-items-center">
                    <div class="col-lg-6 order-lg-2 pb-1 mb-4 pb-lg-0 mb-lg-0">
                      <div class="mx-auto" style="max-width: 443px;"><img src="{{asset('frontend-theme/ruralpure/product/rai.png')}}" alt="Pure Product Rai"></div>
                    </div>
                    <div class="col-lg-6 order-lg-1 text-center text-lg-start">
                      <div class="ps-xl-5 heading">
                        <h2 class="h1 text-dark">Pure  Product Rai</h2>
                        <p class="fs-lg text-dark mb-lg-5">Fresh products at your doorstep</p><a class="btn btn-translucent-dark" href="#">starting from  - ₹ 180.00</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <!-- Categories (carousel)-->
      <section class="container position-relative zindex-5" style="margin-top: -290px;">
       
        
        
        <div class="row ">
            @if(!$categories->isEmpty())
                @foreach($categories as $category)
                    <div class="col-md-6 col-lg-3 col-sm-12">
                         <!--Category-->
                     @php 
                     $category_name = str_replace(' ', '-',strtolower($category->name))
                     @endphp
                    <div class="pb-2"><a class="card card-category shadow mx-1" href="{{route('categorywise',$category_name)}}"><span class="badge badge-lg badge-floating badge-floating-end bg-success">From ₹ 8.99</span>
                    <img class="card-img-top" src="{{asset('uploads')}}/{{ $category->image }}" alt="{{ $category->name }}">
                        <div class="card-body text-center">
                          <h4 class="card-title">{{ $category->name }}</h4>
                        </div></a>
                    </div>
                    </div>
                @endforeach
            @endif
        </div>
        
      </section>
      <!-- Trending products (grid)-->
      <section class="container pt-5 mt-5 mt-md-0 pt-md-6 pt-lg-7">
        <h2 class="text-center mb-5">Trending products</h2>
        <div class="row pb-1">
          <!-- Item-->
          @if(!$products->isEmpty())
              @foreach($products as $product)
                      @php 
                     $product_name = str_replace(' ', '-',strtolower($product->name))
                     @endphp
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-grid-gutter bg-light">
                        <div class="card card-product card-hover"><a class="card-img-top" href="{{route('single.product',$product_name)}}"><img src="{{asset('uploads')}}/{{ $product->cover_photo }}" alt="Product thumbnail"></a>
                                <div class="card-body">
                                    <!--<a class="meta-link fs-xs mb-1" href="#"></a>-->
                                    <h3 class="fs-md fw-medium my-2"><a class="meta-link" href="{{route('single.product',$product_name)}}">{{ $product->name }}</a></h3><span class="text-heading fw-semibold">₹ {{ $product->price }}</span>
                              </div>
                                <div class="card-footer">
                                    <div class="star-rating mt-n1">
                                        <i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star"></i><i class="sr-star ai-star"></i>
                                    </div>
                                    <div class="d-flex align-items-center">
                                      
                                       @if($product->wishlist($product->id))
                                       <a class="btn-wishlist" href=" ">
                                            <i class="fas fa-heart" style="color:red"></i><span class="btn-tooltip">Wishlist</span>
                                            
                                        </a>
                                       @else
                                        <a class="btn-wishlist" href="{{route('add.wishlist',[$product->id])}}">
                                            <i class="fas fa-heart"></i><span class="btn-tooltip">Wishlist</span>
                                        
                                        </a>
                                        @endif
                                        <span class="btn-divider"></span>
                                        <a class="btn-addtocart" href="{{route('add.to.cart',$product->id)}}">
                                            <i class="ai-shopping-cart"></i><span class="btn-tooltip">To Cart</span>
                                        </a>
                                        <!--<a class="btn-addtocart add_to_cart" href="javascript:void(0)" data-id="{{ $product->id }}">-->
                                        <!--<i class="ai-shopping-cart"></i><span class="btn-tooltip">To Cart</span>-->
                                        <!--</a>-->
                                       
                                    </div>
                                </div>
                        </div>
                    </div>
              @endforeach
               @endif
              {{ $products->links() }}
            
         
          <!-- Item-->
          
          
          <!--<div class="col-lg-3 col-md-4 col-sm-6 mb-grid-gutter">-->
          <!--  <div class="card card-product card-hover"><a class="card-img-top" href="{{route('single.product')}}"><img src="{{asset('frontend-theme/ruralpure/product/kaachri.jfif')}}" alt="Product thumbnail"></a>-->
          <!--    <div class="card-body"><a class="meta-link fs-xs mb-1" href="#"></a>-->
          <!--      <h3 class="fs-md fw-medium mb-2"><a class="meta-link" href="{{route('single.product')}}">Kaachri 150 gm</a></h3><span class="text-heading fw-semibold">₹ 165.00</span>-->
          <!--    </div>-->
          <!--    <div class="card-footer">-->
          <!--      <div class="star-rating mt-n1"><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star"></i>-->
          <!--      </div>-->
          <!--      <div class="d-flex align-items-center"><a class="btn-wishlist" href="#"><i class="ai-heart"></i><span class="btn-tooltip">Wishlist</span></a><span class="btn-divider"></span><a class="btn-addtocart" href="#"><i class="ai-shopping-cart"></i><span class="btn-tooltip">To Cart</span></a></div>-->
          <!--    </div>-->
          <!--  </div>-->
          <!--</div>-->
          <!-- Item-->
          <!--<div class="col-lg-3 col-md-4 col-sm-6 mb-grid-gutter">-->
          <!--  <div class="card card-product card-hover"><span class="badge badge-floating rounded-pill bg-success">New</span><a class="card-img-top" href="{{route('single.product')}}"><img src="{{asset('frontend-theme/ruralpure/product/dhaniya.jfif')}}" alt="Product thumbnail"></a>-->
          <!--    <div class="card-body"><a class="meta-link fs-xs mb-1" href="#"></a>-->
          <!--      <h3 class="fs-md fw-medium mb-2"><a class="meta-link" href="{{route('single.product')}}">Dhaniya</a></h3><span class="text-heading fw-semibold">₹ 28.00</span>-->
          <!--    </div>-->
          <!--    <div class="card-footer">-->
          <!--      <div class="star-rating mt-n1"><i class="sr-star ai-star"></i><i class="sr-star ai-star"></i><i class="sr-star ai-star"></i><i class="sr-star ai-star"></i><i class="sr-star ai-star"></i>-->
          <!--      </div>-->
          <!--      <div class="d-flex align-items-center"><a class="btn-wishlist" href="#"><i class="ai-heart"></i><span class="btn-tooltip">Wishlist</span></a><span class="btn-divider"></span><a class="btn-addtocart" href="#"><i class="ai-shopping-cart"></i><span class="btn-tooltip">To Cart</span></a></div>-->
          <!--    </div>-->
          <!--  </div>-->
          <!--</div>-->
          <!-- Item-->
          <!--<div class="col-lg-3 col-md-4 col-sm-6 mb-grid-gutter">-->
          <!--  <div class="card card-product card-hover"><a class="card-img-top" href="{{route('single.product')}}"><img src="{{asset('frontend-theme/ruralpure/product/rai.png')}}" alt="Product thumbnail"></a>-->
          <!--    <div class="card-body"><a class="meta-link fs-xs mb-1" href="#"></a>-->
          <!--      <h3 class="fs-md fw-medium mb-2"><a class="meta-link" href="{{route('single.product')}}">Rai</a></h3><span class="text-heading fw-semibold">₹ 154.00</span>-->
          <!--    </div>-->
          <!--    <div class="card-footer">-->
          <!--      <div class="star-rating mt-n1"><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star"></i>-->
          <!--      </div>-->
          <!--      <div class="d-flex align-items-center"><a class="btn-wishlist" href="#"><i class="ai-heart"></i><span class="btn-tooltip">Wishlist</span></a><span class="btn-divider"></span><a class="btn-addtocart" href="#"><i class="ai-shopping-cart"></i><span class="btn-tooltip">To Cart</span></a></div>-->
          <!--    </div>-->
          <!--  </div>-->
          <!--</div>-->
          <!-- Item-->
          <!--<div class="col-lg-3 col-md-4 col-sm-6 mb-grid-gutter">-->
          <!--  <div class="card card-product card-hover"><span class="badge badge-floating rounded-pill bg-danger">Sale</span><a class="card-img-top" href="{{route('single.product')}}"><img src="{{asset('frontend-theme/ruralpure/product/papad.jfif')}}" alt="Product thumbnail"></a>-->
          <!--    <div class="card-body"><a class="meta-link fs-xs mb-1" href="#"></a>-->
          <!--      <h3 class="fs-md fw-medium mb-2"><a class="meta-link" href="{{route('single.product')}}">Papad</a></h3>-->
          <!--      <del class="fs-sm text-muted me-1">₹ 120.40</del><span class="text-heading fw-semibold">₹ 98.75</span>-->
          <!--    </div>-->
          <!--    <div class="card-footer">-->
          <!--      <div class="star-rating mt-n1"><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star"></i>-->
          <!--      </div>-->
          <!--      <div class="d-flex align-items-center"><a class="btn-wishlist" href="#"><i class="ai-heart"></i><span class="btn-tooltip">Wishlist</span></a><span class="btn-divider"></span><a class="btn-addtocart" href="#"><i class="ai-shopping-cart"></i><span class="btn-tooltip">To Cart</span></a></div>-->
          <!--    </div>-->
          <!--  </div>-->
          <!--</div>-->
          <!-- Item-->
          <!--<div class="col-lg-3 col-md-4 col-sm-6 mb-grid-gutter">-->
          <!--  <div class="card card-product card-hover"><a class="card-img-top" href="{{route('single.product')}}"><img src="{{asset('frontend-theme/ruralpure/product/aawla.jfif')}}" alt="Product thumbnail"></a>-->
          <!--    <div class="card-body"><a class="meta-link fs-xs mb-1" href="#"></a>-->
          <!--      <h3 class="fs-md fw-medium mb-2"><a class="meta-link" href="{{route('single.product')}}">Aawla</a></h3><span class="text-heading fw-semibold">₹ 25.99</span>-->
          <!--    </div>-->
          <!--    <div class="card-footer">-->
          <!--      <div class="star-rating mt-n1"><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star"></i><i class="sr-star ai-star"></i>-->
          <!--      </div>-->
          <!--      <div class="d-flex align-items-center"><a class="btn-wishlist" href="#"><i class="ai-heart"></i><span class="btn-tooltip">Wishlist</span></a><span class="btn-divider"></span><a class="btn-addtocart" href="#"><i class="ai-shopping-cart"></i><span class="btn-tooltip">To Cart</span></a></div>-->
          <!--    </div>-->
          <!--  </div>-->
          <!--</div>-->
          <!-- Item-->
          <!--<div class="col-lg-3 col-md-4 col-sm-6 mb-grid-gutter">-->
          <!--  <div class="card card-product card-hover"><span class="badge badge-floating rounded-pill bg-warning">Top rated</span><a class="card-img-top" href="{{route('single.product')}}"><img src="{{asset('frontend-theme/ruralpure/product/dhaniya.jfif')}}" alt="Product thumbnail"></a>-->
          <!--    <div class="card-body"><a class="meta-link fs-xs mb-1" href="#"></a>-->
          <!--      <h3 class="fs-md fw-medium mb-2"><a class="meta-link" href="{{route('single.product')}}">Dhaniya</a></h3><span class="text-heading fw-semibold">₹ 82.00</span>-->
          <!--    </div>-->
          <!--    <div class="card-footer">-->
          <!--      <div class="star-rating mt-n1"><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i>-->
          <!--      </div>-->
          <!--      <div class="d-flex align-items-center"><a class="btn-wishlist" href="#"><i class="ai-heart"></i><span class="btn-tooltip">Wishlist</span></a><span class="btn-divider"></span><a class="btn-addtocart" href="#"><i class="ai-shopping-cart"></i><span class="btn-tooltip">To Cart</span></a></div>-->
          <!--    </div>-->
          <!--  </div>-->
          <!--</div>-->
          <!-- Item-->
          <!--<div class="col-lg-3 col-md-4 col-sm-6 mb-grid-gutter">-->
          <!--  <div class="card card-product card-hover"><a class="card-img-top" href="{{route('single.product')}}"><img src="{{asset('frontend-theme/ruralpure/product/gulkand.jfif')}}" alt="Product thumbnail"></a>-->
          <!--    <div class="card-body"><a class="meta-link fs-xs mb-1" href="#"></a>-->
          <!--      <h3 class="fs-md fw-medium mb-2"><a class="meta-link" href="{{route('single.product')}}">Gulkand</a></h3><span class="text-heading fw-semibold">₹ 49.99</span>-->
          <!--    </div>-->
          <!--    <div class="card-footer">-->
          <!--      <div class="star-rating mt-n1"><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star"></i>-->
          <!--      </div>-->
          <!--      <div class="d-flex align-items-center"><a class="btn-wishlist" href="#"><i class="ai-heart"></i><span class="btn-tooltip">Wishlist</span></a><span class="btn-divider"></span><a class="btn-addtocart" href="#"><i class="ai-shopping-cart"></i><span class="btn-tooltip">To Cart</span></a></div>-->
          <!--    </div>-->
          <!--  </div>-->
          <!--</div>-->
          <!-- Item-->
          <!--<div class="col-lg-3 col-md-4 col-sm-6 d-none d-md-block d-lg-none mb-grid-gutter">-->
          <!--  <div class="card card-product card-hover"><a class="card-img-top" href="{{route('single.product')}}"><img src="{{asset('frontend-theme/ruralpure/product/gunda.jfif')}}" alt="Product thumbnail"></a>-->
          <!--    <div class="card-body"><a class="meta-link fs-xs mb-1" href="#"></a>-->
          <!--      <h3 class="fs-md fw-medium mb-2"><a class="meta-link" href="{{route('single.product')}}">Gaunda</a></h3><span class="text-heading fw-semibold">₹ 140.00</span>-->
          <!--    </div>-->
          <!--    <div class="card-footer">-->
          <!--      <div class="star-rating mt-n1"><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star"></i>-->
          <!--      </div>-->
          <!--      <div class="d-flex align-items-center"><a class="btn-wishlist" href="#"><i class="ai-heart"></i><span class="btn-tooltip">Wishlist</span></a><span class="btn-divider"></span><a class="btn-addtocart" href="#"><i class="ai-shopping-cart"></i><span class="btn-tooltip">To Cart</span></a></div>-->
          <!--    </div>-->
          <!--  </div>-->
          <!--</div>-->
        </div>
        <div class="text-center"><a class="btn btn-outline-primary" href="{{route('all.product')}}">More products</a></div>
      </section>
      <!-- New arrivals (widget) + Promo banner-->
      <!--<section class="container pt-5 mt-3 mt-md-0 pt-md-6 pt-lg-7">-->
      <!--  <div class="row">-->
      <!--    <div class="col-lg-4 d-none d-lg-block">-->
      <!--      <div class="card h-100 p-4">-->
      <!--        <div class="p-2">-->
      <!--          <div class="d-flex justify-content-between align-items-center mb-4 pb-1">-->
      <!--            <h3 class="fs-xl mb-0">New arrivals</h3><a class="fs-sm fw-medium me-n2" href="{{route('categorywise','1')}}">View more<i class="ai-chevron-right fs-lg ms-1 align-middle"></i></a>-->
      <!--          </div>-->
      <!--          <div class="d-flex align-items-center pb-2 mb-1"><a class="d-block flex-shrink-0" href="#"><img class="rounded" src="{{asset('frontend-theme/around/img/demo/shop-homepage/thumbnails/04.jpg')}}" alt="Product" width="60"></a>-->
      <!--            <div class="ps-2 ms-1">-->
      <!--              <h4 class="fs-md nav-heading mb-1"><a class="fw-medium" href="#">Papads</a></h4>-->
      <!--              <p class="fs-sm mb-0">₹ 27.50</p>-->
      <!--            </div>-->
      <!--          </div>-->
      <!--          <div class="d-flex align-items-center pb-2 mb-1"><a class="d-block flex-shrink-0" href="#"><img class="rounded" src="{{asset('frontend-theme/around/img/demo/shop-homepage/thumbnails/05.jpg')}}" alt="Product" width="60"></a>-->
      <!--            <div class="ps-2 ms-1">-->
      <!--              <h4 class="fs-md nav-heading mb-1"><a class="fw-medium" href="#">Pickles</a></h4>-->
      <!--              <p class="fs-sm mb-0">₹ 364.99</p>-->
      <!--            </div>-->
      <!--          </div>-->
      <!--          <div class="d-flex align-items-center pb-2 mb-1"><a class="d-block flex-shrink-0" href="#"><img class="rounded" src="{{asset('frontend-theme/around/img/demo/shop-homepage/thumbnails/02.jpg')}}" alt="Product" width="60"></a>-->
      <!--            <div class="ps-2 ms-1">-->
      <!--              <h4 class="fs-md nav-heading mb-1"><a class="fw-medium" href="#">Cosmetics</a></h4>-->
      <!--              <p class="fs-sm mb-0">₹ 145.00</p>-->
      <!--            </div>-->
      <!--          </div>-->
      <!--          <div class="d-flex align-items-center"><a class="d-block flex-shrink-0" href="#"><img class="rounded" src="{{asset('frontend-theme/around/img/demo/shop-homepage/thumbnails/06.jpg')}}" alt="Product" width="60"></a>-->
      <!--            <div class="ps-2 ms-1">-->
      <!--              <h4 class="fs-md nav-heading mb-1"><a class="fw-medium" href="#">leather Bag</a></h4>-->
      <!--              <p class="fs-sm mb-0">₹ 258.00</p>-->
      <!--            </div>-->
      <!--          </div>-->
      <!--        </div>-->
      <!--      </div>-->
      <!--    </div>-->
      <!--    <div class="col-lg-8">-->
      <!--      <div class="bg-secondary rounded-3 pt-5 px-3 ps-sm-5 pe-sm-2">-->
      <!--        <div class="d-sm-flex align-items-end text-center text-sm-start ps-2">-->
      <!--          <div class="me-sm-n6 pb-5">-->
      <!--            <h2 class="h1 text-sm-nowrap">Virtual Reality</h2>-->
      <!--            <p class="pb-2 mx-auto mx-sm-0" style="max-width: 14rem;">Gadgets from top brands at discounted price</p>-->
      <!--            <div class="d-inline-block bg-faded-danger text-danger fs-sm fw-medium rounded-1 px-3 py-2">Limited time offer</div>-->
      <!--            <div class="countdown pt-3 h4 justify-content-center justify-content-sm-start" data-countdown="10/01/2021 07:00:00 PM">-->
      <!--              <div class="countdown-days"><span class="countdown-value">0</span><span class="countdown-label fs-xs text-muted">Days</span></div>-->
      <!--              <div class="countdown-hours"><span class="countdown-value">0</span><span class="countdown-label fs-xs text-muted">Hours</span></div>-->
      <!--              <div class="countdown-minutes"><span class="countdown-value">0</span><span class="countdown-label fs-xs text-muted">Mins</span></div>-->
      <!--            </div><a class="btn btn-primary" href="#">Get one now</a>-->
      <!--          </div>-->
      <!--          <div><img src="{{asset('frontend-theme/around/img/demo/shop-homepage/banner.png')}}" alt="Promo banner"></div>-->
      <!--        </div>-->
      <!--      </div>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</section>-->
      <!-- Brands-->
      <!--<section class="container pt-5 mt-3 mt-md-0 pt-md-6 pt-lg-7 pb-md-4">-->
      <!--  <h2 class="mb-5 text-center">Shop by Category</h2>-->
      <!--  <div class="row">-->
      <!--    <div class="col-md-3 col-sm-4 col-6 mb-grid-gutter"><a class="card border-0 shadow card-hover py-3 py-sm-4" href="{{route('categorywise','1')}}">-->
      <!--        <div class="card-body px-1 py-0 text-center">-->
      <!--          <img src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/50/000000/external-grocery-grocery-flatart-icons-outline-flatarticons.png"/>-->
                <!--<img src="{{asset('frontend-theme/ruralpure/488D6D0A-971D-4218-B6F4-2735A50CF669_4_5005_c.jpeg')}}" style="height:120px">-->
      <!--        </div>-->
      <!--        <p class="m-auto mt-2">Grocery & Gourmet Food</p>-->
      <!--      </a>-->
            
      <!--      </div>-->
      <!--    <div class="col-md-3 col-sm-4 col-6 mb-grid-gutter"><a class="card border-0 shadow card-hover py-3 py-sm-4" href="{{route('categorywise','1')}}">-->
      <!--        <div class="card-body px-1 py-0 text-center">-->
      <!--          <img src="https://img.icons8.com/windows/50/000000/food-bar.png"/>-->
                 <!--<img src="{{asset('frontend-theme/ruralpure/5DF55425-8924-4FA6-9DD7-E72214FFC92B_4_5005_c.jpeg')}}" style="height:120px">-->
      <!--        </div>-->
      <!--        <p class="m-auto mt-2">Mouth Freshners</p>-->
      <!--        </a>-->
      <!--  </div>-->
      <!--    <div class="col-md-3 col-sm-4 col-6 mb-grid-gutter"><a class="card border-0 shadow card-hover py-3 py-sm-4" href="{{route('categorywise','1')}}">-->
      <!--        <div class="card-body px-1 py-0 text-center">-->
      <!--          <img src="https://img.icons8.com/ios-filled/50/000000/mortar-and-pestle.png"/>-->
                 <!--<img src="{{asset('frontend-theme/ruralpure/A16D6644-BED9-492F-84B1-D2D6576A7296.jpeg')}}" style="height:120px">-->
      <!--         </div>-->
      <!--         <p class="m-auto mt-2">Ayurveda</p>-->
      <!--         </a></div>-->
      <!--    <div class="col-md-3 col-sm-4 col-6 mb-grid-gutter"><a class="card border-0 shadow card-hover py-3 py-sm-4" href="{{route('categorywise','1')}}">-->
      <!--        <div class="card-body px-1 py-0 text-center">-->
                 <!--<i class="ai-youtube category-icon"></i>-->
      <!--           <img src="https://img.icons8.com/ios-filled/50/000000/joiner.png"/>-->
                  <!--<img src="{{asset('frontend-theme/ruralpure/D3A17A60-1EFB-4857-8047-F721A3FD1688.jpeg')}}" style="height:120px">-->
      <!--          </div>-->
      <!--          <p class="m-auto mt-2">Handicrafts</p>-->
      <!--          </a></div>-->
      <!--  </div>-->
         <!--<div class="text-center mt-4"><a class="btn btn-outline-primary" href="{{route('categorywise','1')}}"> More Categories </a></div>-->
      <!--</section>-->
      <!-- Reviews-->
      <section class="bg-secondary py-5 py-md-6 mt-4 mt-md-5">
        <div class="container-fluid py-3 py-md-0">
          <h2 class="mb-5 text-center">Trusted reviews</h2>
          <div class="tns-carousel-wrapper">
            <div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: false, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1, &quot;gutter&quot;: 16}, &quot;520&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 12}, &quot;860&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 23}, &quot;1080&quot;:{&quot;items&quot;:4, &quot;gutter&quot;: 23}, &quot;1380&quot;:{&quot;items&quot;:5, &quot;gutter&quot;: 23}, &quot;1600&quot;:{&quot;items&quot;:6, &quot;gutter&quot;: 23}}}">
              <!-- Review Card-->
              <div class="py-2">
                <div class="card h-100 border-0 shadow mx-1">
                  <div class="card-body"><a class="d-flex align-items-center nav-heading mb-3" href="#"><img src="{{asset('frontend-theme/around/img/demo/shop-homepage/thumbnails/spices.jpg')}}" alt="Product thumb" width="60">
                      <div class="fs-md fw-medium ps-2 ms-1">Spices</div></a>
                    <div class="mb-2 pb-1 star-rating mt-n1"><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star"></i>
                    </div>
                    <p class="fs-sm mb-0">The spices are so flavorful, I'm delighted to taste them.</p>
                  </div>
                  <footer class="fs-sm px-4 pb-4">
                    <div class="d-flex align-items-center border-top mb-n2 pt-3"><img class="rounded-circle" src="{{asset('frontend-theme/around/img/testimonials/01.jpg')}}" alt="Emma Brown" width="42">
                      <div class="text-heading fw-medium ps-2 ms-1 mt-n1">Anamika Gupta</div>
                    </div>
                  </footer>
                </div>
              </div>
              <!-- From Instagram-->
              <div class="py-2"><a class="card h-100 border-0 shadow mx-1" href="#"><span class="card-floating-icon"><i class="ai-instagram"></i></span><img class="card-img-top" src="{{asset('frontend-theme/around/img/demo/shop-homepage/instagram/spices.jpg')}}" alt="Image">
                  <footer class="fs-sm mt-auto py-2 px-4">
                    <div class="d-flex align-items-center py-2"><img class="rounded-circle" src="{{asset('frontend-theme/around/img/testimonials/02.jpg')}}" alt="@morni.janeffel" width="42">
                      <div class="text-heading fw-medium ps-2 ms-1 mt-n1">@dev.sthal</div>
                    </div>
                  </footer></a></div>
              <!-- Review Card-->
              <div class="py-2">
                <div class="card h-100 border-0 shadow mx-1">
                  <div class="card-body"><a class="d-flex align-items-center nav-heading mb-3" href="#"><img src="{{asset('frontend-theme/around/img/demo/shop-homepage/thumbnails/mango-pickle.jpg')}}" alt="Product thumb" width="60">
                      <div class="fs-md fw-medium ps-2 ms-1">Pickle</div></a>
                    <div class="mb-2 pb-1 star-rating mt-n1"><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i>
                    </div>
                    <p class="fs-sm mb-0"> It seems so pure and unblended that I can't stop drooling over it's taste. I'm so excited for my next order.</p>
                  </div>
                  <footer class="fs-sm px-4 pb-4">
                    <div class="d-flex align-items-center border-top mb-n2 pt-3"><img class="rounded-circle" src="{{asset('frontend-theme/around/img/testimonials/06.jpg')}}" alt="Edward Chew" width="42">
                      <div class="text-heading fw-medium ps-2 ms-1 mt-n1">Yaman</div>
                    </div>
                  </footer>
                </div>
              </div>
              <!-- From Instagram-->
              <div class="py-2"><a class="card h-100 border-0 shadow mx-1" href="#"><span class="card-floating-icon"><i class="ai-instagram"></i></span><img class="card-img-top" src="{{asset('frontend-theme/around/img/demo/shop-homepage/instagram/istockphoto-697860312-612x612.jpg')}}" alt="Image">
                  <footer class="fs-sm mt-auto py-2 px-4">
                    <div class="d-flex align-items-center py-2"><img class="rounded-circle" src="{{asset('frontend-theme/around/img/testimonials/09.jpg')}}" alt="@jane.palson" width="42">
                      <div class="text-heading fw-medium ps-2 ms-1 mt-n1">@smita.singh</div>
                    </div>
                  </footer></a></div>
              <!-- Review Card-->
              <div class="py-2">
                <div class="card h-100 border-0 shadow mx-1">
                  <div class="card-body"><a class="d-flex align-items-center nav-heading mb-3" href="#"><img src="{{asset('frontend-theme/ruralpure/product/papad.jfif')}}" alt="Product thumb" width="60">
                      <div class="fs-md fw-medium ps-2 ms-1">Papad</div></a>
                    <div class="mb-2 pb-1 star-rating mt-n1"><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star"></i>
                    </div>
                    <p class="fs-sm mb-0"> Oh my God! The quality of that Camel leather is so pious. The touch, the texture, the class, everything is so on point..</p>
                  </div>
                  <footer class="fs-sm px-4 pb-4">
                    <div class="d-flex align-items-center border-top mb-n2 pt-3"><img class="rounded-circle" src="{{asset('frontend-theme/around/img/testimonials/03.jpg')}}" alt="Tim Brooks" width="42">
                      <div class="text-heading fw-medium ps-2 ms-1 mt-n1">Mohit Patel</div>
                    </div>
                  </footer>
                </div>
              </div>
              <!-- From Instagram-->
              <div class="py-2"><a class="card h-100 border-0 shadow mx-1" href="#"><span class="card-floating-icon"><i class="ai-instagram"></i></span><img class="card-img-top" src="{{asset('frontend-theme/around/img/demo/shop-homepage/instagram/03.jpg')}}" alt="Image">
                  <footer class="fs-sm mt-auto py-2 px-4">
                    <div class="d-flex align-items-center py-2"><img class="rounded-circle" src="{{asset('frontend-theme/around/img/testimonials/05.jpg')}}" alt="@sarah.cole" width="42">
                      <div class="text-heading fw-medium ps-2 ms-1 mt-n1">@roohi.lamba</div>
                    </div>
                  </footer></a></div>
              <!-- Review Card-->
              <div class="py-2">
                <div class="card h-100 border-0 shadow mx-1">
                  <div class="card-body"><a class="d-flex align-items-center nav-heading mb-3" href="#"><img src="{{asset('frontend-theme/around/img/demo/shop-homepage/thumbnails/gutka.jfif')}}" alt="Product thumb" width="60">
                      <div class="fs-md fw-medium ps-2 ms-1">gutka</div></a>
                    <div class="mb-2 pb-1 star-rating mt-n1"><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star"></i>
                    </div>
                    <p class="fs-sm mb-0"> Oh my God! The quality of that Camel leather is so pious. The touch, the texture, the class, everything is so on point...</p>
                  </div>
                  <footer class="fs-sm px-4 pb-4">
                    <div class="d-flex align-items-center border-top mb-n2 pt-3"><img class="rounded-circle" src="{{asset('frontend-theme/around/img/testimonials/04.jpg')}}" alt="Michael Smith" width="42">
                      <div class="text-heading fw-medium ps-2 ms-1 mt-n1">Manak Surya</div>
                    </div>
                  </footer>
                </div>
              </div>
              <!-- From Instagram-->
              <div class="py-2"><a class="card h-100 border-0 shadow mx-1" href="#"><span class="card-floating-icon"><i class="ai-instagram"></i></span><img class="card-img-top" src="{{asset('frontend-theme/around/img/demo/shop-homepage/instagram/gutka.jfif')}}" alt="Image">
                  <footer class="fs-sm mt-auto py-2 px-4">
                    <div class="d-flex align-items-center py-2"><img class="rounded-circle" src="{{asset('frontend-theme/around/img/testimonials/02.jpg')}}" alt="@morni.janeffel" width="42">
                      <div class="text-heading fw-medium ps-2 ms-1 mt-n1">@binny.kakkar</div>
                    </div>
                  </footer></a></div>
            </div>
          </div>
        </div>
      </section>
    </main>
    
    @if(Session::get('success'))
        // <script>
        //     Swal.fire({
        //         icon: 'success',
        //         text: "{{session()->get('success')}}",
        //         toast: true,
        //         position: 'top-right',
        //         timer: 5000,
        //         showConfirmButton: false,
        //          timerProgressBar: true,
        //         })
        // </script>
     @endif
    
    <script>
        function hover(description) {
            console.log(description);
            document.getElementById('onhover').innerHTML = description;
        }
    </script>
   
   
    @endsection