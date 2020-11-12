@extends('layouts.user')
@section('title','HOME')

@section('style')
	@parent
	<link rel="stylesheet" type="text/css" href="/css/dashbord.css">
@endsection
@section('script_head')
	@parent
	<script >
		Window.teamdata=JSON.parse('{!! addcslashes(json_encode($team),"'")!!}');
	</script>
@endsection

@section('content')
	@parent
	<div id="portfolio"  class="container-fluid">
		<div id="slidebar"  class="container-fluid">
			<h3 class="display_position">@{{lang.portfolio}}</h3>
		</div>
		<div class="cards  container" >
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<img class="img-rounded team_portfolio" :src="'/img/uploads/'+team.img" >
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div >
			            <h5 class="card-title">@{{team.name}}</h5>
			            <p class="card-text">@{{team.characteristics}}</p>
			         </div>
				</div>
			</div>
          
          
        </div>
		<portfolio-img  :images="team.portfolio"></portfolio-img>
	</div>

@endsection

@section('footer')
	@parent
@endsection

@section('script')
	@parent
	<script src="{{asset('/js/UserPortfolio.js')}}"></script>
@endsection
