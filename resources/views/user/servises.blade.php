@extends('layouts.user')

@section('title','HOME')

@section('style')
	@parent
	<link rel="stylesheet" type="text/css" href="/css/dashbord.css">
@endsection
@section('script_head')
	@parent
	<script >
		Window.categorydata=JSON.parse('{!! addcslashes(json_encode($category),"'")!!}');
		// console.log(Window.categorydata);
	</script>
@endsection

@section('content')
	@parent
	<div id="servises"  class="container-fluid">
		<div id="slidebar"  class="container-fluid">
			<h3 class="categoryname display_position">@{{servicedata.name}}</h3>
		</div>
		<service-view  :servicedata="servicedata.servises"></service-view>
	</div>

@endsection

@section('footer')
	@parent
@endsection

@section('script')
	@parent
	<script src="{{asset('/js/UserService.js')}}"></script>
@endsection
