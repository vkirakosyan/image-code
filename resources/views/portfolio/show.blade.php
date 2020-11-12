@extends('layouts.app')
<script >
	Window.portfolio=JSON.parse('{!! addcslashes(json_encode($portfolio),"'")!!}');
</script>
@section('content')

<div class="container-fluid adminbody">
		<div class="row">
			<div class="tabs-left tabbable col-md-2">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#team">Աշխատակից</a></li>
					<li><a data-toggle="tab" href="#addportfolio">Ավելացնել աշխատանքներ</a></li>
					<li><a  href="/team">Բոլոր աշխատակիցները</a></li>
					<li ><a  href="/training">Բոլոր դասընթացները</a></li>
					<li><a  href="/photosesia">Ֆոտոսեսիա</a></li>
					<li><a  href="/contact">Կոնտակտային տվյալներ</a></li>
					<li><a  href="/lookbook">lookbook</a></li>
					<li><a  href='/programs'>Հաղորդումներ</a></li>
					<li><a  href='/events'>Միջոցառումներ</a></li>
					<li><a  href='/dashbord_text'>Գլխավոր էջի տեքստեր</a></li>
					<li><a  href='/about'>Մեր մասին</a></li>
					<li><a  href='/slide'>Սլայդ</a></li>
				</ul>
			</div>

      <div class="col-md-10">
				<div class="tab-content container">
					<div id="team" class="tab-pane fade in active">
							<h3>Աշխատակիցներ`</h3>
							<teamsone v-bind:team="team"></teamsone>
					</div>
					<div id="addportfolio" class="tab-pane fade">
					<h3>Ավելացնել աշխատանքներ</h3>
						<form action="/portfolio" name="form" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="image">Լուսանկար</label>
								<input type="file" class="form-control" id="image"  name="image[]" multiple required>
							</div>
							<input type="hidden" name="team" v-bind:value="team.id">
							{{ csrf_field() }}
							<button type="submit" class="btn btn-default">Ավելացնել</button>
						</form>
					</div>
				</div>
		
      </div>
    </div>
</div>

@endsection
@section('script')
	<script  src="{{asset('js/portfolio.js')}}"></script>
@endsection