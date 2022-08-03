@extends('layouts.around-header')
@section('page-title') 
    Profile | Rural Pure 
@endsection
@section('meta-schema')
@endsection
@section('custom-css')
<style>
@media only screen and (max-width: 800px) {
      .status{
          float:left;
          padding-left:5px;
      }
}
</style>
@endsection
@section('main')
    <!-- Page content-->
      <!-- Slanted background-->
      <!--<div class="position-relative bg-gradient" style="height: 480px;">-->
      <!--  <div class="shape shape-bottom shape-slant bg-secondary d-none d-lg-block">-->
      <!--    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3000 260">-->
      <!--      <polygon fill="currentColor" points="0,257 0,260 3000,260 3000,0"></polygon>-->
      <!--    </svg>-->
      <!--  </div>-->
      <!--</div>-->
      <!-- Page content-->
      <div class="container pt-5 pb-5">
        <div class="row">
          <!-- Sidebar-->
          <!--<div class="col-lg-4 mb-4 mb-lg-0">-->
          <!--  <div class="bg-light rounded-3 shadow-lg">-->
          <!--    <div class="px-4 py-4 mb-1 text-center"><img class="d-block rounded-circle mx-auto my-2" src="{{asset('frontend-theme/around/img/dashboard/avatar/main.jpg')}}" at="Amanda Wilson" width="110">-->
          <!--      <h6 class="mb-0 pt-1">Amanda Wilson</h6><span class="text-muted fs-sm">@amanda_w</span>-->
          <!--    </div>-->
          <!--    <div class="d-lg-none px-4 pb-4 text-center"><a class="btn btn-primary px-5 mb-2" href="#account-menu" data-bs-toggle="collapse"><i class="ai-menu me-2"></i>Account menu</a></div>-->
          <!--    <div class="d-lg-block collapse pb-2" id="account-menu">-->
          <!--      <h3 class="d-block bg-secondary fs-sm fw-semibold text-muted mb-0 px-4 py-3">Dashboard</h3><a class="d-flex align-items-center nav-link-style px-4 py-3 active" href="dashboard-orders.html"><i class="ai-shopping-bag fs-lg opacity-60 me-2"></i>Orders<span class="nav-indicator"></span><span class="text-muted fs-sm fw-normal ms-auto">2</span></a><a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="dashboard-sales.html"><i class="ai-dollar-sign fs-lg opacity-60 me-2"></i>Sales<span class="text-muted fs-sm fw-normal ms-auto">$735.00</span></a><a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="dashboard-messages.html"><i class="ai-message-square fs-lg opacity-60 me-2"></i>Messages<span class="nav-indicator"></span><span class="text-muted fs-sm fw-normal ms-auto">1</span></a><a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="dashboard-followers.html"><i class="ai-users fs-lg opacity-60 me-2"></i>Followers<span class="text-muted fs-sm fw-normal ms-auto">34</span></a><a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="dashboard-reviews.html"><i class="ai-star fs-lg opacity-60 me-2"></i>Reviews<span class="text-muted fs-sm fw-normal ms-auto">15</span></a><a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="dashboard-favorites.html"><i class="ai-heart fs-lg opacity-60 me-2"></i>Favorites<span class="text-muted fs-sm fw-normal ms-auto">6</span></a>-->
          <!--      <h3 class="d-block bg-secondary fs-sm fw-semibold text-muted mb-0 px-4 py-3">Account settings</h3><a class="d-flex align-items-center nav-link-style px-4 py-3" href="account-profile.html">Profile info</a><a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="account-payment.html">Payment methods</a>-->
          <!--      <div class="d-flex align-items-center border-top"><a class="d-block w-100 nav-link-style px-4 py-3" href="account-notifications.html">Notifications</a>-->
          <!--        <div class="ms-auto px-3">-->
          <!--          <div class="form-check form-switch">-->
          <!--            <input class="form-check-input" type="checkbox" id="notifications-switch" data-master-checkbox-for="#notification-settings" checked>-->
          <!--            <label class="form-check-label" for="notifications-switch"></label>-->
          <!--          </div>-->
          <!--        </div>-->
          <!--      </div><a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="signin-illustration.html"><i class="ai-log-out fs-lg opacity-60 me-2"></i>Sign out</a>-->
          <!--    </div>-->
          <!--  </div>-->
          <!--</div>-->
          <!-- Content-->
          <div class="col-md-12">
            <div class="d-flex flex-column h-100 bg-light rounded-3 shadow-lg p-4">
              <div class="py-2 p-md-3">
                  
                 <div class="px-4 py-4 mb-1 m-auto text-center"><img class="d-block rounded-circle mx-auto my-2" src="{{asset('frontend-theme/around/img/dashboard/avatar/main.jpg')}}" at="{{$user->name}}" width="110">
                     <!--<a class="btn text-success fw-medium btn-sm mb-2 nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="ai-user fs-base me-2"></i>{{ $user->email }}</a>-->
                    <div class="px-4 pb-4 text-center user_menu" style="color:black"><a class="btn btn-light px-5 mb-2" data-bs-toggle="dropdown"><i class="ai-user fs-base me-2"></i>{{ $user->email }}</a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="http://user.ruralpure.co.in/">
                              <div class="d-flex align-items-center">
                                <div class="fs-xl text-muted"><i class="ai-file-text"></i></div>
                                <div class="ps-3"><span class="d-block text-heading">Dashboard</span></div>
                              </div></a></li>
                          <li class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="{{ route('user.orders') }}">
                              <div class="d-flex align-items-center">
                                <div class="fs-xl text-muted"><i class="ai-layers"></i></div>
                                <div class="ps-3"><span class="d-block text-heading">My Orders</span></div>
                              </div></a></li>
                          <li class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="{{route('checkout')}}">
                              <div class="d-flex align-items-center">
                                <div class="fs-xl text-muted"><i class="ai-shopping-cart"></i></div>
                                <div class="ps-3"><span class="d-block text-heading">My Cart</span></div>
                              </div></a></li>
                            <li class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="{{ url('/wishlist') }}">
                              <div class="d-flex align-items-center">
                                <div class="fs-xl text-muted"><i class="ai-heart"></i></div>
                                <div class="ps-3"><span class="d-block text-heading">My Wishlist</span></div>
                              </div></a>
                            </li>
                            <li><a class="dropdown-item" href="{{ url('/acount') }}">
                              <div class="d-flex align-items-center">
                                <div class="fs-xl text-muted"><i class="ai-life-buoy"></i></div>
                                <div class="ps-3"><span class="d-block text-heading">Account Setting</span></div>
                              </div></a>
                            </li>
                             <li><a class="dropdown-item" href="{{ route('user.logout') }}">
                              <div class="d-flex align-items-center">
                                <div class="fs-xl text-muted"><i class="ai-life-buoy"></i></div>
                                <div class="ps-3"><span class="d-block text-heading">Logout</span></div>
                              </div></a>
                            </li>
                        </ul>
                    </div>
                </div>  
                  
                  
                <!-- Title + Filters-->
                <div class="d-sm-flex align-items-center justify-content-between pb-2">
                  <h1 class="h3 mb-3 text-center text-sm-start">Orders history</h1>
                  <div class="d-flex align-items-center mb-3">
                    <label class="form-label text-nowrap pe-1 me-2 mb-0">Sort orders</label>
                    <select class="form-select form-select-sm">
                      <option>All</option>
                      <option>In progress</option>
                      <option>Delivered</option>
                      <option>Canceled</option>
                    </select>
                  </div>
                </div>
                <!-- Accordion with orders-->
                <div class="accordion" id="orders-accordion">
                  
                  <!-- Order-->
                  @foreach($orders as $order)
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="order-header-2">
                      <button class="accordion-button collapsed accordion-button no-indicator d-flex flex-wrap align-items-center justify-content-between pe-4" type="button" data-bs-toggle="collapse" data-bs-target="#order-collapse-2-{{$order->id}}" aria-expanded="false" aria-controls="order-collapse-2-{{$order->id}}">
                        <div class="col-lg-3 col-sm-12 col-md-6 fs-sm fw-medium text-nowrap "><i class="ai-hash fs-base me-1"></i><span class="d-inline-block align-middle">{{$order->product_order_id}}</span></div>
                        <div class="col-lg-3 col-sm-12 col-md-6 text-nowrap text-body fs-sm fw-normal "><i class="ai-clock text-muted me-1"></i>{{$order->created_at->todatestring()}}</div>
                        <div class=" col-lg-3 col-sm-12 col-md-6  text-center text-info fs-xs fw-medium py-1  ">
                            @if($order->status =='Delivered')<div class="status bg-faded-info text-success mx-5 py-1 rounded-2">{{$order->status}}</div>
                            @elseif($order->status =='Inprogress')<div class="status bg-faded-info text-primary mx-5 py-1 rounded-2">{{$order->status}}</div>
                            @else<div class="status bg-faded-info text-danger mx-5 py-1 rounded-2">{{$order->status}}</div>
                            @endif
                        </div>
                        <div class="col-lg-2 col-sm-12 col-md-6">
                         <div class="col-3"></div>
                        <div class="col-9 text-body  fs-sm fw-medium">Rs. {{$order->total}}</div>
                        </div>
                      </button>
                    </h2>
                    <div class="accordion-collapse collapse" id="order-collapse-2-{{$order->id}}" aria-labelledby="order-header-2" data-bs-parent="#orders-accordion">
                      <div class="accordion-body pt-4 bg-secondary rounded-top-0 rounded-3">
                        <!-- Item-->
                         @foreach($order->orderitems as $orderitem)
                       
                          @php
                          $image = $order->productImage($orderitem->product_id);
                          $image = 'uploads'.'/'.$image['cover_photo'];
                          @endphp
                        <div class="d-sm-flex justify-content-between mb-3 pb-1">
                          <div class="order-item d-block d-sm-flex me-sm-3"><a class="d-table mx-sm-0 mx-auto flex-shrink-0" href="#"><img class="d-block rounded" src="{{asset($image)}}" alt="Thumbnail" width="105"></a>
                            <div class="fs-sm pt-2 ps-sm-3 text-sm-start">
                              <h5 class="nav-heading fs-sm mb-2"><a href="#">{{$orderitem->name}}</a></h5>
                              <div><span class="text-muted me-1">SubCategory:</span>42"</div>
                              <div><span class="text-muted me-1">BCategory:</span>White</div>
                            </div>
                          </div>
                          <div class="fs-sm text-center pt-2 me-sm-3">
                            <div class="text-muted">Quantity:</div>
                            <div class="fw-medium">{{$orderitem->total_qty}}</div>
                          </div>
                          <div class="fs-sm text-center pt-2">
                            <div class="text-muted">total Price:</div>
                            <div class="fw-medium">Rs. {{$orderitem->total_price}}</div>
                          </div>
                        </div>
                         @endforeach
                        <div class="d-flex flex-wrap align-items-center justify-content-between pt-3 border-top">
                          <div class="fs-sm my-2 me-2"><span class="text-muted me-1">Subtotal:</span><span class="fw-medium">Rs. {{$order->sub_total}}</span></div>
                          <div class="fs-sm my-2 me-2"><span class="text-muted me-1">Shipping:</span><span class="fw-medium">Rs. {{$order->shipping_charges}}</span></div>
                          <div class="fs-sm my-2 me-2"><span class="text-muted me-1">Tax:</span><span class="fw-medium">Rs. {{$order->gst}}</span></div>
                          <div class="fs-sm my-2"><span class="text-muted me-1">Total:</span><span class="fw-medium">Rs. {{$order->total}}</span></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  <!-- Order-->
                </div>
                <!-- Pagination-->
                <nav class="d-md-flex justify-content-between align-items-center text-center text-md-start pt-grid-gutter">
                  <div class="d-md-flex align-items-center w-100"><span class="fs-sm text-muted me-md-3">Showing 5 of 13 orders</span>
                    <div class="progress w-100 my-3 mx-auto mx-md-0" style="max-width: 10rem; height: 4px;">
                      <div class="progress-bar" role="progressbar" style="width: 38%;" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <button class="btn btn-outline-primary btn-sm" type="button">Load more orders</button>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection