@extends('layouts.around-header')
@section('page-title') 
    Category | {{$slug->name}}
@endsection
@section('meta-schema')
@endsection
@section('custom-css')
@endsection
@section('main')
    <!-- Page content-->
      <div class="sidebar-enabled">
        <div class="container">
          <div class="row">
            <!-- Sidebar-->
            <div class="sidebar col-lg-3 pt-lg-5">
              <div class="offcanvas offcanvas-collapse" id="shop-sidebar">
                <div class="offcanvas-cap navbar-shadow px-4 mb-3">
                  <h5 class="mt-1 mb-0">Refine your selection</h5>
                  <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body px-4 pt-3 pt-lg-0 ps-lg-0 pe-lg-2 pe-xl-4" data-simplebar>
                  <!-- Categories-->
                  <div class="widget widget-categories mb-5">
                    <h3 class="widget-title">Categories</h3>
                    <ul id="categories">
                           @if($page=='categorywise')
                        @foreach($categories as $category)
                            @if($category->name == $slug->name)
                            <li>
                             
                                @if($page == 'categorywise')
                               
                                    @if($category->name == $slug->name)
                                    
                                    <a class="widget-link category_name" href="#{{$category->id}}" data-bs-toggle="collapse">{{$category->name}}<small class="text-muted ps-1 ms-2">235</small></a>
                                     <!--<ul class="collapse show" id="{{$category->id}}" data-bs-parent="#categories">-->
                                    @else
                                    <a class="widget-link category_name collapsed" href="#{{$category->id}}" data-bs-toggle="collapse">{{$category->name}}<small class="text-muted ps-1 ms-2">235</small></a>
                                    <!--<ul class="collapse" id="{{$category->id}}" data-bs-parent="#categories">-->
                                    @endif
                                @else
                                    @if($category->name == $slug->category->name)
                                    <a class="widget-link category_name" href="#{{$category->id}}" data-bs-toggle="collapse">{{$category->name}}<small class="text-muted ps-1 ms-2">235</small></a>
                                     <!--<ul class="collapse show" id="{{$category->id}}" data-bs-parent="#categories">-->
                                    @else
                                    <a class="widget-link category_name collapsed" href="#{{$category->id}}" data-bs-toggle="collapse">{{$category->name}}<small class="text-muted ps-1 ms-2">235</small></a>
                                    <!--<ul class="collapse" id="{{$category->id}}" data-bs-parent="#categories">-->
                                    @endif
                                @endif
                                </li>
                                
                                <!--<ul class="collapse {{$category->id}}" id="{{$category->id}}" data-bs-parent="#categories">-->
                                     <li><a class="widget-link" href="{{route('categorywise',$category->name)}}">View all</a></li>
                                     
                                   @foreach($category->subcategories as $subcategory)
                                    @php
                                      $subcategory_name = str_replace(' ','-',strtolower($subcategory->name))
                                    @endphp
                                     <li><a class="widget-link" href="{{route('subcategorywise',$subcategory_name)}}">{{ $subcategory->name }}</a></li>
                                    @endforeach
                                    @else
                                    
                             @endif
                        @endforeach  
                          @else
                            @foreach($product1 as $product)
                            @if($product->getAllProductsBySubCategoryId($slug->id,$product->sub_category_id))
                            <li>
                             
                            @php
                            $product_name = str_replace(' ','-',strtolower($product->name));
                            @endphp
                                     <li><a class="widget-link" href="{{route('single.product',$product_name)}}">{{ $product->name }}</a></li>
                                  
                             @endif
                           @endforeach 
                           
                    @endif
                                </ul>
                         
                    </ul>
                   
                  </div>
                
                  <!-- Brand (checkboxes)-->
                  <div class="widget mb-5">
                    <div class="mb-3">
                       <h3 class="widget-title">Search Product</h3>
                      <input class="form-control" list="datalist-options" id="datalist-input" placeholder="Type to search...">
                      <datalist id="datalist-options">
                          
                            @foreach($products as $product)
                             @php
                             $product_name = str_replace(' ','-',strtolower($product->name))
                            @endphp
                            <a href="{{route('single.product',$product_name)}}"><option value="{{$product->name}}">{{$product->name}}</option></a>
                            @endforeach
                        <!--<option value="Mounth Freshners">-->
                        <!--<option value="Ayurveda">-->
                        <!--<option value="Handicrafts">-->
                      </datalist>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-9 content py-4 mb-2 mb-sm-0 pb-sm-5">
              <nav aria-label="breadcrumb">
                <ol class="py-1 my-2 breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Shop</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($slug->name)  }}</li>
                </ol>
              </nav>
              
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
                @if($page=='categorywise')
                                 <div class="row">
                <!-- Item-->
                @foreach($categories as $category)
                   @if($category->name == $slug->name)
                   @foreach($category->subcategories as $subcategory)
                        <div class="col-md-4 col-sm-6 mb-grid-gutter">
                          @php
                            $subcategory_name = str_replace(' ','-',strtolower($subcategory->name))
                          @endphp
                      <div class="card card-product card-hover"><a class="card-img-top" href="{{route('subcategorywise',$subcategory_name)}}"><img src="{{asset('uploads')}}/{{ $subcategory->image}}" alt="Product thumbnail"></a>
                      <div class="card-body text-center">
                        <h4 class="fs-md fw-medium mt-2"><a class="meta-link" href="{{route('subcategorywise',$subcategory_name)}}">{{ $subcategory->name}}</a></h4>
                      </div>
                      </div>
                    </div>
                     @endforeach
                        @endif
                       @endforeach
                  
                     </div>         
                     
                        
                                    
                @else
                
                    @foreach($product1 as $product)
                    @if($product->getAllProductsBySubCategoryId($slug->id,$product->sub_category_id))
                        <div class="col-md-4 col-sm-6 mb-grid-gutter">
                            @php
                            $product_name = str_replace(' ','-',strtolower($product->name));
                            @endphp
                      <div class="card card-product card-hover"><a class="card-img-top" href="{{route('single.product',$product_name)}}"><img src="{{asset('uploads')}}/{{ $product->cover_photo}}" alt="Product thumbnail"></a>
                        <div class="card-body"><a class="meta-link fs-xs mb-1" href="#"></a>
                          <h3 class="fs-md fw-medium mb-2"><a class="meta-link" href="{{route('single.product',$product_name)}}">{{ $product->name}}</a></h3><span class="text-heading fw-semibold">₹ {{ $product->price}}</span>
                        </div>
                        <div class="card-footer">
                          <div class="star-rating mt-n1"><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star"></i>
                          </div>
                          <div class="d-flex align-items-center">
                              <!--<a class="btn-wishlist" href="#"><i class="fas fa-heart"></i><span class="btn-tooltip">Wishlist</span></a>-->
                          
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
                                        <!--<a class="btn-addtocart add_to_cart" href="javascript:void(0)" data-id="{{ $product->id }}">-->
                                        <!--<i class="ai-shopping-cart"></i><span class="btn-tooltip">To Cart</span>-->
                                        <!--</a>-->
                                       
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif
                    @endforeach
               
                @endif
                {{ $products->links() }}
                <!-- Item-->
                
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
            
          </div>
        </div>
      </div>
      
    </main>
    
  @endsection
  
  
