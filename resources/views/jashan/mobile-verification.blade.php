@extends('layouts.around-header')
@section('page-title') 
    Mobile Verification | 
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
            <p> Verify your Mobile Number By Otp</p>
        </div>
        <div class="card-body m-auto">
            <form method="POST" action="#">
                @csrf
                <div class="form-group row">
                    <input id="otp" type="text" class="form-control @error('otp') is-invalid @enderror" name="otp" value="{{ old('otp') }}" placeholder="Enter Your  Mobile" required autocomplete="otp" autofocus>
                    @if ($message = Session::get('error'))
                        <!-- Danger alert -->
                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                          <span class="fw-medium"> <strong>{{ $message }}</strong></span>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                     @if ($message = Session::get('success'))
                        <!-- Danger alert -->
                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                          <span class="fw-medium"> <strong>{{ $message }}</strong></span>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Verify</button>
                    <button type="submit" class="btn btn-primary">Resend</button>
                </div>
            </form>
        </div>
    </div>
       
        
@endsection