@extends('layouts.user')

@section('title','HOME')

@section('style')
	@parent
    <link rel="stylesheet" type="text/css" href="/css/dashbord.css">
	<link rel="stylesheet" type="text/css" href="/css/servise.css">
@endsection
@section('script_head')
	@parent
	<script >
		// console.log(Window.categorydata);
	</script>

@endsection

@section('content')
	@parent
	<div id="servises"  class="container-fluid">
		<div id="slidebar"  class="container-fluid">
            <h3 class="categoryname display_position">@lang('service')</h3>
        </div>
        <div class="container-fluid">
            <div class="row">
                @foreach ($servise as $service)
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <h2 style="color: #b5651d;"><span ></span>{{$service->name}}</h2>
                        <ul class="srvise-list">
                            @foreach ($service->servises as $service_item)
                                <li><span class="name">{{$service_item->name}}</span> <span class="price-block"><span class="price">{{$service_item->price}}</span> <span class="valiut">{{$service_item->valiut}}</span></span></li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
	</div>

@endsection

@section('footer')
	@parent
@endsection

@section('script')
	@parent
	<!-- <script src="{{asset('/js/UserService.js')}}"></script> -->
@endsection
