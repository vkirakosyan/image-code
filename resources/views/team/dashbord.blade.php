@extends('layouts.app')
<script >
	Window.teamscotegorydata=JSON.parse('{!! addcslashes(json_encode($teamscotegorydata),"'")!!}');
	Window.teamscotegory=JSON.parse('{!! addcslashes(json_encode($teamscotegory),"'")!!}');
</script>
@section('content')

<div class="container-fluid adminbody">
	<div id="teambody" class="row">
	<div class="tabs-left tabbable col-md-2">
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="/team">Բոլոր աշխատակիցները</a>
				<ul>
					<li class="active"><a data-toggle="tab" href="#teamss">Մասնագիտություններ</a></li>
					<li><a data-toggle="tab" href="#addteam">Ավելացնել աշխատակից</a></li>	
				</ul>
			</li>
			<li><a  href="/photosesia">Ֆոտոսեսիա</a></li>
			<li><a  href="/training">Դասընթացներ</a></li>
			<li><a  href="/servises">Ծառայություններ </a></li>
			<li><a  href="/contact">Կոնտակտային տվյալներ</a></li>
			<li><a  href="/lookbook">lookbook</a></li>
			<li><a  href='/programs'>Հաղորդումներ</a></li>
			<li><a  href='/events'>Միջոցառումներ</a></li>
			<li><a  href='/dashbord_text'>Գլխավոր էջի տեքստեր</a></li>
			<li><a  href='/about'>Մեր մասին</a></li>
			<li><a  href='/slide'>Սլայդ</a></li>
		</ul>
	</div>
        <div id="navbarcontent" class="col-md-10">
			<div class="tab-content">
			  	<div id="teamss" class="tab-pane fade in active">
			  		<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#teamscotegorys">Մասնագիտություններ</a></li>
						<li><a data-toggle="tab" href="#addteamscotegory">Ավելացնել մասնագիտություն</a></li>
					</ul>

					<div class="tab-content">
			  			<div id="teamscotegorys" class="tab-pane fade in active">
							 <h3>Մասնագիտություններ</h3>
							<team-cotegory v-bind:cotegoryteam="teamscotegorydata"></team-cotegory>
			  			</div>
			  			<div id="addteamscotegory" class="tab-pane fade">
							 <form action="/team_category" method="post" >
								<div class="form-group">
								    <label for="name_en">Անուն անգլերեն</label>
								    <input type="text" class="form-control" id="name_en" placeholder="Անուն" name="name_en" required>
								    <label for="name_ru">Անուն ռուսերեն</label>
								    <input type="text" class="form-control" id="name_ru" placeholder="Անուն" name="name_ru" required>
								    <label for="name_am">Անուն հայերեն</label>
								    <input type="text" class="form-control" id="name_am" placeholder="Անուն" name="name_am" required>
							    </div>
							    {{ csrf_field() }}
							    <button type="submit" class="btn btn-default">Ավելացնել</button>
							 </form>
			  			</div>
					</div>
				   
					
			  </div>
			  <div id="addteam" class="tab-pane fade" >
			    <h3>Ավելացնել աշխատակից</h3>
			    <form action="/team" method="post" enctype="multipart/form-data">
			    	<div class="form-group">
			    		<select name="cotegory" required>
								    	<option v-for="(cotegory,index ) in teams_c" 
								    			v-bind:key="index"
								    			v-bind:value="cotegory.id">
								    			@{{cotegory.name}}
								    					</option>
						</select>
			    	</div>
				    <div class="form-group">
				      <label for="name_en">Անուն անգլերեն</label>
				      <input type="text" class="form-control" id="name_en" placeholder="Անուն" name="name_en" required>
				      <label for="name_ru">Անուն ռուսերեն</label>
				      <input type="text" class="form-control" id="name_ru" placeholder="Անուն" name="name_ru" required>
				      <label for="name_am">Անուն հայերեն</label>
				      <input type="text" class="form-control" id="name_am" placeholder="Անուն" name="name_am" required>
				    </div>
				    <div class="form-group">
				      <label for="profession_en">Մասնագիտություն անգլերեն</label>
				      <input type="text" class="form-control" id="profession_en" placeholder="Մասնագիտություն" name="profession_en" required>
				      <label for="profession_ru">Մասնագիտություն ռուսերեն</label>
				      <input type="text" class="form-control" id="profession_ru" placeholder="Մասնագիտություն" name="profession_ru" required>
				      <label for="profession_am">Մասնագիտություն հայերեն</label>
				      <input type="text" class="form-control" id="profession_am" placeholder="Մասնագիտություն" name="profession_am" required>
				    </div>
				     <div class="form-group">
				      <label for="characteristics_en">Աշխատանքային բնութագիր անգլերեն</label>
				      <textarea class="form-control" id="characteristics_en" placeholder="Աշխատանքային բնութագիր" required name="characteristics_en"></textarea>
				      <label for="characteristics_ru">Աշխատանքային բնութագիր ռուսերեն</label>
				      <textarea class="form-control" id="characteristics_ru" placeholder="Աշխատանքային բնութագիր" required name="characteristics_ru"></textarea>
				      <label for="characteristics_am">Աշխատանքային բնութագիր հայերեն</label>
				      <textarea class="form-control" id="characteristics_am" placeholder="Աշխատանքային բնութագիր" required name="characteristics_am"></textarea>
				    </div>
				    <div class="form-group">
				      <label for="image">Լուսանկար</label>
				      <input type="file" class="form-control" id="image"  name="image"  required>
				    </div>
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
	<script  src="{{asset('js/teams.js')}}"></script>
@endsection