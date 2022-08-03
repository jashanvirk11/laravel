
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
     <title>@yield('page-title')</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="Around - Multipurpose Bootstrap Template">
    <meta name="keywords" content="bootstrap, business, consulting, coworking space, services, creative agency, dashboard, e-commerce, mobile app showcase, multipurpose, product landing, shop, software, ui kit, web studio, landing, html5, css3, javascript, gallery, slider, touch, creative">
    <meta name="author" content="Createx Studio">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
       <!-- CSRF Token -->
    <meta name="_token" content="{{ csrf_token() }}"/>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" color="#5bbad5" href="safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#766df4">
    <meta name="theme-color" content="#ffffff">
    <link rel="mask-icon" color="#5bbad5" href="{{asset('frontend-theme/around/safari-pinned-tab.svg')}}">
    <meta name="msapplication-TileColor" content="#766df4">
    <meta name="theme-color" content="#ffffff">
    <!--favicon-->
    <link rel="shortcut icon" sizes="114x114" href="{{asset('uploads/logo/favicon.png')}}">
    <!--fontawsome-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="
    sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!---->
      <link rel="stylesheet"
     href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css">
      <link rel="stylesheet"
     href="https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.bootstrap.min.css">
      <link rel="stylesheet"
     href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js" async></script>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11" async></script>
    
    <!-- Old Scripts & css -->
      <script src="https://js.stripe.com/v3/" ></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!---->
    
    
    <!--Twilio-->
    <!--<link href="https://www.twilio.com/console/activate?key=Au%2BxRrIHr0lp%2FItiicjemRcAPba8sniamN1xbQ3UOVf6Ehd4Vtg%2BptchPODm%2BrHJBKQP5VaKiHnffJnTZLmB5aep77ja52jCWnVHY9yS2C%2BgzpLNzr%2B2j-->
    <!--h1QDnnWMFqzSAwYWOtqENF2o3qcLGwHZg%3D%3D&x-target-region=us1">-->


    <!-- Facebook Pixel Code -->
    <script>
    // !function(f,b,e,v,n,t,s)
    // {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    // n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    // if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    // n.queue=[];t=b.createElement(e);t.async=!0;
    // t.src=v;s=b.getElementsByTagName(e)[0];
    // s.parentNode.insertBefore(t,s)}(window,document,'script',
    // 'https://connect.facebook.net/en_US/fbevents.js');
    //  fbq('init', '1084439138658749'); 
    // fbq('track', 'PageView');
     </script>
  
    <!-- End Facebook Pixel Code -->
    
    <!-- end Old Scripts & css -->
    
    
    @yield('meta-schema')
    
    <!-- Page loading styles-->
    <style>
      .page-loading {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        -webkit-transition: all .4s .2s ease-in-out;
        transition: all .4s .2s ease-in-out;
        background-color: #fff;
        opacity: 0;
        visibility: hidden;
        z-index: 9999;
      }
      .page-loading.active {
        opacity: 1;
        visibility: visible;
      }
      
   @media  only screen and (max-width: 600px) {   
      #navbar123{
       padding-bottom: 6.375rem;
      }
   }
      
      
      .page-loading-inner {
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        text-align: center;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        -webkit-transition: opacity .2s ease-in-out;
        transition: opacity .2s ease-in-out;
        opacity: 0;
      }
      .page-loading.active > .page-loading-inner {
        opacity: 1;
      }
      .page-loading-inner > span {
        display: block;
        font-family: 'Inter', sans-serif;
        font-size: 1rem;
        font-weight: normal;
        color: #737491;
      }
      
        @media  only screen and (max-width: 600px) {   
     #iconright123
     {
        margin-left:30%;
     }
     
   }
   
   
      .page-spinner {
        display: inline-block;
        width: 2.75rem;
        height: 2.75rem;
        margin-bottom: .75rem;
        vertical-align: text-bottom;
        border: .15em solid #766df4;
        border-right-color: transparent;
        border-radius: 50%;
        -webkit-animation: spinner .75s linear infinite;
        animation: spinner .75s linear infinite;
      }
      @-webkit-keyframes spinner {
        100% {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
      @keyframes spinner {
        100% {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
      
      .navbar{
          height:80px;
      }
      .category{
          z-index:1;
          width:100%;
      }
      .mb-grid-gutter , .quantity{
          text-align:center;
      }
    </style>
    <!-- Page loading scripts-->
    <script>
      (function () {
        window.onload = function () {
          var preloader = document.querySelector('.page-loading');
          preloader.classList.remove('active');
          setTimeout(function () {
            preloader.remove();
          }, 2000);
        };
      })();
      
    </script>
    <!-- Vendor Styles-->
    <link rel="stylesheet" media="screen" href="{{asset('frontend-theme/around/vendor/simplebar/dist/simplebar.min.css')}}"/>
    <link rel="stylesheet" media="screen" href="{{asset('frontend-theme/around/vendor/tiny-slider/dist/tiny-slider.css')}}"/>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="{{asset('frontend-theme/around/css/theme.min.css')}}">
    
    @yield('custom-css')
    
    
    
    <!-- Google Tag Manager -->
    <!--     <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':-->
    <!--     new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],-->
    <!--     j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=-->
    <!--     'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);-->
    <!--     })(window,document,'script','dataLayer','GTM-KDFZ3HK');</script>-->
    <!-- End Google Tag Manager -->
    
    
  </head>
  <!-- Body-->
  <body style="background-color:#f7f7fc;">
       <noscript>
      <iframe src="//www.googletagmanager.com/ns.html?id=GTM-WKV3GT5" height="0" width="0" style="display: none; visibility: hidden;"></iframe>
    </noscript>
    <!-- Page loading spinner-->
     <!-- Page loading spinner-->
    <div class="page-loading active">
      <div class="page-loading-inner">
        <div class="page-spinner"></div><span>Loading...</span>
      </div>
    </div>
    <main class="page-wrapper">
      <!-- Sign In Modal-->
      <div class="modal fade" id="modal-signin" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content border-0">
            <div class="view show" id="modal-signin-view">
              <div class="modal-header border-0 bg-dark px-4">
                <h4 class="modal-title text-light">Sign in</h4>
                <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="btn-close "></button>
              </div>
              <div class="modal-body px-4">
                <p class="fs-ms text-muted">Sign in to your account using email and password provided during registration.</p>
                <form class="" method="POST" action="javascript:void(0)" id="signin">
                    @csrf
                  <div class="mb-3">
                    <div class="input-group"><i class="ai-mail position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                        <input id="email" class="form-control rounded @error('email') is-invalid @enderror email" type="email" placeholder="Email" name="email"  autocomplete="email" autofocus required>
                    </div>
                    <div class="alert alert-danger alert-dismissible fade show mt-2 login_email_error" role="alert" style="display:none">
                            Email is not found in our Record
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="input-group"><i class="ai-lock position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                      <div class="password-toggle w-100">
                        <input id="current-password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" type="password" placeholder="Password" required>
                        <label class="password-toggle-btn" aria-label="Show/hide password">
                          <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                        </label>
                      </div>
                    </div>
                    <div class="alert alert-danger alert-dismissible fade show mt-2 login_password_error" role="alert" style="display:none">
                           Password is not Matched with User Id
                    </div>
                  </div>
                  <div class="d-flex justify-content-between align-items-center mb-3 mb-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="keep-signed">
                      <label class="form-check-label fs-sm" for="keep-signed">Keep me signed in</label>
                    </div><a class="nav-link-style fs-ms" href="{{route('user.forgotpassword')}}">Forgot password?</a>
                  </div>
                  <button class="btn btn-primary d-block w-100" type="submit" id="login-form">Sign in</button>
                  <p class="fs-sm pt-3 mb-0">Don't have an account? <a href='#' class='fw-medium' data-view='#modal-signup-view'>Sign up</a></p>
                </form>
              </div>
            </div>
            <div class="view" id="modal-signup-view">
              <div class="modal-header border-0 bg-dark px-4">
                <h4 class="modal-title text-light">Sign up</h4>
                <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="btn-close"></button>
              </div>
              <div class="modal-body px-4">
                <p class="fs-ms text-muted">Registration takes less than a minute but gives you full control over your orders.</p>
                <form method="POST" action="javascript:void(0)"  class="" id="signup" enctype="multipart/form-data">
                     @csrf
                  <div class="mb-3">
                      <label for="pass">Full Name *</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Full name" name="name" value="{{ old('name') }}" autocomplete="name" autofocus required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="mb-3">
                      <label for="pass">Email *</label>
                    <input class="form-control @error('email') is-invalid @enderror email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="email" required>
                    <!-- Danger alert -->
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                     <div class="mb-3">
                      <label for="pass">Mobile *</label>
                    <input class="form-control @error('phone') is-invalid @enderror phone numberonly" type="text" placeholder="Mobile No" name="phone" value="{{ old('phone') }}" autocomplete="phone" required>
                    <!-- Danger alert -->
                     @error('mobile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="mb-3">
                      <label for="pass">Password *</label>
                   <input  class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="password" type="password" placeholder="Password" required>
                    <!-- Danger alert -->
                     @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                 
                  <button class="btn btn-primary d-block w-100" id="register-form" type="submit">Sign up</button>
                  <p class="fs-sm pt-3 mb-0">Already have an account? <a href='{{url('login')}}' class='fw-medium' data-view='#modal-signin-view'>Sign in</a></p>
                </form>
              </div>
            </div>
            <div class="modal-body text-center px-4 pt-2 pb-4">
              <hr class="my-0">
              <p class="fs-sm fw-medium text-heading pt-4">Or sign in with</p><a class="btn-social bs-facebook bs-lg mx-1 mb-2" href="https://www.facebook.com/uniqueproductspro/"><i class="ai-facebook"></i></a>
              <a class="btn-social bs-twitter bs-lg mx-1 mb-2" href="#"><i class="ai-twitter"></i></a>
              <a class="btn-social bs-instagram bs-lg mx-1 mb-2" href="https://instagram.com/uniqueproductspro?utm_medium=copy_link"><i class="ai-instagram"></i></a>
              <a class="btn-social bs-google bs-lg mx-1 mb-2" href="#"><i class="ai-google"></i></a>
            
            </div>
          </div>
        </div>
      </div>
     <!--cart-->
        @if(Session::has('user_session') && (!$cart->isEmpty()))
             <!-- Shopping cart off-canvas-->
        <div class="offcanvas offcanvas-end model_cart" id="shoppingCart">
            <div class="offcanvas-cap navbar-shadow px-4 mb-2">
                 <h5 class="mt-1 mb-0">Your cart</h5>
                 <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body p-4" data-simplebar>
        
                @php $amount=0; @endphp
                @foreach($cart as $cart)
                @php $amount +=$cart->price * $cart->qty; @endphp
                <div class="d-flex align-items-center mb-3"><a class="d-block flex-shrink-0" href="{{route('single.product',$cart->product_id)}}">
                    <img class="rounded " src="{{asset('uploads')}}/{{$cart->image}}" alt="{{$cart->product_name}}" width="60"></a>
                    <div class="w-100 ps-2 ms-1">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="me-3">
                                <h4 class="nav-heading fs-md mb-1"><a class="fw-medium" href="{{route('single.product',$cart->product_id)}}">{{$cart->product_name}}</a></h4>
                                <div class="d-flex align-items-center fs-sm"><span class="me-2">${{$cart->price}} </span><span class="me-2">x</span>
                                    <input class="form-control form-control-sm px-2" type="text" style="max-width: 3.5rem;" min="1" value="{{$cart->qty}}" readonly>
                                </div>
                                <div class=" border-start">
                                        <a href="{{route('minus',$cart->id)}}" type="button" class="btn btn-butto btn-sm bg-white " data-id="{{$cart->id}}"><i class="ai-minus"></i></a>
                                        <a href="{{route('plus',$cart->id)}}" type="button" class="btn btn-butto btn-sm bg-white " data-id="{{$cart->id}}"><i class="ai-plus"></i></a>
                                    </div>
                            </div>
                            <div class="ps-3 border-start">
                                <a class="d-block text-danger text-decoration-none fs-xl" href="{{route('checkout.remove',$cart->id)}}" data-bs-toggle="tooltip" title="Remove"><i class="ai-x-circle"></i></a>
                                 <!--<button type="button" class="btn btn-butto btn-sm bg-white removeProduct" data-id="{{$cart->id}}"><i class="ai-x-circle"></i></button>-->
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="offcanvas-cap d-block border-top px-4 mb-2">
                <div class="d-flex justify-content-between mb-4"><span>Total:</span><span class="h6 mb-0">${{ $amount }}</span></div><a class="btn btn-primary btn-sm d-block w-100" href="{{route('checkout')}}"><i class="ai-credit-card fs-base me-2"></i>Checkout</a>
            </div>
        </div>
        @else 
     
            @php $amount=0; @endphp
            @if(Session::has('cart'))
                <!-- Shopping cart off-canvas-->
                <div class="offcanvas offcanvas-end model_cart" id="shoppingCart">
                    <div class="offcanvas-cap navbar-shadow px-4 mb-2"> 
                         <h5 class="mt-1 mb-0">Your cart</h5>
                         <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body p-4" data-simplebar>
                        @foreach(session()->get('cart') as $key => $value)
                        @php $amount +=session()->get('cart')[$key]['price'] * session()->get('cart')[$key]['quantity']; @endphp
                        <div class="d-flex align-items-center mb-3"><a class="d-block flex-shrink-0" href="{{route('single.product',session()->get('cart')[$key]['product_id'])}}"><img class="rounded" src="{{asset('uploads')}}/{{session()->get('cart')[$key]['image']}}" alt="Product" width="60"></a>
                            <div class="w-100 ps-2 ms-1">
                                <div class="d-flex align-items-center justify-content-between">
                                <div class="me-3">
                                    <h4 class="nav-heading fs-md mb-1"><a class="fw-medium" href="{{route('single.product',session()->get('cart')[$key]['product_id'])}}">{{session()->get('cart')[$key]['name']}}</a></h4>
                                    <div class="d-flex align-items-center fs-sm"><span class="me-2">${{session()->get('cart')[$key]['price']}}</span><span class="me-2">x</span>
                                        <input class="form-control form-control-sm px-2" type="text" style="max-width: 3.5rem;" min="1" value="{{session()->get('cart')[$key]['quantity']}}" readonly>
                                    </div>
                                </div>
                                <div class="ps-3 border-start">
                                    <a class="d-block text-danger text-decoration-none fs-xl removeProduct" href="javascript:void(0)"   data-id="{{session()->get('cart')[$key]['product_id']}}" data-bs-toggle="tooltip" title="Remove"><i class="ai-x-circle"></i></a>
                                    <!--<button type="button" class="btn btn-butto btn-sm bg-white removeProduct" data-id="{{session()->get('cart')[$key]['product_id']}}"><i class="ai-x-circle"></i></button>-->
                                </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    
                    </div>
                    <div class="offcanvas-cap d-block border-top px-4 mb-2">
                    <div class="d-flex justify-content-between mb-4"><span>Total:</span><span class="h6 mb-0">${{ $amount }}</span></div><a class="btn btn-primary btn-sm d-block w-100" href="{{route('checkout')}}"><i class="ai-credit-card fs-base me-2"></i>Checkout</a>
                    </div>
                </div>
                @else
                    
                <!-- Shopping cart off-canvas-->
                <div class="offcanvas offcanvas-end model_cart" id="shoppingCart">
                    <div class="offcanvas-cap navbar-shadow px-4 mb-2">
                         <h5 class="mt-1 mb-0">Your cart</h5>
                         <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body p-4" data-simplebar>
                        <center><i class="ai-shopping-cart" style="color:red;font-size:75px;margin-top:15px;margin-bottom:15px;"></i></center>
                        <center><h2>Cart is Empty</h2></center>
                        <center><h2> <a href="{{route('index')}}" style="text-decoration: none;"><button class="btn btn-outline-secondary btn-sm d-block w-100 mb-grid-gutter" type="button"><i class="ai-shopping-cart fs-lg"></i>Continue Shopping</button></a></h2></center>
        
                    </div>
                    
                </div>
                        
            @endif

        
        @endif
      <!--wishlist added-->
      

      
      <!--  user detail model -->
        @if(session()->has('user_session'))
            <div class="offcanvas offcanvas-end" id="account">
        <div class="offcanvas-cap navbar-shadow px-4 mb-2">
          <h5 class="mt-1 mb-0">Welcome {{ session()->get('user_session')->email}}</h5>
          <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-4" data-simplebar>
                   <div class="d-flex align-items-center mb-3">
                <a class="dropdown-item" href="{{route('user.profile') }}">
                  <div class="d-flex align-items-center">
                    <div class="fs-xl text-muted"><i class="ai-life-buoy"></i></div>
                    <div class="ps-3"><span class="d-block text-heading">Account Setting</span></div>
                  </div>
                </a>
            </div>
            <li class="dropdown-divider"></li>
            <div class="d-flex align-items-center mb-3">
                <a class="dropdown-item" href="{{route('user.orders') }}">
                  <div class="d-flex align-items-center">
                    <div class="fs-xl text-muted"><i class="ai-layers"></i></div>
                    <div class="ps-3"><span class="d-block text-heading">My Orders</span></div>
                  </div>
                </a>
            </div>
            <li class="dropdown-divider"></li>
            <div class="d-flex align-items-center mb-3">
                <a class="dropdown-item" href="{{route('checkout') }}">
                    <div class="d-flex align-items-center">
                        <div class="fs-xl text-muted"><i class="ai-life-buoy"></i></div>
                        <div class="ps-3"><span class="d-block text-heading">My Cart</span></div>
                    </div>
                </a>
            </div>
         
            <li class="dropdown-divider"></li>
            <div class="d-flex align-items-center mb-3">
                <a class="dropdown-item" href="{{ route('user.logout') }}">
                    <div class="d-flex align-items-center">
                        <div class="fs-xl text-muted"><i class="ai-life-buoy"></i></div>
                        <div class="ps-3"><span class="d-block text-heading">Logout</span></div>
                    </div>
                </a>
            </div>
                      
        </div>
    
      </div>
        @endif

      <!-- Navbar (Solid background + shadow)-->
   
      <header class="header" >
<div class="topbar topbar-light " style="background-color:#87ceeb">

<div class="container d-flex align-items-center px-0 px-xl-3">
<div class="text-nowrap me-3">
<i class="ai-phone fs-base text-light me-1 align-middle"></i><span class="text-light me-2">Support</span>
<a class="topbar-link me-1 text-white" href="tel:+16475475134">+16475475134</a>
</div>
<div class="container d-none d-md-block d-lg-block ">
     <div class=" d-flex ps-3 mx-5  align-items-center text-center" >
         <div>
         <i class="fa fa-truck pr-4" style="font-size:200%"></i>
         </div>
         <div>
                  <h6 class="fs-base text-light mb-1">Fast and Free Delivery</h6>
                  <p class="mb-0 fs-xs text-light ">Free Delivery for all orders over $75</p>
                </div>
                </div>
</div>
<div class="d-flex pt-2 pt-sm-0 ms-auto text-nowrap me-3">
<a class="btn-social bs-facebook bs-light me-2 "  href="https://www.facebook.com/uniqueproductspro/"><i class="ai-facebook"></i></a>
<a class="btn-social bs-instagram bs-light me-2 " href="https://instagram.com/uniqueproductspro?utm_medium=copy_link"><i class="ai-instagram" ></i></a>
<a class="btn-social bs-twitter bs-light me-2 " href=""><i class="ai-twitter"></i></a>
<a class="btn-social bs-quora bs-light pt-1" href=""><img src="https://img.icons8.com/windows/25/ffffff/quora.png"></a>
</div>




</div>
</div>
  
        <div class="navbar navbar-expand-lg navbar-light bg-light  navbar-sticky" id="navbar123" data-scroll-header data-fixed-element>

     <!--cart icon -->
          <div class="container px-0 px-xl-3">
            <button class="navbar-toggler ms-n2 me-4" type="button" data-bs-toggle="offcanvas" data-bs-target="#primaryMenu"><span class="navbar-toggler-icon"></span></button>
            <a class="navbar-brand flex-shrink-0 order-lg-1 mx-auto ms-lg-0 pe-lg-2 me-lg-4" href="{{url('/')}}">
                <img class="d-none d-lg-block" src="{{asset('uploads/logo/logo.png')}}" alt="Unique Products" width="200">
                <img class="d-lg-none" src="{{asset('uploads/logo/logo.png')}}" alt="Unique Product" width="150"></a>
            <div class="d-flex align-items-center order-lg-3 ms-lg-auto" id="iconright123">
                
                <div class="navbar-tool me-2"><a class="navbar-tool-icon-box" href="#" data-bs-toggle="offcanvas" data-bs-target="#shoppingCart"><i class="ai-shopping-cart"></i>
                    @if(Session::has('user_session'))
                    <span class="navbar-tool-badge cart_count">{{ $count}} </span>
                    @else
                        @if(Session::has('cart'))
                            <span class="navbar-tool-badge cart_count">{{ count(Session::get('cart'))}} </span>
                        @else
                            <span class="navbar-tool-badge cart_count">0 </span>
                        @endif
                    @endif
                    
                    </a> 
                </div>
                
     <!--wishlist icon -->
     
                <!-- <div class="border-start ml-2 me-2" style="height:30px"></div>-->
                <!-- <div class="navbar-tool me-2"><a class="navbar-tool-icon-box" href="#" data-bs-toggle="offcanvas" data-bs-target="#addwishlist"><i class="ai-heart"></i>-->
                <!--    @if(Session::has('user_session'))-->
                <!--    <span class="navbar-tool-badge wishlist_count">{{ $count}} </span>-->
                <!--    @else-->
                <!--        @if(Session::has('wishlist'))-->
                <!--            <span class="navbar-tool-badge wishlist_count">{{ count(Session::get('wishlist'))}} </span>-->
                <!--       @else-->
                <!--            <span class="navbar-tool-badge wishlist_count">0 </span>-->
                <!--        @endif-->
                <!--    @endif-->
                    
                <!--    </a> -->
                <!--</div>-->
              
              
              
                 @if(session()->has('user_session'))
                 
                    <!--<div class="navbar-tool d-sm-flex"><a class="nav-link-style fs-sm text-nowrap" href="#" data-bs-toggle="offcanvas" data-bs-target="#account"><i class="ai-user fs-xl me-2 align-middle"></i>Menu</a></div>-->
                    
                    @else
                    <div class="border-start ml-2 me-2" style="height: 30px;"></div>
                      <div class="navbar-tool d-sm-flex"><a class="nav-link-style fs-sm text-nowrap" href="{{url('register')}}" ><i class="ai-user fs-xl me-2 align-middle"></i>Register</a></div>
                @endif
                
                
                <div class="border-start ml-2 me-2" style="height: 30px;"></div>
            
                @if(session()->has('user_session'))
                    <div class="navbar-tool d-sm-flex"><a class="nav-link-style fs-sm text-nowrap" href="{{url('login')}}" data-bs-toggle="offcanvas" data-bs-target="#account"><i class="ai-user fs-xl me-2 align-middle"></i>Menu</a></div>
                    
                    @else
                      <div class="navbar-tool d-sm-flex"><a class="nav-link-style fs-sm text-nowrap" href="{{url('login')}}" ><i class="ai-user fs-xl me-2 align-middle"></i>Sign in</a></div>
                @endif
                
            </div>
            
            <div class="offcanvas offcanvas-collapse order-lg-2" id="primaryMenu">
              <div class="offcanvas-cap navbar-shadow">
                <h5 class="mt-1 mb-0">Menu</h5>
                <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                <!-- Menu-->
                <ul class="navbar-nav">
                    <li class="nav-item active"><a class="nav-link" href="{{url('/')}}" >HOME</a></li>
                    <li class="nav-item dropdown dropdown-mega"><a class="nav-link " href="#" data-bs-toggle="dropdown">SHOP</a>
                        <div class="dropdown-menu category" style="">
                            @foreach($categories as $category)
                            <div class="dropdown-column mb-2 mb-lg-0">
                                <h5 class="dropdown-header">{{ $category->name }}</h5>
                                @foreach($category->subcategories as $subcategory)
                                @php 
                                $subcategory_name = str_replace(' ','-',strtolower($subcategory->name))
                                @endphp
                                    <a class="dropdown-item" href="{{route('subcategorywise',$subcategory->id)}}">{{ $subcategory->name }}</a>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                  </li>
                    <li class="nav-item dropdown"><a class="nav-link " href="{{route('about')}}"> ABOUT US</a>
                  </li>
                    <li class="nav-item dropdown"><a class="nav-link" href="{{route('contact')}}" >CONTACT US</a>
                  </li>
                  <!--##############################################################################3-->
                  <!--<li class="nav-item dropdown"><a class="nav-link " href="#" data-bs-toggle="dropdown">SHOP & EARN</a>-->
                  <!--  <ul class="dropdown-menu">-->
                      <!--<li><a class="dropdown-item" href=" ">-->
                      <!--    <div class="d-flex align-items-center">-->
                      <!--      <div class="fs-xl text-muted"><i class="ai-file-text"></i></div>-->
                      <!--      <div class="ps-3"><span class="d-block text-heading">Register</span><small class="d-block text-muted"></small></div>-->
                      <!--    </div></a></li>-->
                  <!--    <li class="dropdown-divider"></li>-->
                  <!--    <li><a class="dropdown-item" href=" ">-->
                  <!--        <div class="d-flex align-items-center">-->
                  <!--          <div class="fs-xl text-muted"><i class="ai-layers"></i></div>-->
                  <!--          <div class="ps-3"><span class="d-block text-heading">Benefit<span class="badge bg-danger ms-2"></span></span><small class="d-block text-muted"></small></div>-->
                  <!--        </div></a></li>-->
                  <!--    <li class="dropdown-divider"></li>-->
                  <!--    <li><a class="dropdown-item" href=" ">-->
                  <!--        <div class="d-flex align-items-center">-->
                  <!--          <div class="fs-xl text-muted"><i class="ai-life-buoy"></i></div>-->
                  <!--          <div class="ps-3"><span class="d-block text-heading">Shop & Earn</span><small class="d-block text-muted"></small></div>-->
                  <!--        </div></a></li>-->
                  <!--      <li class="dropdown-divider"></li>-->
                  <!--    <li><a class="dropdown-item" href=" ">-->
                  <!--        <div class="d-flex align-items-center">-->
                  <!--          <div class="fs-xl text-muted"><i class="ai-life-buoy"></i></div>-->
                  <!--          <div class="ps-3"><span class="d-block text-heading">How It Works</span><small class="d-block text-muted"></small></div>-->
                  <!--        </div></a>-->
                  <!--      </li>-->
                  <!--  </ul>-->
                  <!--</li>-->
                  <!--###############################################-->
                @if(Session::has('user_session'))
                
                <!--<div class="navbar-tool d-sm-flex dropdown">-->
                <!--    <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="ai-user fs-xl me-2 align-middle"></i>{{session()->get('user_session')->email}}</a>-->
                <!--    <ul class="dropdown-menu">-->
                <!--      <li><a class="dropdown-item" href=" ">-->
                <!--          <div class="d-flex align-items-center">-->
                <!--            <div class="fs-xl text-muted"><i class="ai-user"></i></div>-->
                <!--            <div class="ps-3"><span class="d-block text-heading">Account Setting</span></div>-->
                <!--          </div></a></li>-->
                <!--      <li class="dropdown-divider"></li>-->
                <!--      <li><a class="dropdown-item" href=" ">-->
                <!--          <div class="d-flex align-items-center">-->
                <!--            <div class="fs-xl text-muted"><i class="ai-layers"></i></div>-->
                <!--            <div class="ps-3"><span class="d-block text-heading">My Orders</span></div>-->
                <!--          </div></a></li>-->
                <!--      <li class="dropdown-divider"></li>-->
                <!--      <li><a class="dropdown-item" href=" ">-->
                <!--          <div class="d-flex align-items-center">-->
                <!--            <div class="fs-xl text-muted"><i class="ai-shopping-cart"></i></div>-->
                <!--            <div class="ps-3"><span class="d-block text-heading">My Cart</span></div>-->
                <!--          </div></a></li>-->
                <!--        <li class="dropdown-divider"></li>-->
                <!--         <li><a class="dropdown-item" href=" ">-->
                <!--          <div class="d-flex align-items-center">-->
                <!--            <div class="fs-xl text-muted"><i class="ai-life-buoy"></i></div>-->
                <!--            <div class="ps-3"><span class="d-block text-heading">Logout</span></div>-->
                <!--          </div></a>-->
                <!--        </li>-->
                <!--    </ul>-->
                <!--</div>-->
                
                 
                  @endif
                 
                </ul>
              </div>
              <!--<div class="offcanvas-cap border-top"><a class="btn btn-translucent-primary d-block w-100" href="#modal-signin" data-bs-toggle="modal" data-view="#modal-signin-view"><i class="ai-user fs-lg me-2"></i>Sign in</a></div>-->
                <div class="offcanvas-cap border-top text-nowrap me-3">
                    <i class="ai-phone fs-base text-light me-1 align-middle"></i><span class=" text-light me-2">Support</span><a class="topbar-link me-1  text-light" href="tel:+16475475134">+16475475134</a>
                </div>
                 <div class="offcanvas-cap border-top bg-dark">
                   <a class="btn-social bs-facebook bs-light me-2 " href="https://www.facebook.com/uniqueproductspro/"><i class="ai-facebook"></i></a>
                   <a class="btn-social bs-instagram bs-light me-2 " href="https://instagram.com/uniqueproductspro?utm_medium=copy_link"><i class="ai-instagram"></i></a>
                   <a class="btn-social bs-twitter bs-light me-2 " href=""><i class="ai-twitter"></i></a>
                   <a class="btn-social bs-quora bs-light pt-1" href=""><img src="https://img.icons8.com/windows/25/ffffff/quora.png"/></a>
                   
                </div>
            </div>
          </div>
        </div>
      </header>
      
       @if(Session::get('phone_exist') || Session::get('email_exist'))
     
     <script>
         addEventListener("DOMContentLoaded", function() {
              $('#signup-view').addClass('show');
              $('#signin-view').removeClass('show');
            });
     </script>
     @endif
     
    @if(request()->is('register'))
      <script>
         addEventListener("DOMContentLoaded", function() {
              $('#signup-view').addClass('show');
              $('#signin-view').removeClass('show');
            });
     </script>
    @endif
      
      @yield('main')
   
    
    <!-- Footer-->
   <footer class="footer pt-5 pt-md-6">
      <!--<div class="container pt-3 pb-0 pt-md-0 pb-md-3">-->
      <!--  <div class="row">-->
      
      <!--        <h4 class="widget-title text-light">Customer zone</h4>-->
              
            <!--<div class="col-2 text-light"><a class="widget-link text-light" href="#">Your account</a></div>-->
            <!--<div class="col-2 text-light"><a class="widget-link text-light" href="#">Shipping Rates &amp; Policies</a></div>-->
      <!--      <div class="col-2 text-light"><a class="widget-link text-light" href="#">Refunds </a></div>-->

      <!--      <div class="col-2 text-light"><a class="widget-link text-light" href="#">Delivery info</a></div>-->
            <!--<div class="col-2 text-light"><a class="widget-link text-light" href="#">Taxes &amp; fees</a></div>-->
                <!--<li><a class="widget-link" href="#">News</a></li>-->
             
   
       
      
      <!--  </div>-->
      <!--</div>-->
      <div class="bg-darker pt-2">
        <div class="container py-sm-3">
          <div class="row pb-4 mb-2 pt-5 py-md-5">
            <div class="col-md-4 col-sm-6 mb-4">
              <div class="d-flex align-items-center"><i class="ai-truck text-primary" style="font-size: 2.125rem;"></i>
                <div class="ps-3">
                  <h6 class="fs-base text-light mb-1">Fast and free delivery</h6>
                  <p class="mb-0 fs-xs text-light opacity-50">Free delivery for all orders over $75</p>
                </div>
              </div>
            </div>
          
            <div class="col-md-4 col-sm-6 mb-4">
              <div class="d-flex align-items-center"><i class="ai-life-buoy text-primary" style="font-size: 2.125rem;"></i>
                <div class="ps-3">
                  <h6 class="fs-base text-light mb-1">24/7 customer support</h6>
                  <p class="mb-0 fs-xs text-light opacity-50">Friendly 24/7 customer support</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
              <div class="d-flex align-items-center"><i class="ai-credit-card text-primary" style="font-size: 2.125rem;"></i>
                <div class="ps-3">
                  <h6 class="fs-base text-light mb-1">Secure online payment</h6>
                  <p class="mb-0 fs-xs text-light opacity-50">We possess SSL / Secure сertificate</p>
                </div>
              </div>
            </div>
          </div>
          <hr class="hr-light my-0 mb-5">
          <div class="d-sm-flex align-items-center mb-4 pb-3">
            <div class="d-flex flex-wrap align-items-center me-3"><a class="d-block me-grid-gutter mt-n1 mb-3" href="{{url('/')}}" style="width: 108px;"><img src="{{asset('uploads/logo/logo.png')}}" alt="Unique Product logo"></a>
              <ul class="list-inline fs-sm pt-2 mb-3">
                <li class="list-inline-item"><a class="widget-link text-light" href="{{route('about')}}">About</a></li>
                <!--<li class="list-inline-item"><a class="nav-link-style nav-link-light" href="#">Outlets</a></li>-->
                <!--<li class="list-inline-item"><a class="nav-link-style nav-link-light" href="#">Affiliates</a></li>-->
                <!--<li class="list-inline-item"><a class="nav-link-style nav-link-light" href="#">Support</a></li>-->
                <li class="list-inline-item"><a class="widget-link text-light" href="#">Terms of use</a></li>
                 <li class="list-inline-item"><a class="widget-link text-light" href="#">Refunds </a></li>

            <li class="list-inline-item"><a class="widget-link text-light" href="#">Delivery info</a></li>
              </ul>
            </div>
            <div class="d-flex pt-2 pt-sm-0 ms-auto">
                <a class="btn-social bs-twitter bs-light me-2 mb-2" href="#"><i class="ai-twitter"></i></a>
            <a class="btn-social bs-facebook bs-light me-2 mb-2" href="https://www.facebook.com/uniqueproductspro/"><i class="ai-facebook"></i></a>
            <a class="btn-social bs-instagram bs-light me-2 mb-2" href="https://instagram.com/uniqueproductspro?utm_medium=copy_link"><i class="ai-instagram"></i></a>
            <a class="btn-social bs-pinterest bs-light me-2 mb-2" href="#"><i class="ai-pinterest"></i></a>
            <a class="btn-social bs-youtube bs-light mb-2" href="#"><i class="ai-youtube"></i></a></div>
          </div>
          <div class="d-sm-flex justify-content-between align-items-center pb-4 pb-sm-2">
            <div class="order-sm-2 mb-4 mb-sm-3"><img src="{{asset('img/footer/cards.png')}}" alt="Payment methods" width="181"></div>
            <div class="order-sm-1 mb-3">
              <p class="fs-ms mb-0"><span class="text-light opacity-50 me-1">© All rights reserved. Made by</span><a class="nav-link-style nav-link-light" href="{{url('/')}}" target="_blank" rel="noopener">Unique Products</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- Back to top button--><a class="btn-scroll-top" href="#top" data-scroll data-fixed-element><span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span><i class="btn-scroll-top-icon ai-arrow-up">   </i></a>
   
 
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    @yield('custom-js')
   
    <script>
        let url ="{{env('APP_URL')}}";
        // let url ="http://uniqueproducs.ca";
        
        $(document).on('click','#register-form', function () {
          
         
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
             $.ajax({
                url: url+"register",
                type: "POST",
                data: $('#signup').serialize(),
                success: function( response ) {
                   
                   if(response.email_exist) {
                       
                      $('.email_error').css('display','block');
                      $('.phone_error').css('display','none');
                       
                   }else if(response.phone_exist) {
                       $('.email_error').css('display','none');
                       $('.phone_error').css('display','block');
                      
                   }else{
                      
                      if(response.success){
                          window.location=url+"account-profile";
                       }else{
                         alert('response.success')  
                       }
                       
                   }
                
                    // document.getElementById("contactUsForm").reset(); 
                },
                error: function(errors) {
            
                    console.log(errors);
            
                }
            });
        
        });
        
        
        $(document).on('click','#login-form', function () {
          
         
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  },
                  cache: false
              });
             $.ajax({
                url: url+"login",
                type: "POST",
                dataType: 'json',
                data: $('#signin').serialize(),
                success: function( response ) {
                    
                    if(response.success){
                         window.location=url+"account-profile"; 
                    }else if(response.credential_error){
                        // alert(response.credential_error);
                         $('.login_email_error').css('display','none');
                        $('.login_password_error').css('display','block');
                    } else{
                        // alert(response.user_not_exist); 
                         $('.login_email_error').css('display','block');
                      $('.login_password_error').css('display','none');
                    }
                        
                     
                    //document.getElementById("sigin").reset(); 
                },
                error: function(errors) {
            
                    console.log(errors);
            
                }
            });
        
        });
        
       
   
        $(document).on('click','.plus' , function () {
            var id = $(this).data('id');
            // alert(id);
             $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  },
                  cache: false
              });
              
             $.ajax({
                url: url+"/checkout/plus/"+id,
                type: "POST",
                data: id,
                 dataType: 'json',
                success: function( response ) {
                    
                    // alert(response.data);
                    if(response.response=='success'){
                        $(".cart_body").html(response.data);
                        Swal.fire({
                            icon: 'success',
                            text: response.message,
                            toast: true,
                            position: 'top-right',
                            timer: 2000,
                            showConfirmButton: false,
                             timerProgressBar: true,
                            })
                        
                    }else{
                        
                         Swal.fire({
                            icon: 'error',
                            text: response.message,
                            toast: true,
                            position: 'top-right',
                            timer: 2000,
                            showConfirmButton: false,
                             timerProgressBar: true,
                        })
                    }
                    
                     
                },
                error: function(errors) {
            
                    alert('errors.pluscart');
            
                }
            });
        });
        
        $(document).on('click','.minus' , function () {
            var id = $(this).data('id');
            // alert(id);
             $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  },
                  cache: false
              });
              
             $.ajax({
                url: url+"/checkout/minus/"+id,
                type: "POST",
                data: id,
                 dataType: 'json',
                success: function( response ) {
                   
                    if(response.response=='success'){
                        $(".cart_body").html(response.data);
                        Swal.fire({
                            icon: 'success',
                            text: response.message,
                            toast: true,
                            position: 'top-right',
                            timer: 2000,
                            showConfirmButton: false,
                             timerProgressBar: true,
                            })
                        
                    }else{
                        
                         Swal.fire({
                            icon: 'error',
                            text: response.message,
                            toast: true,
                            position: 'top-right',
                            timer: 2000,
                            showConfirmButton: false,
                             timerProgressBar: true,
                        })
                    }
                   
                },
                error: function(errors) {
            
                    alert('errors.minuscart');
            
                }
            });     
        });
        
        
         $(document).on('click','.removeProduct' , function () {
            var id = $(this).data('id');
            // alert(id);
             $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  },
                  cache: false
              });
              
             $.ajax({
                url: url+"/checkout/remove/"+id,
                type: "POST",
                data: id,
                 dataType: 'json',
                success: function( response ) {
                //   alert(response.message);
                    if(response.response=='success'){
                        $(".cart_body").html(response.data);
                        Swal.fire({
                            icon: 'success',
                            text: response.message,
                            toast: true,
                            position: 'top-right',
                            timer: 2000,
                            showConfirmButton: false,
                            timerProgressBar: true,
                        })
                        
                    }else if(response.response =='removedfromsession'){
                        //  alert(response.count);
                        $(".model_cart").html(response.data);
                        $(".cart_count").html(response.count);
                        
                        Swal.fire({
                            icon: 'success',
                            text: response.message,
                            toast: true,
                            position: 'top-right',
                            timer: 2000,
                            showConfirmButton: false,
                            timerProgressBar: true,
                        })
                        
                    }else{
                        
                         Swal.fire({
                            icon: 'error',
                            text: response.message,
                            toast: true,
                            position: 'top-right',
                            timer: 2000,
                            showConfirmButton: false,
                             timerProgressBar: true,
                        })
                    }
                   
                },
                error: function(errors) {
            
                   Swal.fire({
                            icon: 'error',
                            text: errors.data.error,
                            toast: true,
                            position: 'top-right',
                            timer: 2000,
                            showConfirmButton: false,
                             timerProgressBar: true,
                        })
            
                }
            });     
        });
        
        
        
        //  $(document).on('click','.add_to_cart' , function () {
        //     var id = $(this).data('id');
        //     // alert(id);
        //      $.ajaxSetup({
        //           headers: {
        //               'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        //           },
        //           cache: false
        //       });
              
        //      $.ajax({
        //         url: url+"/add-to-cart/"+id,
        //         type: "POST",
        //         data: id,
        //          dataType: 'json',
        //         success: function( response ) {
        //             // alert(response.message);
                    
        //             if(response.response =='success'){
        //               $(".model_cart").html(response.data);
        //               $(".cart_count").html(response.count);
        //                 Swal.fire({
        //                     icon: 'success',
        //                     text: response.message,
        //                     toast: true,
        //                     position: 'top-right',
        //                     timer: 2000,
        //                     showConfirmButton: false,
        //                      timerProgressBar: true,
        //                     })
                        
        //             }else{
                         
        //                  Swal.fire({
        //                     icon: 'error',
        //                     text: response.message,
        //                     toast: true,
        //                     position: 'top-right',
        //                     timer: 2000,
        //                     showConfirmButton: false,
        //                      timerProgressBar: true,
        //                 })
        //             }
                   
        //         },
        //         error: function(errors) {
            
        //             alert('errors.addtocart');
            
        //         }
        //     });     
        // });
        
         $(document).on('click','.product-gallery-thumblist-item' , function () {
            
            var href =  $(this).attr('href');
            // var href = href.substring(1)
            if(href){
                $(href).addClass('active');
            }

         });
         
         
            $(document).on('click','.category_name' , function () {
            
           
            var href =  $(this).attr('href');
            var class_name = href.substring(1)
            var class_name =  $('.'+class_name).attr('class');
            // alert(href);
            
            // $(href).addClass('show');
            var ul_class =  $(href).attr('class');
            var show_class = ul_class +' '+'show' ;
            //  alert(ul_class);
            //  alert(show_class);
            
            if(ul_class.indexOf('show') !== -1){
               
                $(href).removeClass('show');
               $(this).addClass('collapsed') ;
            }else{
                $('.category_name').addClass('collapsed');
               $('.collapse').removeClass('show') ;
                $(href).addClass('show') ;
                $(this).removeClass('collapsed');
                
            }
            
          

         });
    

    </script>
    
    <script>
      $(document).ready(function () {    
    
            $('.numberonly ').keypress(function (e) {    
    
                var charCode = (e.which) ? e.which : event.keyCode    
    
                if (String.fromCharCode(charCode).match(/[^0-9]/g))    
    
                    return false;                        
    
            });
            
             $('.pin ').keypress(function (e) {    
    
                var charCode = (e.which) ? e.which : event.keyCode    
    
                if (String.fromCharCode(charCode).match(/[^0-9]/g))    
    
                    return false;                        
    
            });
            
            
    
        }); 
  </script>
    
     @if(Session::get('success'))
        <!--<script>-->
        <!--    Swal.fire({-->
        <!--        icon: 'success',-->
        <!--        text: "{{session()->get('success')}}",-->
        <!--        toast: true,-->
        <!--        position: 'top-right',-->
        <!--        timer: 4000,-->
        <!--        showConfirmButton: false,-->
        <!--         timerProgressBar: true,-->
        <!--        })-->
        <!--</script>-->
     @endif
      @if(Session::get('pin_error'))
        <script>
            Swal.fire({
                icon: 'error',
                text: "{{session()->get('pin_error')}}",
                toast: true,
                position: 'top-right',
                timer: 4000,
                showConfirmButton: false,
                 timerProgressBar: true,
                })
           jQuery('.serviceable').html("{{session()->get('pin_error')}}").css('color','red'); 
        </script>
         
     @endif
     
     
    <script type="text/javascript">
        function incrementValue()
        {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            if(value<10){
                value++;
                    document.getElementById('number').value = value;
            }
        }
        function decrementValue()
        {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            if(value>1){
                value--;
                    document.getElementById('number').value = value;
            }
        
        }
    </script>
    

    <!-- Vendor scrits: js libraries and plugins-->
    <script src="{{asset('frontend-theme/around/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend-theme/around/vendor/simplebar/dist/simplebar.min.js')}}"></script>
    <script src="{{asset('frontend-theme/around/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js')}}"></script>
    <script src="{{asset('frontend-theme/around/vendor/tiny-slider/dist/min/tiny-slider.js')}}"></script>
    <!-- Main theme script-->
    <script src="{{asset('frontend-theme/around/js/theme.min.js')}}"></script>
    
  </body>
</html>