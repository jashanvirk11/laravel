@extends('layouts.around-header')

@section('main')
 <main class="py-4">
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <div class="container">
      @if(Session::get('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{Session::get('status')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @elseif(Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{Session::get('error')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
    </div>
  @if(count($order) > 0)
 <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
<div class="container bootdey shadow-lg">
<div class="panel panel-default panel-order">
  <div class="panel-heading">
      <strong>Order history</strong>
      <div class="btn-group pull-right">
          <div class="btn-group">
			<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
			  Filter history <i class="fa fa-filter"></i>
			</button>
			<ul class="dropdown-menu dropdown-menu-right">
			  <li><a href="#">Approved orders</a></li>
			  <li><a href="#">Pending orders</a></li>
			</ul>
		  </div>
		</div>
  </div>
<div class="panel-body">
    @foreach($order as $item)
  	<div class="row">
	  <div class="col-md-1"><img src="{{ $item->product[0]->cover_photo }}" class="media-object img-thumbnail" height="100" width="100"></div>
	  <div class="col-md-11">
		<div class="row">
		  <div class="col-md-12">
            <div class="pull-right m-4"><label class="label label-success">@if($item->status != 'delivered') {{ $item->status }} </label><label class="label label-primary ml-1"><a class="text-white" href="{{url('ordertrack/')}}/{{$item->id}}">Track</a></label>
              @else {{ $item->status }}</label><label class="label label-danger ml-1"><a class="text-white" href="{{ url('order_cancell') }}">Return</a></label>
              @endif
            </div>
			<span><strong>{{ $item->product[0]->name }}</strong></span>
			Quantity : {{ $item->qty }}, cost: &#8377;{{ $item->gross_price}} <br>
			<a data-placement="top" class="badge badge-primary" href="#" title="View">#000{{ $item->id }}</a>
			<a data-placement="top" class="btn btn-danger  btn-xs glyphicon glyphicon-trash" href="#" title="Danger"></a>
			<a data-placement="top" class="btn btn-info  btn-xs fas fa-eye" href="{{ url('product/') }}/{{ $item->product[0]->slug }}" ></a>
      </div>
		  <div class="col-md-12">
			order made on: {{ $item->delivery_date }} by <a href="#">Jane Doe </a>
		  </div>
		</div>
	  </div>
	</div>
    @endforeach

</div>
</div>
</div>
    @else
       <style>
           *{
    transition: all 0.6s;
}
body{
    font-family: 'Lato', sans-serif;
    color: #888;
}

#main{
    display: table;
    width: 100%;
    height: 100vh;
    text-align: center;
}

.fof{
      display: table-cell;
      vertical-align: middle;
}

.fof h1{
      font-size: 50px;
      display: inline-block;
      padding-right: 12px;
      animation: type .5s alternate infinite;
}

@keyframes type{
      from{box-shadow: inset -3px 0px 0px #888;}
      to{box-shadow: inset -3px 0px 0px transparent;}
}
       </style>
       <div id="main">
         <div class="fof">
                <h2>YOU NOT HAVE ANY ORDER</h2><br/>
                <a href="{{url('shop')}}"><h1 class="text-white">SHOP NOW</h1></a>
         </div>
       </div>
     @endif
</main>
@endsection
