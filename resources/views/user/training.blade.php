@extends('layouts.user')

@section('title','HOME')

@section('style')
	@parent
	<link rel="stylesheet" type="text/css" href="/css/dashbord.css">
@endsection
@section('script_head')
	@parent
	<script >
		Window.trainingdata=JSON.parse('{!! addcslashes(json_encode($training),"'")!!}');
	</script>
@endsection

@section('content')
	@parent
	<div id="training"  class="container-fluid">
		<div id="slidebar"  class="container-fluid">
			<h3 class=" display_position"></h3>
		</div>
		<training-user  :trainings="trainings.training"></training-user>
	
	</div>

@endsection

@section('footer')
	@parent
@endsection

@section('script')
	@parent
	<script src="{{asset('/js/UserTraining.js')}}"></script>
@endsection
