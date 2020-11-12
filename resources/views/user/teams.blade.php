@extends('layouts.user')
<?php $lang = Lang::get('navbar');?>
@section('title','HOME')

@section('style')
	@parent
	<link rel="stylesheet" type="text/css" href="/css/dashbord.css">
@endsection
@section('script_head')
	@parent
	<script >
		Window.teamsData=JSON.parse('{!! addcslashes(json_encode($teams),"'") !!}');
	</script>
@endsection

@section('content')
	@parent
	<div id="slidebar"  class="container-fluid">
		</div>
	<div id="teams"  class="container">
		<h2>{{$lang['tean_text1']}}</h2>
		<h3 class="section-subtitle">{{$lang['tean_text2']}}</h3>
		<div >
			<p>
				{{$lang['tean_text3']}}
			</p>
		</div>
		<div v-if="Array.isArray(teams)" >
			<ul class="nav nav-tabs container">
				  <li 	v-for="(team, index) in teams"
				  		:class="{'in active':(index==0)}">
				  		<a data-toggle="tab" :href="'#teamscategory'+team.id">@{{team.name}}</a></li>
			</ul>
			<div class="tab-content ">
				  	<div 	:id="'teamscategory'+team.id" 
				  			v-for="(team, index) in teams" 
				  			class="tab-pane fade  container" 
				  			:class="{'in active':(index==0)}">
						<teams-block 	:teams="team.team"
										:lang="lang"></teams-block>
				  	</div>
			</div>
		</div>
		<div v-else>
			<teams-block :teams="teams.team"
			:lang="lang" ></teams-block>
		</div>
		
	</div>

@endsection

@section('footer')
	@parent
@endsection

@section('script')
	@parent
	<script src="{{asset('/js/UserTeams.js')}}"></script>
@endsection
