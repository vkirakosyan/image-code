@extends('layouts.user')
<?php $lang = Lang::get('navbar');?>
@section('title','HOME')

@section('style')
	@parent
	<link rel="stylesheet" type="text/css" href="/css/dashbord.css">
@endsection
@section('script_head')
	@parent
	<script >
		Window.images=JSON.parse('{!! addcslashes(json_encode($images),"'")!!}');

	</script>
@endsection

@section('content')
	@parent
	<div id="photosesia"  class="container-fluid">
		<div id="slidebar"  class="container-fluid">
			<h3 class="display_position">{{$lang['photosesio']}}</h3>
		</div>
		<div  class="potosesion">
			<photo-img   :albomes="photosesiadata"></photo-img>
		</div>
	</div>

@endsection

@section('footer')
	@parent
@endsection

@section('script')
	@parent
	<script src="{{asset('/js/UserPhotosesia.js')}}"></script>
@endsection
