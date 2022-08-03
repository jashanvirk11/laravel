@extends('layouts.around-header')
@section('page-title')
    How It Works
@endsection
@section('main')
{{-- <iframe src="https://onedrive.live.com/embed?cid=95C84D2C212823DD&resid=95C84D2C212823DD%21106&authkey=AE4gcn7Z5llVUA8&em=2" width="1500" height="600" frameborder="0" scrolling="no"></iframe> --}}
<iframe src="{{ asset('ppt/benefitsrural.pdf') }}#toolbar=0" height="500px" width="1300px" ></iframe>
{{-- <iframe src="your-pdf-name.pdf#toolbar=0"></iframe> --}}
@endsection