@extends('layouts.user')
<?php $lang = Lang::get('navbar');?>
@section('title',$lang['about'])

@section('style')
	@parent
	<link rel="stylesheet" type="text/css" href="/css/dashbord.css">
@endsection
@section('script_head')
	@parent
@endsection

@section('content')
	@parent
	<div id="usercontacts"  class="container-fluid">
		<div id="slidebar"  class="container-fluid">

		</div>
		<div class="contactsheader">
			<h3 class="contacts">{{$lang['about']}}</h3>
		</div>
		
		
	</div>

@endsection

@section('footer')
	@parent
@endsection

@section('script')
	@parent
	<script src="{{asset('/js/UserContact.js')}}"></script>
@endsection
