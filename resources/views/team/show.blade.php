@extends('layouts.app')
<script >
	Window.teams=JSON.parse('{!! addcslashes(json_encode($teams),"'")!!}');
</script>
@section('content')
<div class="container-fluid adminbody">
  <div class="tabs-left tabbable col-md-2">
	<ul class="nav nav-tabs">
		<li class=""><a href='/team'>Բոլոր աշխատակիցները</a></li>
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
	 
	<div class="panel panel-default col-lg-3 col-md-10">
	  <div class="panel-heading">
	  	<img src="{{asset('img/uploads/'.$teams->img)}}">
	  	<h3>{{$teams->name_en}}</h3>
	  	<h3>{{$teams->name_ru}}</h3>
	  	<h3>{{$teams->name_am}}</h3>
	  </div>
	 	 <div class="panel-body">
	  		<h4>{{$teams->profession_en}}</h4>
	  		<h4>{{$teams->profession_ru}}</h4>
	  		<h4>{{$teams->profession_am}}</h4>
	  	</div>
		<div class="panel-footer">
			<div class="row">
				<div id="portfolioimgs">
					<portfolioimg v-bind:team="team"></portfolioimg>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="{{asset('js/teams_one.js')}}"></script>
@endsection