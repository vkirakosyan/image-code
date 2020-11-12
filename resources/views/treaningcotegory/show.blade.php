@extends('layouts.app')
<script >
	Window.trainingcategorydata=JSON.parse('{!! addcslashes(json_encode($treaningcotegory),"'")!!}');
</script>
@section('content')
<div class="container-fluid adminbody">
	<div class="row">
		<div class="tabs-left tabbable col-md-2">
			<ul class="nav nav-tabs">
			 	<li><a href='/team'>Բոլոր աշխատակիցները</a></li>
				<li><a  href="/photosesia">Ֆոտոսեսիա</a></li>
				<li class="active"><a  href="/training">Դասընթացներ</a></li>
				<li><a  href="/servises">Ծառայություններ </a></li>
				<li><a  href="/contact">Կոնտակտային տվյալներ</a></li>
				<li><a  href="/lookbook">lookbook</a></li>
				<li><a  href='/programs'>Հաղորդումներ</a></li>
				<li><a  href='/dashbord_text'>Գլխավոր էջի տեքստեր</a></li>
				<li><a  href='/about'>Մեր մասին</a></li>
				<li><a  href='/slide'>Սլայդ</a></li>
			</ul>
		</div>
		<div id="treaningcotegory" class="col-md-10">
			<div >
			  	<h3>{{$treaningcotegory->name_en}}</h3>
			  	<h3>{{$treaningcotegory->name_ru}}</h3>
			  	<h3>{{$treaningcotegory->name_am}}</h3>
			</div>
			<treaning-in-cotegory v-bind:trainings="treanings.training"></treaning-in-cotegory>
		</div>
	</div>
</div>
@endsection
@section('script')
<script src="{{asset('js/TreaningCotegory_one.js')}}"></script>
@endsection

