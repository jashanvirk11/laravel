@extends('layouts.around-header')
@section('page-title') 
   UniqueProduct
@endsection
@section('meta-schema')
@endsection
@section('custom-css')

@endsection
@section('main')
<section class="position-relative   pt-5 pt-lg-6 pb-7 mb-7" style="background-color:#87ceeb">
        <div class="shape shape-bottom shape-curve bg-body">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3000 185.4">
            <path fill="currentColor" d="M3000,0v185.4H0V0c496.4,115.6,996.4,173.4,1500,173.4S2503.6,115.6,3000,0z"></path>
          </svg>
        </div>
  
    
 <div class="container pb-7">
          <div class="row align-items-center pb-7">
            <div class="col-lg-3">
              <ul class="nav nav-tabs media-tabs media-tabs-light justify-content-center justify-content-lg-start pb-3 mb-4 pb-lg-0 mb-lg-0" role="tablist">
                  @foreach($popular_product as $key => $popular_product)
                  @php
                  $name = str_replace(' ', '-', $popular_product->name);
                  @endphp
                  @if($key == '0')
                <li class="nav-item me-3 mb-3"><a class="nav-link active" href="#camera" data-bs-toggle="tab" role="tab">
                    <div class="d-flex align-items-center"><img class="flex-shrink-0 rounded" src="{{asset('uploads')}}/{{ $popular_product->cover_photo }}" alt="{{ $popular_product->name }}" width="60">
                      <div class="w-100 ps-2 ms-1">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="fs-sm pe-1">{{$popular_product->name}}</div><i class="ai-chevron-right lead ms-2 me-1"></i>
                        </div>
                      </div>
                    </div></a></li>
                @else
                <li class="nav-item me-3 mb-3"><a class="nav-link" href="#{{$name}}" data-bs-toggle="tab" role="tab">
                    <div class="d-flex align-items-center"><img class="flex-shrink-0 rounded" src="{{asset('uploads')}}/{{ $popular_product->cover_photo }}" alt="{{ $popular_product->name }}" width="60">
                      <div class="w-100 ps-2 ms-1">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="fs-sm pe-1">{{$popular_product->name}}</div><i class="ai-chevron-right lead ms-2 me-1"></i>
                        </div>
                      </div>
                    </div></a></li>
                    @endif
                    @endforeach
              
               
              </ul>
            </div>
            <div class="col-lg-9">
              <div class="tab-content">
                    @foreach($popular_product1 as $key => $popular_product1)
                    @php
                  $name = str_replace(' ', '-', $popular_product1->name);
                  @endphp
                @if($key == '0')
                <div class="tab-pane fade show active" id="camera">
                  <div class="row align-items-center">
                    <div class="col-lg-6 order-lg-2 pb-1 mb-4 pb-lg-0 mb-lg-0">
                      <div class="mx-auto" style="max-width: 400px;"><img src="{{asset('uploads')}}/{{ $popular_product1->cover_photo }}" alt="{{$popular_product1->name}}"></div>
                    </div>
                    <div class="col-lg-6 order-lg-1 text-center text-lg-start">
                      <div class="ps-xl-5">
                        <h2 class="h1 text-light">{{$popular_product1->name}}</h2>
                        <p class="fs-lg text-light mb-lg-5">Stay connected 24/7.</p><a class="btn btn-translucent-light" href="{{route('single.product',$popular_product1->id)}}">Get now - ${{$popular_product1->price}}</a>
                      </div>
                    </div>
                  </div>
                </div>
                @else
                <div class="tab-pane fade" id="{{$name}}">
                  <div class="row align-items-center">
                    <div class="col-lg-6 order-lg-2 pb-1 mb-4 pb-lg-0 mb-lg-0">
                      <div class="mx-auto" style="max-width: 400px;"><img src="{{asset('uploads')}}/{{ $popular_product1->cover_photo }}" alt="{{$popular_product1->name}}"></div>
                    </div>
                    <div class="col-lg-6 order-lg-1 text-center text-lg-start">
                      <div class="ps-xl-5">
                        <h2 class="h1 text-light">{{$popular_product1->name}}</h2>
                        <p class="fs-lg text-light mb-lg-5">Stay connected 24/7.</p><a class="btn btn-translucent-light" href="{{route('single.product',$popular_product1->id)}}">Get now - ${{$popular_product1->price}}</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endif
                @endforeach
           
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Categories (carousel)-->
    <section class="container position-relative zindex-5" style="margin-top: -290px;">
     
        <div class="tns-carousel-wrapper">
          <div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 3, &quot;controls&quot;: false, &quot;gutter&quot;: 24, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;560&quot;:{&quot;items&quot;:2},&quot;850&quot;:{&quot;items&quot;:3}}}">
            <!-- Category-->
              @if(!$categories->isEmpty())
                @foreach($categories as $category)
                      <div class="pb-2"><a class="card card-category shadow mx-1" href="{{route('categorywise',$category->id)}}">
                          <!--<span class="badge badge-lg badge-floating badge-floating-end bg-success">From ₹ 8.99</span>-->
                    <img class="card-img-top" src="{{asset('uploads')}}/{{ $category->image }}" alt="{{ $category->name }}">
                        <div class="card-body text-center">
                          <h4 class="card-title">{{ $category->name }}</h4>
                        </div></a>
                    </div>
                   
                @endforeach
            @endif
            <!-- Category-->
          </div>
        </div>
      </section>
      <!-- Trending products (grid)-->
      <section class="container pt-5 mt-5 mt-md-0 pt-md-6 pt-lg-7">
        <h2 class="text-center mb-5">All Products</h2>
        <div class="row pb-1">
          <!-- Item-->
           @if(!$products->isEmpty())
              @foreach($products as $product)
                      @php 
                     $product_name = str_replace(' ', '-',strtolower($product->name));
                     $product_category=  str_replace(' ', '-',strtolower($product->cover_photo));
                   $remaining_value = $product->dealer_price -  $product->price;
                   $total =   ($product->dealer_price + $product->price);
                   $discount = ($remaining_value/$product->dealer_price)*100;
                   $discount =  number_format($discount)
                     @endphp
     
          <div class="col-lg-3 col-md-4 col-sm-6 mb-grid-gutter">
              @if($product->dealer_price != null)
              <span class="badge badge-floating badge-pill  ml-3 badge-danger">
                  {{$discount}}% Discount</span>
                  @endif
            <div class="card card-product card-hover"><a class="card-img-top" href="{{route('single.product',$product->id)}}">
                
                <img src="{{asset('uploads')}}/{{ $product->cover_photo }}" alt="{{ $product->name }}"></a>
              <div class="card-body">
                <h3 class="fs-md fw-medium mb-2"><a class="meta-link" href="{{route('single.product',$product->id)}}">{{ $product->name }}</a></h3>
                @if($product->dealer_price != null)
                <span class="text-heading fw-semibold">$<strike>{{ $product->dealer_price }}</strike></span>
                <br>
                
                 <span class="text-heading fw-semibold">${{$product->price  }}</span>
                 @else
                    <span class="text-heading fw-semibold">${{ $product->price }}</span>
                 @endif
              </div>
              <div class="card-footer">
                <div class="star-rating mt-n1"><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star"></i><i class="sr-star ai-star"></i>
                </div>
                <div class="d-flex align-items-center">
                    <a class="btn-wishlist" href="#"><i class="ai-heart"></i><span class="btn-tooltip">Wishlist</span></a>
                    <span class="btn-divider"></span>
                      <!--<a class="btn-addtocart add_to_cart" href="javascript:void(0)" data-id="{{ $product->id }}">-->
                     <a class="btn-addtocart add_to_cart" href="{{route('add.to.cart',$product->id) }}" data-id="{{ $product->id }}">
                        <i class="ai-shopping-cart"></i><span class="btn-tooltip">To Cart</span>
                    </a>
                    </div>
              </div>
            </div>
          </div>
          @endforeach
               @endif
              {{ $products->links() }}
    
        </div>
        <div class="text-center"><a class="btn btn-outline-primary my-1" href="{{route('all.product')}}">More products</a></div>
      </section>
      {{-- <section class="bg-secondary py-5 py-md-6 mt-3 mt-md-3">
        <div class="container-fluid py-3 py-md-0">
          <h2 class="mb-5 text-center">Trusted reviews</h2>
          <div class="tns-carousel-wrapper">
            <div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: false, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1, &quot;gutter&quot;: 16}, &quot;520&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 12}, &quot;860&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 23}, &quot;1080&quot;:{&quot;items&quot;:4, &quot;gutter&quot;: 23}, &quot;1380&quot;:{&quot;items&quot;:5, &quot;gutter&quot;: 23}, &quot;1600&quot;:{&quot;items&quot;:6, &quot;gutter&quot;: 23}}}">
              <!-- Review Card-->
             @if($reviews->count())
                  @foreach($reviews as $review)
                    <div class="py-2">
                        <div class="card h-100 border-0 shadow mx-1">
                          <div class="card-body"><a class="d-flex align-items-center nav-heading mb-3" href="#">
                              <img src="{{asset('uploads')}}/{{ $review->product['cover_photo'] }}" alt="Product thumb" width="60">
                              <div class="fs-md fw-medium ps-2 ms-1">{{ $review->product['name'] }}</div></a>
                            <div class="mb-2 pb-1 star-rating mt-n1">
                            @switch($review->rating)
                                @case(1)
                                <i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled"></i><i class="sr-star ai-star-filled "></i><i class="sr-star ai-star-filled "></i><i class="sr-star ai-star"></i>
                                @break
                                
                                @case(2)
                                    <i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled "></i><i class="sr-star ai-star-filled "></i><i class="sr-star ai-star"></i>
                                @break
                                 @case(3)
                                    <i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled "></i><i class="sr-star ai-star"></i>
                                @break
                                 @case(4)
                                    <i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star"></i>
                                @break
                                
                                @default
                                  <i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i>  
                            @endswitch
                              
                               
                            </div>
                            <p class="fs-sm mb-0">{{ $review->message  }}</p>
                          </div>
                          <footer class="fs-sm px-4 pb-4">
                            <div class="d-flex align-items-center border-top mb-n2 pt-3"><img class="rounded-circle" src="{{asset('frontend-theme/around/img/testimonials/01.jpg')}}" alt="Emma Brown" width="42">
                              <div class="text-heading fw-medium ps-2 ms-1 mt-n1">{{ $review->user->name }}</div>
                            </div>
                          </footer>
                        </div>
                  </div>
                  @endforeach
              @endif
               
              
             
              
            </div>
          </div>
        </div>
      </section>--}}
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
</main>     
       <script>
        function hover(description) {
            console.log(description);
            document.getElementById('onhover').innerHTML = description;
        }
 function myFunction() {
  var x = document.getElementById("onhover").innerText;
  document.getElementById("demo").innerHTML = x;  
}
    </script>
@endsection