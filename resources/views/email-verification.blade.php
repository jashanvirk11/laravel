@extends('layouts.around-header')
@section('page-title') 
   Verification
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
            <p>Your verification Code is</p>
        </div>
        <div class="card-body m-auto">
            <form method="POST" action="{{route('user.code',$id)}}">
                @csrf
                <div class="form-group row">
                    <input id="verification_code" type="text" class="form-control @error('verification_code') is-invalid @enderror" name="verification_code" value="{{ old('verification_code') }}" placeholder="Enter Your  code" required autocomplete="verification_code" autofocus>
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
                    <button type="submit" class="btn btn-primary">Verify</button>
                
                </div>
            </form>
        </div>
    </div>
    @endsection
       
