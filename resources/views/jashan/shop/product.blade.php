@extends('layouts.around-header')
@section('page-title') 
    Product| 
@endsection
@section('meta-schema')
@endsection
@section('custom-css')
@endsection
@section('main')

    <link type="text/css" rel="stylesheet" media="all" href="https://unpkg.com/xzoom/dist/xzoom.css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <!-- Add fancyBox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/xzoom/dist/xzoom.min.js"></script>
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5fa62f07f112000012bcb4ce&product=inline-share-buttons" async="async"></script>
    <link type="text/css" rel="stylesheet" media="all" href="{{asset('mklb/css/mklb.css')}}" />
    
      <!-- Page content-->
      <!-- Product gallery + info-->
      <section class="sidebar-enabled sidebar-end border-bottom mb-5 mb-md-6">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 content py-4">
              <nav aria-label="breadcrumb mb-3 pb-4" >
                <ol class="py-1 my-2 breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Shop</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">{{$product->name }}</li>
                </ol>
              </nav>
             
            
                <div class="product-gallery">
                    <div class="product-gallery-preview order-sm-2">
                        <div class="product-gallery-preview-item active" id="first"><img src="{{asset('uploads')}}/{{$product->cover_photo}}" alt="Product preview"></div>
                        @foreach($product->images as $image)
                        <div class="product-gallery-preview-item" id="{{$image->id}}"><img src="{{asset('uploads')}}/{{$image->path}}" alt="Product preview"></div>
                        @endforeach
                    </div>
                    <div class="product-gallery-thumblist order-sm-1">
                        <a class="product-gallery-thumblist-item" href="#first"><img src="{{asset('uploads')}}/{{$product->cover_photo}}" alt="Product thumb"></a>
                         @foreach($product->images as $image)
                            <a class="product-gallery-thumblist-item {{$image->id}}" href="#{{$image->id}}"><img src="{{asset('uploads')}}/{{$image->path}}" alt="Product thumb" data-id="{{$image->id}}"></a>
                        @endforeach
                    </div>
                </div>
              <!-- Sharing-->
              <!--<div class="d-flex align-items-center justify-content-center justify-content-md-end py-4 pt-md-0 pt-lg-5">-->
              <!--  <h6 class="text-nowrap my-2 me-3">Share product:</h6><a class="btn-social bs-outline bs-facebook ms-2 my-2" href="#"><i class="ai-facebook"></i></a><a class="btn-social bs-outline bs-twitter ms-2 my-2" href="#"><i class="ai-twitter"></i></a><a class="btn-social bs-outline bs-google ms-2 my-2" href="#"><i class="ai-google"></i></a><a class="btn-social bs-outline bs-email ms-2 my-2" href="#"><i class="ai-mail"></i></a>-->
              
              <!--</div>-->
            </div>
            <!-- Product info-->
            <div class="col-lg-4 sidebar bg-secondary pt-5 ps-lg-4 pb-md-2">
              <div class="ps-lg-4 pb-5 ">
                  <a class="d-inline-block text-decoration-none" href="#reviews" data-scroll>
                      <h2>{{ $product->name }}</h2>
                      <div class="star-rating-lg mt-n1 me-2 star-rating mt-n1">
                          <i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star"></i>
                      </div>
                 </a>
                 <div class="d-flex align-items-center justify-content-between pt-4">
                  <label class="mb-0"> <p><strong>Weight:</strong>&nbsp;&nbsp; {{ $product->weight}}</p></label>
                </div>
                <div class="d-flex align-items-center justify-content-between py-2">
                  <label class="mb-0"> <p><strong>Quantity:</strong>&nbsp;&nbsp; {{ $product->qty}} </p></label>
                  
                    
                </div>
                <div class="d-flex align-items-center justify-content-between py-2">
                  <label class="mb-0">  <p><strong>Price:</strong>&nbsp;&nbsp;<span class="h4 mb-0 ml-1"> Rs {{$product->price}}</span></p></label>
                </div>
                
              
                <!--<div class="form-group">-->
                <!--   <label for="title">Your Area Postcode To check Corrier Service avialable for your Area or not <span><strong>*</strong></span></label>-->
                <!--    <input type="text" class="form-control d-block w-100 mb-grid-gutter pin" placeholder="Enter Area Pin Code" name="pin" required/>-->
                <!--</div>-->
                
           
                <form action="{{route('add.to.cart',$product->id)}}" method="Post">
                    @csrf
                @if(Session::has('user_session'))
                    @if($product->isCart($product->id))
                    <a href="{{route('checkout')}}" style="text-decoration: none;"><button class="btn btn-outline-secondary btn-sm d-block w-100 mb-grid-gutter" type="button"><i class="ai-shopping-cart fs-lg"></i>Go To Cart</button></a>
                    @else
                     <div class="form-group">
                       <label for="title">Your Area Postcode To check Corrier Service avialable for your Area or not <span><strong>*</strong></span></label>
                        <input type="text" class="form-control d-block w-100 mb-grid-gutter pin" id="pincode" value="{{ Session::get('postcode') ?? '' }}" placeholder="Enter Area Pin Code" name="pin" required/>
                        <h6 id="pinmessage"></h6>
                        @if(Session::has('postcode'))
                        <div class="serviceable" style="color:green">Service Available at {{Session::get('postcode')}} </div>
                        @else
                        <div class="serviceable"></div>
                        @endif
                    </div> 
                    <div class="form-group">
                       <label for="title">How Many Do You want ?</label>
                       <div class="container d-block w-100 mb-grid-gutter ">
                        <input type="button" onclick="decrementValue()" value="-" />
                        <input type="text" class="quantity" name="quantity" value="1" maxlength="2" max="10" size="1" id="number" />
                        <input type="button" onclick="incrementValue()" value="+" />
                            
                        </div>
                    </div>
                    <!--<a href="{{route('add.to.cart',$product->id)}}" style="text-decoration: none;"><button class="btn btn-outline-secondary btn-sm d-block w-100 mb-grid-gutter" type="button" data-id="{{$product->id}}"><i class="ai-shopping-cart fs-lg"></i>Add to Cart .</button></a>-->
                    <button class="btn btn-outline-secondary btn-sm d-block w-100 mb-grid-gutter" type="submit"><i class="ai-shopping-cart fs-lg"></i>Add to Cart </button>
                    @endif
                @else
                    @if(Session::has('cart'))
                        @if(array_key_exists($product->id, Session::get('cart')))
                            <a href="{{route('checkout')}}" style="text-decoration: none;"><button class="btn btn-outline-secondary btn-sm d-block w-100 mb-grid-gutter" type="button"><i class="ai-shopping-cart fs-lg"></i>Go To Cart</button></a>
                        @else
                        <div class="form-group">
                           <label for="title">Your Area Postcode To check Corrier Service avialable for your Area or not <span><strong>*</strong></span></label>
                            <input type="text" class="form-control d-block w-100 mb-grid-gutter pin" placeholder="Enter Area Pin Code" value="{{ Session::get('postcode') ?? '' }}" name="pin" required/>
                            <h6 id="pinmessage"></h6>
                            @if(Session::has('postcode'))
                            <div class="serviceable" style="color:green">Service Available at {{Session::get('postcode')}}</div>
                            @else
                            <div class="serviceable"></div>
                            @endif
                        </div>
                         <div class="form-group">
                           <label for="title">How Many Do You want ?</label>
                           <div class="container d-block w-100 mb-grid-gutter">
                            <input type="button" onclick="decrementValue()" value="-" />
                            <input type="text" class="quantity" name="quantity" value="1" maxlength="2" max="10" size="1" id="number" />
                            <input type="button" onclick="incrementValue()" value="+" />
                                
                            </div>
                        </div>
                         <!--<a href="{{route('add.to.cart',$product->id)}}" style="text-decoration: none;"><button class="btn btn-outline-secondary btn-sm d-block w-100 mb-grid-gutter" type="button" data-id="{{$product->id}}"><i class="ai-shopping-cart fs-lg"></i>Add to Cart</button></a>-->
                        <button class="btn btn-outline-secondary btn-sm d-block w-100 mb-grid-gutter" type="submit"><i class="ai-shopping-cart fs-lg"></i>Add to Cart </button>
                        @endif
                    @else
                    <div class="form-group">
                       <label for="title">Your Area Postcode To check Corrier Service avialable for your Area or not <span><strong>*</strong></span></label>
                        <input type="text" class="form-control d-block w-100 mb-grid-gutter pin" id="pincode" value="{{ Session::get('postcode') ?? '' }}" placeholder="Enter Area Pin Code" name="pin" required/>
                        <h6 id="pinmessage"></h6>
                        @if(Session::has('postcode'))
                        <div class="serviceable" style="color:green">Service Available at {{Session::get('postcode')}}</div>
                        @else
                        <div class="serviceable"></div>
                        @endif
                    </div>
                     <div class="form-group">
                       <label for="title">How Many Do You want ?</label>
                       <div class="container d-block w-100 mb-grid-gutter">
                        <input type="button" onclick="decrementValue()" value="-" />
                        <input type="text" class="quantity" name="quantity" value="1" maxlength="2" max="10" size="1" id="number" />
                        <input type="button" onclick="incrementValue()" value="+" />
                            
                        </div>
                    </div>
                     <!--<a href="{{route('add.to.cart',$product->id)}}" style="text-decoration: none;"><button class="btn btn-outline-secondary btn-sm d-block w-100 mb-grid-gutter" type="button" data-id="{{$product->id}}"><i class="ai-shopping-cart fs-lg"></i>Add to Cart</button></a>-->
                    <button class="btn btn-outline-secondary btn-sm d-block w-100 mb-grid-gutter" type="submit"><i class="ai-shopping-cart fs-lg"></i>Add to Cart </button>
                    @endif
                <!--<button class="btn btn-outline-secondary btn-sm d-block w-100 mb-grid-gutter add_to_cart" type="button" data-id="{{$product->id}}"><i class="ai-shopping-cart fs-lg"></i>Add to Cart</button>-->
                 
                @endif
                </form>
                 
                
               <a href="{{route('categorywise',$product->categoryName($product->sub_category_id))}}" style="text-decoration: none;"><button class="btn btn-outline-secondary btn-sm d-block w-100 mb-grid-gutter" type="button">Back To Shop</button></a>
                
                <!--<hr class="my-4">-->
                <!--<p class="fs-sm mb-2">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae.</p><a class="fancy-link fs-sm" href="#more-info" data-scroll>Read more</a>-->
                
                <hr class="my-4">
                <ul class="list-unstyled fs-sm">
                  <li><span class="text-heading fw-medium me-2">SKU:</span>HB125CAE78</li>
                  <li><span class="text-heading fw-medium me-2">Category:</span><a class="text-body text-decoration-none" href="{{route('categorywise',$product->categoryName($product->sub_category_id))}}">{{$product->categoryName($product->sub_category_id)}}</a></li>
                  <li><span class="text-heading fw-medium me-2">Sub-Category:</span><a class="text-body text-decoration-none" href="{{route('subcategorywise',$product->subcategoryName($product->sub_category_id))}}">{{$product->subcategoryName($product->sub_category_id)}}</a></li>
                </ul>
                <hr class="my-4">
                <!-- <div class="d-flex align-items-center py-4 pt-md-0 pt-lg-5">-->
                <!--    <h6 class="text-nowrap my-2 me-3">Share product:</h6>-->
                <!--    <a class="btn-social bs-outline bs-facebook ms-2 my-2" href="#"><i class="ai-facebook"></i></a><a class="btn-social bs-outline bs-twitter ms-2 my-2" href="#"><i class="ai-twitter"></i></a><a class="btn-social bs-outline bs-google ms-2 my-2" href="#"><i class="ai-google"></i></a><a class="btn-social bs-outline bs-email ms-2 my-2" href="#"><i class="ai-mail"></i></a>-->
                <!--</div>-->
                 <div class="pd-share">
                     <h6 class="text-nowrap my-2 me-3">Share product:</h6>
                    <div class="p-code">
                        <div id="social"><a class="facebookBtn smGlobalBtn" href="https://www.facebook.com/sharer/sharer.php?u={{ url('product/').'/'.$product->slug }}&display=popup"></a>
                            <a class="twitterBtn smGlobalBtn" href="#"></a>
                            <a class="linkedinBtn smGlobalBtn" href="#"></a>
                            <a class="pinterestBtn smGlobalBtn" href="#"></a>
                            <a class="tumblrBtn smGlobalBtn" href="#"></a>
                            <a class="rssBtn smGlobalBtn" href="#"></a>
                        </div> 
                        <div class="sharethis-inline-share-buttons"></div>
                       
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
     <style>
         .btn-wishlist .fas{
             color: #cbcbcb;
         }
         .btn-wishlist .fas:hover{
             color: #ff7007;
         }
     </style>
      <!-- Related products (carousel)-->
      <section class="container pt-3 pb-5 mb-3 mb-sm-0 pt-sm-0 pb-sm-6">
        <h2 class="h3 text-center mb-5">You may also like</h2>
        <div class="tns-carousel-wrapper">
          <div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: false, &quot;nav&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1, &quot;gutter&quot;: 16},&quot;500&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 16}, &quot;780&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 16}, &quot;1000&quot;:{&quot;items&quot;:4, &quot;gutter&quot;: 23}}}">
         
            <!-- Item-->
            @foreach($products as $product)
            <div class="pb-2">
              @php
              $product_name = str_replace(' ','-',strtolower($product->name))
             @endphp
              <div class="card card-product card-hover mx-1"><span class="badge badge-floating badge-pill badge-danger">Sale</span><a class="card-img-top" href="{{route('single.product',$product_name)}}"><img src="{{asset('uploads')}}/{{$product->cover_photo }}" alt="Product thumbnail"></a>
                <div class="card-body">
                  <h3 class="fs-md fw-medium mb-2"><a class="meta-link" href="#">{{ $product->name }}</a></h3>
                  <span class="text-heading fw-semibold">Rs {{ $product->price }}</span>
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
                                        <a class="btn-addtocart" href="{{route('add.to.cart',$product->id)}}">
                                            <i class="ai-shopping-cart"></i><span class="btn-tooltip">To Cart</span>
                                        </a>
                  </div>
                </div>
              </div>
            </div>
             @endforeach
         
          </div>
        </div>
      </section>
    </main>
    
   @endsection
   @section('custom-js')
     <script src="{{asset('mklb/js/mklb.js')}}"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            
      
            var mainsite = "{{ url('/') }}";
            $(document).on('keyup','.pin',function(e) {  
                              
                var event = $(this);
                var pincode = $('#pincode').val();
        
                // if(pincode.length < 1){
                     
                //      return false;
                // }
                // if(pincode.length < 6){
                //      jQuery('.serviceable').html(" Pincode not serviceable").css('color','red');
                //      return false;
                // }
                var productWeight = "{{ isset($product->weight) ? $product->weight : $product->weight }}";
                if (productWeight > 0.5 && productWeight < 1) {
                    productWeight = 1;
                } else if (productWeight <= 0.5) {

                    productWeight = 0.5;

                } else {

                    productWeight = "{{ isset($product->weight) ? $product->weight : $product->weight }}";
                }
                
                var productWeight= parseFloat(productWeight);
                // alert(productWeight);
                
                
                axios.get('https://apiv2.shiprocket.in/v1/open/courier/serviceability', {
                    params: {
                      pickup_postcode: 305801,
                      delivery_postcode: pincode,
                      weight: productWeight,
                      cod: 1,
                      declared_value: 1,
                    }
                  })
                  .then(function (response) {
                    // handle success
                    console.log(response.data);
                  })
                  .catch(function (error) {
                    // handle error
                    console.log(error);
                  })
                  .then(function () {
                    // always executed
                  });
          
          
          
          
                 $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                        type: "GET",
                        url:"https://apiv2.shiprocket.in/v1/open/courier/serviceability?pickup_postcode=305801&delivery_postcode=" + pincode + "&weight="+ productWeight +"&cod=1&declared_value=1",
                        dataType: 'json',
                    
                        success: function(resultData) {
                        // console.log(resultData);                                                
                        if(resultData.status == 404){ 
                            if("{{Session::has('postcode')}}"){
                                jQuery('.serviceable').html("Pincode serviceable at {{Session::get('postcode')}}").css('color','green');
                            }else{
                                 jQuery('.serviceable').html("Corrier Service is not Available at your Place").css('color','red'); 
                            }
                            
                           
                         }else{
                              console.log(resultData.data.delivery.city);
                              console.log(resultData.data.delivery.state);
                              console.log(resultData.data.delivery.postcode);
                            //   price = parseFloat(resultData.data.rates.Basic.surface.cod_charges.max);                       
                            //   calPrice = (( productWeight * price ) / 0.5 );                                    
                            //   jQuery('.serviceable').html("Delivery Charges " + calPrice + " INR").css('color','green');
                            jQuery('.serviceable').html(" Pincode serviceable").css('color','green');
                              //$('#delivery_charg').val(calPrice);
                            //   event.css('border','solid 1px green');                              
                                var city ="<input type='hidden' name='city' value='"+resultData.data.delivery.city+"' />";                     
                                var state ="<input type='hidden' name='state' value='"+resultData.data.delivery.state+"' />";                     
                                var postcode ="<input type='hidden' name='postcode' value='"+resultData.data.delivery.postcode+"' />";                     
                               
                                $('.serviceable').prepend(city);
                                $('.serviceable').append(state);
                                $('.serviceable').append(postcode);
                                                  
                            }                            
                        },
                        error: function (textStatus, errorThrown) {                            
                            console.log(errorThrown);
                            if(pincode != '')
                            {
                                jQuery('.serviceable').html("Enter a valid pincode").css('color','red');
                            }
                        }
                });                  
            });
            
        });
        
        
        

        </script>
   @endsection