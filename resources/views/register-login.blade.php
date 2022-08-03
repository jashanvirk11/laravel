@extends('layouts.around-header')
@section('page-title') 
    Register | Login
@endsection
@section('meta-schema')
@endsection
@section('custom-css')

    <style>
        
    </style>
@endsection
@section('main')
  <!-- Page content-->
  
  <div class="container-fluid py-3" style="background-color:#12384008">
      <section class="container d-flex justify-content-center align-items-center pt-2 pb-4" style="flex: 1 0 auto;">
        <div class="signin-form mt-3">
            <div class="signin-form-inner">
                <!-- Sign in view-->
                <div class="view show" id="signin-view">
                  <h1 class="h2 text-center">Login</h1>
                  <p class="fs-ms text-muted mb-4 text-center">Sign in to your account using email and password provided during registration.</p>
                  <form class="" method="POST" action="{{route('user.login')}}" id="signin">
                     @csrf
                        
                        @if($checkout)
                        <input type="hidden" name="from_checkout" value="true"/>
                        @endif
                      <div class="mb-3">
                        <div class="input-group"><i class="ai-mail position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                            <input id="email" class="form-control rounded @error('email') is-invalid @enderror email" type="email" placeholder="Email" name="email"  autocomplete="email" autofocus >
                        </div>
                        @if ($message = Session::get('user_not_exist'))
                            <div class="alert alert-danger alert-dismissible fade show mt-2 login_email_error" role="alert">
                               	<strong>{{ $message }}</strong>
                               	 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                         @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <div class="input-group"><i class="ai-lock position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                          <div class="password-toggle w-100">
                            <input id="current-password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" type="password" placeholder="Password" >
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                              <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                            </label>
                          </div>
                        </div>
                         @if ($message = Session::get('credential_error'))
                            <div class="alert alert-danger alert-dismissible fade show mt-2 login_email_error" role="alert">
                               	<strong>{{ $message }}</strong>
                               	 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        
                      </div>
                    <div class="d-flex justify-content-between align-items-center mb-3 pb-1">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="keep-signed-2">
                        <label class="form-check-label" for="keep-signed-2">Keep me signed in</label>
                      </div><a class="nav-link-style fs-ms" href="{{route('user.forgotpassword')}}">Forgot password?</a>
                    </div>
                    <button class="btn btn-primary d-block w-100" type="submit">Sign in</button>
                    <p class="fs-sm pt-3 mb-0 text-center">Don't have an account? <a href='#' class='fw-medium' data-view='#signup-view'>Sign up</a></p>
                  </form>
                </div>
                <!-- Sign up view-->
                <div class="view" id="signup-view">
                  <h1 class="h6 text-center">Register your new account</h1>
                  <p class="fs-ms text-muted mb-4 text-center">Registration takes less than a minute but gives you full control over your orders.</p>
                  @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show my-2 login_email_error" role="alert">
                           	<strong>{{ $message }}</strong>
                           	 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                     @if ($message = Session::has('success'))
                      <script>
                      <div class="alert alert-success alert-dismissible fade show my-2 login_email_error" role="alert">
                           	<strong>{{ $message }}</strong>
                           	 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
               
                  <form method="POST" action="{{route('user.register')}}"  class="" id="signup" enctype="multipart/form-data">
                     @csrf
                     
                    
                    @if($checkout)
                    <input type="hidden" name="from_checkout" value="true"/>
                    @endif
                      <div class="mb-3">
                          <label for="pass">Full Name *</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Full name" name="name" value="{{ old('name') }}" autocomplete="name"  >
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                         
                      </div>
                      <div class="mb-3">
                          <label for="pass">Email *</label>
                        <input class="form-control @error('email') is-invalid @enderror email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="email" >
                        <!-- Danger alert -->
                         @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @if ($message = Session::get('email_exist'))
                            <div class="alert alert-danger alert-dismissible fade show mt-2 login_email_error" role="alert">
                               	<strong>{{ $message }}</strong>
                               	 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                      </div>
                          <div class="mb-3">
                          <label for="pass">Mobile *</label>
                        <input class="form-control @error('phone') is-invalid @enderror phone numberonly" type="text" placeholder="Mobile No" name="phone" value="{{ old('phone') }}" autocomplete="phone" >
                        <!-- Danger alert -->
                         @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @if ($message = Session::get('phone_exist'))
                            <div class="alert alert-danger alert-dismissible fade show mt-2 login_email_error" role="alert">
                               	<strong>{{ $message }}</strong>
                               	 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                      <div class="mb-3">
                          <label for="pass">Password *</label>
                        <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password" value="{{ old('password') }}" autocomplete="password" >
                        <!-- Danger alert -->
                         @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  
                      </div>
                        
                    <button  class="btn btn-primary d-block w-100" id="signup" type="submit">Sign up</button>
              


                  
                    <p class="fs-sm pt-3 mb-0 text-center">Already have an account? <a href='#' class='fw-medium' data-view='#signin-view'>Sign in</a></p>
                  </form>
                </div>
                <!--<div class="border-top text-center mt-4 pt-4">-->
                <!--  <p class="fs-sm fw-medium text-heading">Or sign in with</p><a class="btn-social bs-facebook bs-outline bs-lg mx-1 mb-2" href="#"><i class="ai-facebook"></i></a><a class="btn-social bs-twitter bs-outline bs-lg mx-1 mb-2" href="#"><i class="ai-twitter"></i></a><a class="btn-social bs-instagram bs-outline bs-lg mx-1 mb-2" href="#"><i class="ai-instagram"></i></a><a class="btn-social bs-google bs-outline bs-lg mx-1 mb-2" href="#"><i class="ai-google"></i></a>-->
                <!--</div>-->
            </div>
        </div>
      </section>
      </div>
    </main>
  
    
    
    @endsection
   