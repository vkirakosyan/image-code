@extends('layouts.user')

@section('title','HOME')
<?php $lang = Lang::get('navbar');?>
@section('style')
	@parent
	<link rel="stylesheet" type="text/css" href="/css/dashbord.css">
@endsection
@section('script_head')
	@parent
	<script >
		Window.contactdata=JSON.parse('{!! addcslashes(json_encode($contact),"'")!!}');
	</script>
@endsection

@section('content')
	@parent
	<div id="usercontacts"  class="container-fluid">
		<div id="slidebar"  class="container-fluid">

		</div>
		<div class="contactsheader">
			<h3 class="contacts">{{$lang['contact_detals']}}</h3>
		</div>
		
		<user-contact  :contacts="[contacts]"></user-contact>
	</div>

@endsection

@section('footer')
	@parent
@endsection

@section('script')
	@parent
	<script src="{{asset('/js/UserContact.js')}}"></script>
@endsection
