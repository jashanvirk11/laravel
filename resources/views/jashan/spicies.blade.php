@extends('layouts.around-header')
@section('page-title') 
   Spices |  Rural Pure | 
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
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Shop grid</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">All Spices Products</li>
          </ol>
        </nav>
        <!-- Sorting + Pager-->
        <div class="d-flex justify-content-between align-items-center py-3 mb-3">
          <div class="d-flex justify-content-center align-items-center">
            <select class="form-select me-2" style="width: 15.25rem;">
              <option value="popularity">Sort by popularity</option>
              <option value="rating">Sort by average rating</option>
              <option value="newness">Sort by newness</option>
              <option value="price: low to high">Sort by price: low to high</optionhvjhv>
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
        <div class="row">
          <!-- Item-->
          <div class="col-lg-3 col-md-4 col-sm-6 mb-grid-gutter">
            <div class="card card-product card-hover"><a class="card-img-top" href="{{route('single.product')}}"><img src="{{asset('frontend-theme/ruralpure/product/aawla.jfif')}}" alt="Product thumbnail"></a>
              <div class="card-body"><a class="meta-link fs-xs mb-1" href="#"></a>
                <h3 class="fs-md fw-medium mb-2"><a class="meta-link" href="{{route('single.product')}}">Aawla</a></h3><span class="text-heading fw-semibold">₹ 19.00</span>
              </div>
              <div class="card-footer">
                <div class="star-rating mt-n1"><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star"></i><i class="sr-star ai-star"></i>
                </div>
                <div class="d-flex align-items-center"><a class="btn-wishlist" href="#"><i class="ai-heart"></i><span class="btn-tooltip">Wishlist</span></a><span class="btn-divider"></span><a class="btn-addtocart" href="#"><i class="ai-shopping-cart"></i><span class="btn-tooltip">To Cart</span></a></div>
              </div>
            </div>
          </div>
          <!-- Item-->
          <div class="col-lg-3 col-md-4 col-sm-6 mb-grid-gutter">
            <div class="card card-product card-hover"><a class="card-img-top" href="{{route('single.product')}}"><img src="{{asset('frontend-theme/ruralpure/product/badi.jfif')}}" alt="Product thumbnail"></a>
              <div class="card-body"><a class="meta-link fs-xs mb-1" href="#"></a>
                <h3 class="fs-md fw-medium mb-2"><a class="meta-link" href="{{route('single.product')}}">Badi</a></h3><span class="text-heading fw-semibold">₹ 165.00</span>
              </div>
              <div class="card-footer">
                <div class="star-rating mt-n1"><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star"></i>
                </div>
                <div class="d-flex align-items-center"><a class="btn-wishlist" href="#"><i class="ai-heart"></i><span class="btn-tooltip">Wishlist</span></a><span class="btn-divider"></span><a class="btn-addtocart" href="#"><i class="ai-shopping-cart"></i><span class="btn-tooltip">To Cart</span></a></div>
              </div>
            </div>
          </div>
          <!-- Item-->
          <div class="col-lg-3 col-md-4 col-sm-6 mb-grid-gutter">
            <div class="card card-product card-hover"><span class="badge badge-floating badge-pill bg-success">New</span><a class="card-img-top" href="{{route('single.product')}}"><img src="{{asset('frontend-theme/ruralpure/product/bajra.jfif')}}" alt="Product thumbnail"></a>
              <div class="card-body"><a class="meta-link fs-xs mb-1" href="#"></a>
                <h3 class="fs-md fw-medium mb-2"><a class="meta-link" href="{{route('single.product')}}">Bajra</a></h3><span class="text-heading fw-semibold">₹ 28.00</span>
              </div>
              <div class="card-footer">
                <div class="star-rating mt-n1"><i class="sr-star ai-star"></i><i class="sr-star ai-star"></i><i class="sr-star ai-star"></i><i class="sr-star ai-star"></i><i class="sr-star ai-star"></i>
                </div>
                <div class="d-flex align-items-center"><a class="btn-wishlist" href="#"><i class="ai-heart"></i><span class="btn-tooltip">Wishlist</span></a><span class="btn-divider"></span><a class="btn-addtocart" href="#"><i class="ai-shopping-cart"></i><span class="btn-tooltip">To Cart</span></a></div>
              </div>
            </div>
          </div>
          <!-- Item-->
          <div class="col-lg-3 col-md-4 col-sm-6 mb-grid-gutter">
            <div class="card card-product card-hover"><span class="badge badge-floating badge-pill bg-danger">Sale</span><a class="card-img-top" href="{{route('single.product')}}"><img src="{{asset('frontend-theme/ruralpure/product/bajre-ka-aata.jfif')}}" alt="Product thumbnail"></a>
              <div class="card-body"><a class="meta-link fs-xs mb-1" href="#"></a>
                <h3 class="fs-md fw-medium mb-2"><a class="meta-link" href="{{route('single.product')}}">Bajre Ka Aata</a></h3>
                <del class="fs-sm text-muted me-1">₹ 120.40</del><span class="text-heading fw-semibold">₹ 98.75</span>
              </div>
              <div class="card-footer">
                <div class="star-rating mt-n1"><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star"></i>
                </div>
                <div class="d-flex align-items-center"><a class="btn-wishlist" href="#"><i class="ai-heart"></i><span class="btn-tooltip">Wishlist</span></a><span class="btn-divider"></span><a class="btn-addtocart" href="#"><i class="ai-shopping-cart"></i><span class="btn-tooltip">To Cart</span></a></div>
              </div>
            </div>
          </div>
          <!-- Item-->
          <div class="col-lg-3 col-md-4 col-sm-6 mb-grid-gutter">
            <div class="card card-product card-hover"><a class="card-img-top" href="{{route('single.product')}}"><img src="{{asset('frontend-theme/ruralpure/product/besan.jfif')}}" alt="Product thumbnail"></a>
              <div class="card-body"><a class="meta-link fs-xs mb-1" href="#"></a>
                <h3 class="fs-md fw-medium mb-2"><a class="meta-link" href="{{route('single.product')}}">Besan</a></h3><span class="text-heading fw-semibold">₹ 140.00</span>
              </div>
              <div class="card-footer">
                <div class="star-rating mt-n1"><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star"></i>
                </div>
                <div class="d-flex align-items-center"><a class="btn-wishlist" href="#"><i class="ai-heart"></i><span class="btn-tooltip">Wishlist</span></a><span class="btn-divider"></span><a class="btn-addtocart" href="#"><i class="ai-shopping-cart"></i><span class="btn-tooltip">To Cart</span></a></div>
              </div>
            </div>
          </div>
          <!-- Item-->
          <div class="col-lg-3 col-md-4 col-sm-6 mb-grid-gutter">
            <div class="card card-product card-hover"><a class="card-img-top" href="{{route('single.product')}}"><img src="{{asset('frontend-theme/ruralpure/product/dhaniya.jfif')}}" alt="Product thumbnail"></a>
              <div class="card-body"><a class="meta-link fs-xs mb-1" href="#"></a>
                <h3 class="fs-md fw-medium mb-2"><a class="meta-link" href="{{route('single.product')}}">Dhaniya</a></h3><span class="text-heading fw-semibold">₹ 82.00</span>
              </div>
              <div class="card-footer">
                <div class="star-rating mt-n1"><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i>
                </div>
                <div class="d-flex align-items-center"><a class="btn-wishlist" href="#"><i class="ai-heart"></i><span class="btn-tooltip">Wishlist</span></a><span class="btn-divider"></span><a class="btn-addtocart" href="#"><i class="ai-shopping-cart"></i><span class="btn-tooltip">To Cart</span></a></div>
              </div>
            </div>
          </div>
          <!-- Item-->
          <div class="col-lg-3 col-md-4 col-sm-6 mb-grid-gutter">
            <div class="card card-product card-hover"><a class="card-img-top" href="{{route('single.product')}}"><img src="{{asset('frontend-theme/ruralpure/product/gulkand.jfif')}}" alt="Product thumbnail"></a>
              <div class="card-body"><a class="meta-link fs-xs mb-1" href="#"></a>
                <h3 class="fs-md fw-medium mb-2"><a class="meta-link" href="{{route('single.product')}}">Gulkand</a></h3><span class="text-heading fw-semibold">₹ 25.99</span>
              </div>
              <div class="card-footer">
                <div class="star-rating mt-n1"><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star"></i><i class="sr-star ai-star"></i>
                </div>
                <div class="d-flex align-items-center"><a class="btn-wishlist" href="#"><i class="ai-heart"></i><span class="btn-tooltip">Wishlist</span></a><span class="btn-divider"></span><a class="btn-addtocart" href="#"><i class="ai-shopping-cart"></i><span class="btn-tooltip">To Cart</span></a></div>
              </div>
            </div>
          </div>
          <!-- Item-->
          <div class="col-lg-3 col-md-4 col-sm-6 mb-grid-gutter">
            <div class="card card-product card-hover"><a class="card-img-top" href="{{route('single.product')}}"><img src="{{asset('frontend-theme/ruralpure/product/gutka.jfif')}}" alt="Product thumbnail"></a>
              <div class="card-body"><a class="meta-link fs-xs mb-1" href="#"></a>
                <h3 class="fs-md fw-medium mb-2"><a class="meta-link" href="{{route('single.product')}}">Gutka</a></h3><span class="text-heading fw-semibold">₹ 49.99</span>
              </div>
              <div class="card-footer">
                <div class="star-rating mt-n1"><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star"></i>
                </div>
                <div class="d-flex align-items-center"><a class="btn-wishlist" href="#"><i class="ai-heart"></i><span class="btn-tooltip">Wishlist</span></a><span class="btn-divider"></span><a class="btn-addtocart" href="#"><i class="ai-shopping-cart"></i><span class="btn-tooltip">To Cart</span></a></div>
              </div>
            </div>
          </div>
          <!-- Item-->
          <div class="col-lg-3 col-md-4 col-sm-6 mb-grid-gutter">
            <div class="card card-product card-hover"><a class="card-img-top" href="{{route('single.product')}}"><img src="{{asset('frontend-theme/ruralpure/product/gunda.jfif')}}" alt="Product thumbnail"></a>
              <div class="card-body"><a class="meta-link fs-xs mb-1" href="#"></a>
                <h3 class="fs-md fw-medium mb-2"><a class="meta-link" href="{{route('single.product')}}">Gunda</a></h3><span class="text-heading fw-semibold">₹ 154.00</span>
              </div>
              <div class="card-footer">
                <div class="star-rating mt-n1"><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star"></i>
                </div>
                <div class="d-flex align-items-center"><a class="btn-wishlist" href="#"><i class="ai-heart"></i><span class="btn-tooltip">Wishlist</span></a><span class="btn-divider"></span><a class="btn-addtocart" href="#"><i class="ai-shopping-cart"></i><span class="btn-tooltip">To Cart</span></a></div>
              </div>
            </div>
          </div>
          <!-- Item-->
          <div class="col-lg-3 col-md-4 col-sm-6 mb-grid-gutter">
            <div class="card card-product card-hover"><a class="card-img-top" href="{{route('single.product')}}"><img src="{{asset('frontend-theme/ruralpure/product/heeng.jfif')}}" alt="Product thumbnail"></a>
              <div class="card-body"><a class="meta-link fs-xs mb-1" href="#"></a>
                <h3 class="fs-md fw-medium mb-2"><a class="meta-link" href="{{route('single.product')}}">Heeng</a></h3><span class="text-heading fw-semibold">Out of stock</span>
              </div>
              <div class="card-footer">
                <div class="star-rating mt-n1"><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star"></i>
                </div>
                <div class="d-flex align-items-center"><a class="btn-wishlist" href="#"><i class="ai-heart"></i><span class="btn-tooltip">Wishlist</span></a><span class="btn-divider"></span><a class="btn-details" href="{{route('single.product')}}"><i class="ai-arrow-right"></i><span class="btn-tooltip">Details</span></a></div>
              </div>
            </div>
          </div>
          <!-- Item-->
          <div class="col-lg-3 col-md-4 col-sm-6 mb-grid-gutter">
            <div class="card card-product card-hover"><a class="card-img-top" href="{{route('single.product')}}"><img src="{{asset('frontend-theme/ruralpure/product/kaachri.jfif')}}" alt="Product thumbnail"></a>
              <div class="card-body"><a class="meta-link fs-xs mb-1" href="#"></a>
                <h3 class="fs-md fw-medium mb-2"><a class="meta-link" href="{{route('single.product')}}">Kaachri</a></h3><span class="text-heading fw-semibold">₹ 127.00</span>
              </div>
              <div class="card-footer">
                <div class="star-rating mt-n1"><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i>
                </div>
                <div class="d-flex align-items-center"><a class="btn-wishlist" href="#"><i class="ai-heart"></i><span class="btn-tooltip">Wishlist</span></a><span class="btn-divider"></span><a class="btn-addtocart" href="#"><i class="ai-shopping-cart"></i><span class="btn-tooltip">To Cart</span></a></div>
              </div>
            </div>
          </div>
          <!-- Item-->
          <div class="col-lg-3 col-md-4 col-sm-6 mb-grid-gutter">
            <div class="card card-product card-hover"><a class="card-img-top" href="{{route('single.product')}}"><img src="{{asset('frontend-theme/ruralpure/product/makki-ka-aata.jfif')}}" alt="Product thumbnail"></a>
              <div class="card-body"><a class="meta-link fs-xs mb-1" href="#"></a>
                <h3 class="fs-md fw-medium mb-2"><a class="meta-link" href="{{route('single.product')}}">Makki Ka Aata</a></h3><span class="text-heading fw-semibold">₹ 349.99</span>
              </div>
              <div class="card-footer">
                <div class="star-rating mt-n1"><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star-filled active"></i><i class="sr-star ai-star"></i><i class="sr-star ai-star"></i>
                </div>
                <div class="d-flex align-items-center"><a class="btn-wishlist" href="#"><i class="ai-heart"></i><span class="btn-tooltip">Wishlist</span></a><span class="btn-divider"></span><a class="btn-addtocart" href="#"><i class="ai-shopping-cart"></i><span class="btn-tooltip">To Cart</span></a></div>
              </div>
            </div>
          </div>
        </div>
        <!-- Pagination-->
        <div class="d-md-flex justify-content-between align-items-center pt-3 pb-2">
          <div class="d-flex justify-content-center align-items-center mb-4">
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
          <nav class="mb-4" aria-label="Page navigation">
            <ul class="pagination justify-content-center">
              <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><i class="ai-chevron-left"></i></a></li>
              <li class="page-item d-sm-none"><span class="page-link page-link-static">2 / 10</span></li>
              <li class="page-item d-none d-sm-block"><a class="page-link" href="#">1</a></li>
              <li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">2<span class="visually-hidden">(current)</span></span></li>
              <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
              <li class="page-item d-none d-sm-block"><a class="page-link" href="#">4</a></li>
              <li class="page-item d-none d-sm-block">...</li>
              <li class="page-item d-none d-sm-block"><a class="page-link" href="#">10</a></li>
              <li class="page-item"><a class="page-link" href="#" aria-label="Next"><i class="ai-chevron-right"></i></a></li>
            </ul>
          </nav>
        </div>
      </div>
    </main>
@endsection