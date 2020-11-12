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
		Window.eventsdata=JSON.parse('{!! addcslashes(json_encode($events),"'")!!}');
	</script>
@endsection

@section('content')
	@parent
	<div id="userevents"  class="container-fluid">
		<div id="slidebar"  class="container-fluid">
			<h3 class="display_position">{{$lang['events']}}</h3>
		</div>
		<ul class="nav nav-tabs container">
			  <li class="active"><a data-toggle="tab" href="#eventsbefore">{{$lang['notify_in_advance']}}</a></li>
			  <li><a data-toggle="tab" href="#eventscomplated">{{$lang['events']}}</a></li>
		</ul>
		<div class="tab-content ">
			  	<div id="eventsbefore" class="tab-pane fade in active container">
					<user-events  :programs="event.before"></user-events>
			  	</div>
			  	<div id="eventscomplated" class="tab-pane fade in  container">
					<user-events  :programs="event.complated"></user-events>
			  	</div>
			  </div>
	</div>

@endsection

@section('footer')
	@parent
@endsection

@section('script')
	@parent
	<script src="{{asset('/js/UserEvents.js')}}"></script>
@endsection
