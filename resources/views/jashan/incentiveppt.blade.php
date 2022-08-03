@extends('layouts.around-header')
@section('main')
{{-- <iframe src="https://onedrive.live.com/embed?cid=95C84D2C212823DD&resid=95C84D2C212823DD%21111&authkey=AAdHvaoMBR9XtRU&em=2" width="1500" height="600" frameborder="0" scrolling="no"></iframe> --}}
<iframe src="{{ asset('ppt/scheme.pdf') }}#toolbar=0" height="500px" width="1300px" ></iframe>
@endsection