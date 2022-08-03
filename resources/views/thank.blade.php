@extends('layouts.around-header')
@section('page-title') 
   Thank you
@endsection
@section('meta-schema')
@endsection
@section('custom-css')
<style>

    .ai-x-circle{
        color:red;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>
@endsection
@section('main')
<div class="jumbotron text-center">
  <h1 class="display-3">Thank You!Your Payment is successful</h1>
  <p class="lead"><strong>Please check your email</strong></p>
  <hr>
 
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="{{route('index')}}" role="button">Continue to homepage</a>
  </p>
</div>
@endsection