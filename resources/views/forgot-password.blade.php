@extends('layouts.around-header')
@section('page-title') 
    Forgot Password  
@endsection
@section('meta-schema')
@endsection
@section('custom-css')
    <style>
        
    </style>
@endsection
@section('main')
        
 
    <div class="card">
      
       <div class="card-body m-auto">
            <form method="POST" action="{{ route('user.forgotpassword') }}">
                @csrf
                <div class="form-group row">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Your User Email ID" required autocomplete="email" autofocus>
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
       
        
@endsection