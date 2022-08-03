@extends('layouts.around-header')
@section('page-title') 
    Payment Options | Rural Pure 
@endsection
@section('meta-schema')
@endsection
@section('custom-css')
@endsection
@section('main')
     <!-- Page content-->
      <!-- Slanted background-->
      <div class="position-relative bg-gradient" style="height: 480px;">
        <div class="shape shape-bottom shape-slant bg-secondary d-none d-lg-block">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3000 260">
            <polygon fill="currentColor" points="0,257 0,260 3000,260 3000,0"></polygon>
          </svg>
        </div>
      </div>
      <!-- Page content-->
      <div class="container position-relative zindex-5 pb-4 mb-md-3" style="margin-top: -350px;">
        <div class="row">
          <!-- Sidebar-->
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="bg-light rounded-3 shadow-lg">
              <div class="px-4 py-4 mb-1 text-center"><img class="d-block rounded-circle mx-auto my-2" src="{{asset('frontend-theme/around/img')}}/dashboard/avatar/main.jpg" at="Amanda Wilson" width="110">
                <h6 class="mb-0 pt-1">Amanda Wilson</h6><span class="text-muted fs-sm">@amanda_w</span>
              </div>
              <div class="d-lg-none px-4 pb-4 text-center"><a class="btn btn-primary px-5 mb-2" href="#account-menu" data-bs-toggle="collapse"><i class="ai-menu me-2"></i>Account menu</a></div>
              <div class="d-lg-block collapse pb-2" id="account-menu">
                <h3 class="d-block bg-secondary fs-sm fw-semibold text-muted mb-0 px-4 py-3">Dashboard</h3><a class="d-flex align-items-center nav-link-style px-4 py-3" href="dashboard-orders.html"><i class="ai-shopping-bag fs-lg opacity-60 me-2"></i>Orders<span class="nav-indicator"></span><span class="text-muted fs-sm fw-normal ms-auto">2</span></a><a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="dashboard-sales.html"><i class="ai-dollar-sign fs-lg opacity-60 me-2"></i>Sales<span class="text-muted fs-sm fw-normal ms-auto">$735.00</span></a><a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="dashboard-messages.html"><i class="ai-message-square fs-lg opacity-60 me-2"></i>Messages<span class="nav-indicator"></span><span class="text-muted fs-sm fw-normal ms-auto">1</span></a><a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="dashboard-followers.html"><i class="ai-users fs-lg opacity-60 me-2"></i>Followers<span class="text-muted fs-sm fw-normal ms-auto">34</span></a><a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="dashboard-reviews.html"><i class="ai-star fs-lg opacity-60 me-2"></i>Reviews<span class="text-muted fs-sm fw-normal ms-auto">15</span></a><a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="dashboard-favorites.html"><i class="ai-heart fs-lg opacity-60 me-2"></i>Favorites<span class="text-muted fs-sm fw-normal ms-auto">6</span></a>
                <h3 class="d-block bg-secondary fs-sm fw-semibold text-muted mb-0 px-4 py-3">Account settings</h3><a class="d-flex align-items-center nav-link-style px-4 py-3" href="account-profile.html">Profile info</a><a class="d-flex align-items-center nav-link-style px-4 py-3 border-top active" href="account-payment.html">Payment methods</a>
                <div class="d-flex align-items-center border-top"><a class="d-block w-100 nav-link-style px-4 py-3" href="account-notifications.html">Notifications</a>
                  <div class="ms-auto px-3">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="notifications-switch" data-master-checkbox-for="#notification-settings" checked>
                      <label class="form-check-label" for="notifications-switch"></label>
                    </div>
                  </div>
                </div><a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="signin-illustration.html"><i class="ai-log-out fs-lg opacity-60 me-2"></i>Sign out</a>
              </div>
            </div>
          </div>
          <!-- Content-->
          <div class="col-lg-8">
            <div class="d-flex flex-column h-100 bg-light rounded-3 shadow-lg p-4">
              <div class="py-2 p-md-3">
                <!-- Title-->
                <h1 class="h3 mb-3 pb-2 text-center text-sm-start">Payment methods</h1>
                <!-- Alert-->
                <div class="alert alert-info fs-sm mb-4" role="alert"><i class="ai-alert-circle fs-lg mt-n1 me-2"></i>Primary payment method is used by default</div>
                <!-- Payment methods (table)-->
                <div class="table-responsive fs-md">
                  <table class="table table-hover mb-0">
                    <thead>
                      <tr>
                        <th>Your credit / debit cards</th>
                        <th>Name on card</th>
                        <th>Expires on</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="py-3 align-middle">
                          <div class="d-flex align-items-center"><img class="me-2" src="{{asset('frontend-theme/around/img/account/cards/card-visa.png')}}" alt="Visa" width="39">
                            <div><span class="fw-medium text-heading me-1">Visa</span>ending in 4999<span class="align-middle badge bg-info ms-2">Primary</span></div>
                          </div>
                        </td>
                        <td class="py-3 align-middle">Amanda Wilson</td>
                        <td class="py-3 align-middle">08 / 2023</td>
                        <td class="py-3 align-middle"><a class="nav-link-style me-2" href="#" data-bs-toggle="tooltip" title="Edit"><i class="ai-edit"></i></a><a class="nav-link-style text-danger" href="#" data-bs-toggle="tooltip" title="Remove">
                            <div class="ai-trash-2"></div></a></td>
                      </tr>
                      <tr>
                        <td class="py-3 align-middle">
                          <div class="d-flex align-items-center"><img class="me-2" src="{{asset('frontend-theme/around/img/account/cards/card-master.png')}}" alt="MasterCard" width="39">
                            <div><span class="fw-medium text-heading me-1">MasterCard</span>ending in 0015</div>
                          </div>
                        </td>
                        <td class="py-3 align-middle">Amanda Wilson</td>
                        <td class="py-3 align-middle">11 / 2024</td>
                        <td class="py-3 align-middle"><a class="nav-link-style me-2" href="#" data-bs-toggle="tooltip" title="Edit"><i class="ai-edit"></i></a><a class="nav-link-style text-danger" href="#" data-bs-toggle="tooltip" title="Remove">
                            <div class="ai-trash-2"></div></a></td>
                      </tr>
                      <tr>
                        <td class="py-3 align-middle">
                          <div class="d-flex align-items-center"><img class="me-2" src="{{asset('frontend-theme/around/img/account/cards/card-paypal.png')}}" alt="PayPal" width="39">
                            <div><span class="fw-medium text-heading me-1">PayPal</span>a.wilson@example.com</div>
                          </div>
                        </td>
                        <td class="py-3 align-middle">&mdash;</td>
                        <td class="py-3 align-middle">&mdash;</td>
                        <td class="py-3 align-middle"><a class="nav-link-style me-2" href="#" data-bs-toggle="tooltip" title="Edit"><i class="ai-edit"></i></a><a class="nav-link-style text-danger" href="#" data-bs-toggle="tooltip" title="Remove">
                            <div class="ai-trash-2"></div></a></td>
                      </tr>
                      <tr>
                        <td class="py-3 align-middle">
                          <div class="d-flex align-items-center"><img class="me-2" src="{{asset('frontend-theme/around/img/account/cards/card-visa.png')}}" alt="Visa" width="39">
                            <div><span class="fw-medium text-heading me-1">Visa</span>ending in 6073</div>
                          </div>
                        </td>
                        <td class="py-3 align-middle">Amanda Wilson</td>
                        <td class="py-3 align-middle">09 / 2025</td>
                        <td class="py-3 align-middle"><a class="nav-link-style me-2" href="#" data-bs-toggle="tooltip" title="Edit"><i class="ai-edit"></i></a><a class="nav-link-style text-danger" href="#" data-bs-toggle="tooltip" title="Remove">
                            <div class="ai-trash-2"></div></a></td>
                      </tr>
                      <tr>
                        <td class="py-3 align-middle">
                          <div class="d-flex align-items-center"><img class="me-2" src="{{asset('frontend-theme/around/img/account/cards/card-visa.png')}}" alt="Visa" width="39">
                            <div><span class="fw-medium text-heading me-1">Visa</span>ending in 9791</div>
                          </div>
                        </td>
                        <td class="py-3 align-middle">Amanda Wilson</td>
                        <td class="py-3 align-middle">05 / 2025</td>
                        <td class="py-3 align-middle"><a class="nav-link-style me-2" href="#" data-bs-toggle="tooltip" title="Edit"><i class="ai-edit"></i></a><a class="nav-link-style text-danger" href="#" data-bs-toggle="tooltip" title="Remove">
                            <div class="ai-trash-2"></div></a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <hr class="mt-0 mb-4">
                <div class="text-sm-end"><a class="btn btn-primary" href="#add-payment" data-bs-toggle="modal">Add payment method</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection