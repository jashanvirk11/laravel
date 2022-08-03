@extends('layouts.around-header')
@section('page-title')
    {{ $data->title }}
@endsection

@section('main')
<link href="https://cdn.quilljs.com/1.3.4/quill.core.css" rel="stylesheet">
<link href="https://cdn.quilljs.com/1.3.4/quill.snow.css" rel="stylesheet">
<link href="https://cdn.quilljs.com/1.3.4/quill.bubble.css" rel="stylesheet">
<style>
    .container-1 {
        height: 100%;
        widows: 100%;
        padding-left: 5%;
        padding-right: 5%;
    }

    .container-1 {
        background: #e2e1e0;
        
    }

    .card {
        background: #fff;
        border-radius: 2px;
        display: inline-block;
        height: 100%;
        position: relative;
        width: 100%;
    }

    .card-1 {
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
    }

    .card-1:hover {
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
    }
    .categories_banner_area:before {
        background-image: url('{{ $data->banner }}');
    }
</style>
    <!--<section class="categories_banner_area" style="height:300px">-->
    <!--    <div class="container">-->
    <!--        <div class="c_banner_inner" style="padding: 150px 0px; !important">-->
    <!--            <h3>{{ $data->title }}</h3>-->
    <!--            <ul>-->
    <!--                <li><a href="{{ url('/') }}">Home</a></li>-->
    <!--                <li><a href="{{ url('/'.$data->title) }}">{{ $data->title }}</a></li>-->
    <!--            </ul>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                     <h3>{{ $data->title }}</h3>
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="{{ url('/') }}">Home</a></li>
                        <li class="page-breadcrumb__nav active"><a href="{{ url('/'.$data->title) }}">{{ $data->title }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->
    <div class="container-1">
        <div class="row">            
            <div class="col-md-12" style="padding-top:10px; padding-bottom:30px">
                <div class="card card-1">
                    <h4 class="text-primary text-center p-2"></h4>
                    <div class="p-4 ql-editor">
                        {!! $data->content !!}
                    </div>
                </div>
            </div>            
        </div>
    </div>
@endsection