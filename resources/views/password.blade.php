@extends('layouts.around-header')
@section('page-title') 
    Reset Password  
@endsection
@section('meta-schema')
@endsection
@section('custom-css')
    <style>
        
    </style>
@endsection
@section('main')
        
 
    <div class="card">
        <div class="card-header text-center">
            <p> Reset Your Password </p>
        </div>
       <div class="card-body m-auto">
            <form method="POST" action="">
                @csrf
                <div class="form-group row">
                    <div class="container">
                            <div class="mb-3">
                        <div class="input-group"><i class="ai-mail position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                            <input id="email" class="form-control rounded @error('email') is-invalid @enderror email" type="email" placeholder="Email" name="email"  autocomplete="email" autofocus >
                        </div>
                      
                         @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                            <div class="mb-3">
                        <div class="input-group"><i class="ai-lock position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                          <div class="password-toggle w-100">
                           <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Enter Your New Password" required autocomplete="password" autofocus>
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                              <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                            </label>
                          </div>
                        </div>
                        </div>
                         <div class="mb-3">
                        <div class="input-group"><i class="ai-lock position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                          <div class="password-toggle w-100">
                            <input id="password" type="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror mt-2" name="confirm_password" value="{{ old('confirm_password') }}" placeholder="Enter Your confirm Password" required autocomplete="confirm_password" autofocus>
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                              <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                            </label>
                          </div>
                        </div>
                        </div>
                  </div>
                  @if ($message = Session::get('error'))
                        <!-- Danger alert -->
                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                          <span class="fw-medium"> <strong>{{ $message }}</strong></span>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                     @if ($message = Session::get('success'))
                        <!-- Danger alert -->
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                          <span class="fw-medium"> <strong>{{ $message }}</strong></span>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Reset Your Password</button>
                </div>
            </form>
        </div>
    </div>
       
        
@endsection