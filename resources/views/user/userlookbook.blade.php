@extends('layouts.user')

@section('title','HOME')

@section('style')
	@parent
	<link rel="stylesheet" type="text/css" href="/css/dashbord.css">
@endsection
@section('script_head')
	@parent
	@parent
	<script >
		Window.lookbookimgdata=JSON.parse('{!! addcslashes(json_encode($lookbookimg),"'")!!}');
		console.log(Window.lookbookimgdata);
	</script>
@endsection

@section('content')
	@parent
	
	<div id="lookbooks"  class="container-fluid">
		<div id="slidebar"  class="container-fluid">
			<h3 class="lookbookname display_position">@{{lookbook.name}}</h3>
		</div>
		<lookbook-albom :albomes="lookbook.lookbook_category" ></lookbook-albom>
	</div>

@endsection

@section('footer')
	@parent
@endsection

@section('script')
	@parent
	<script src="{{asset('/js/UserLookbook.js')}}"></script>
@endsection
