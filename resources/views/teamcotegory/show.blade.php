@extends('layouts.app')
<script >
	Window.teamcotegory=JSON.parse('{!! addcslashes(json_encode($teamcotgory),"'")!!}');
</script>
@section('content')
<div class="container-fluid adminbody">
	<div class="tabs-left tabbable col-md-2">
		<ul class="nav nav-tabs">
			<li class="active"><a href='/team'>Բոլոր աշխատակիցները</a></li>
			<li><a  href="/photosesia">Ֆոտոսեսիա</a></li>
			<li><a  href="/training">Դասընթացներ</a></li>
			<li><a  href="/servises">Ծառայություններ </a></li>
			<li><a  href="/contact">Կոնտակտային տվյալներ</a></li>
			<li><a  href="/lookbook">lookbook</a></li>
			<li><a  href='/programs'>Հաղորդումներ</a></li>
			<li><a  href='/dashbord_text'>Գլխավոր էջի տեքստեր</a></li>
			<li><a  href='/about'>Մեր մասին</a></li>
			<li><a  href='/slide'>Սլայդ</a></li>
		</ul>
	</div>
	
	<div id="teamcotegory" class="col-md-10">
	  <div >
	  	<h3>{{$teamcotgory->name_en}}</h3>
	  	<h3>{{$teamcotgory->name_ru}}</h3>
	  	<h3>{{$teamcotgory->name_am}}</h3>
	  </div>
	<team-in-cotegory v-bind:teams="teamscotegorydata.team"></team-in-cotegory>
	</div>
</div>
@endsection
@section('script')
<script src="{{asset('js/TeamCotegory_one.js')}}"></script>
@endsection

