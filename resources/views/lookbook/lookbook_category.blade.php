@extends('layouts.app')
<script >
	Window.albom=JSON.parse('{!! addcslashes(json_encode($lookbook),"'")!!}');
	console.log(Window.albom);
</script>
@section('content')

<div class="container-fluid adminbody">
	<div class="row">
		<div class="tabs-left tabbable col-md-2">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#alllookbook_cotegory">lookbook ալբոմ</a></li>
				<li><a  href="/training">Բոլոր դասընթացները</a></li>
				<li><a  href="/team">Բոլոր աշխատակիցները</a></li>
				<li><a  href="/photosesia">Ֆոտոսեսիա</a></li>
				<li><a  href="/servises">Ծառայություններ </a></li>
				<li><a  href="/contact">Կոնտակտային տվյալներ</a></li>
				<li><a  href='/lookbook'>lookbook</a></li>
				<li><a  href='/programs'>Հաղորդումներ</a></li>
				<li><a  href='/events'>Միջոցառումներ</a></li>
				<li><a  href='/dashbord_text'>Գլխավոր էջի տեքստեր</a></li>
				<li><a  href='/about'>Մեր մասին</a></li>
				<li><a  href='/slide'>Սլայդ</a></li>
			</ul>
		</div>

		<div class="col-md-10">  
			<div class="tab-content" id="lookbookdiv">
				<div id="alllookbook_cotegory" class="tab-pane fade in active ">
					<albom-img :albomes="albom" 
								:edit_url="'/lookbook_category/'" 
								:delete_url="'/lookbook_category/'" 
								:photo_edit_url="'/lookbook_img/'">
					</albom-img>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
	<script  src="{{asset('js/lookbook_category.js')}}"></script>
@endsection