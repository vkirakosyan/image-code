<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" >
<head>

	<title>@yield('title')</title>
	@section('style')
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<style type="text/css">
		#app{
			overflow-y: auto;
		}
	</style>
	@show
	@section('script_head')
		<script>
			Window.urls=JSON.parse('{!! addcslashes(json_encode($navbar),"'")!!}');
			Window.contactdata=JSON.parse('{!! addcslashes(json_encode($contact),"'")!!}');
			<?php $lang = Lang::get('navbar');?>
			Window.lang=JSON.parse('{!! addcslashes(json_encode(Lang::get("navbar")),"'")!!}');
		</script>
	@show
</head>
<body>
	@section('content')
		<div id="app"  >
		</div>
		
			<div id="navbarcontent">
				<site-nav-bar 	:urls="urls"
								:sitname="'Sitename'"
								:lang="'{{$lang['language']}}'"
								:getlocal="'{{app()->getLocale()}}'"
							    class="lang_{{app()->getLocale()}}"></site-nav-bar>
			</div>
		
	@show
	@section('footer')
		<footer id="footerBar">
			<footer-content :phone="'{{$lang['phone']}}'"
							:address="'{{$lang['address']}}'"
							:addresslink="[contact]"></footer-content>
			<button  @click="$_ReturnTop" :class="{ 'show' : animat }"><span class="glyphicon glyphicon-arrow-up"></span></button>
		</footer>
	@show
	
	@section('script')
		<script src="{{asset('/js/app.js')}}"></script>
		<script src="{{asset('/js/NavBarContent.js')}}"></script>
	@show
</body>
</html>