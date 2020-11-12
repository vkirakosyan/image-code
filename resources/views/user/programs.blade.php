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
		Window.programs=JSON.parse('{!! addcslashes(json_encode($programs),"'")!!}');
	</script>
@endsection

@section('content')
	@parent
	<div id="programs"  class="container-fluid">
		<div id="slidebar"  class="container-fluid">
			<h3 class="display_position">{{$lang['programs']}}</h3>
		</div>
		<programs-view :programs="programs"></programs-view>
	</div>

@endsection

@section('footer')
	@parent
@endsection

@section('script')
	@parent
	<script src="{{asset('/js/UserPrograms.js')}}"></script>
@endsection
