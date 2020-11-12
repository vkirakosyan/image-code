@extends('layouts.app')
@section('content')
<div class="row">
	<div class="tabs-left tabbable col-md-2">
		<ul class="nav nav-tabs">
			<li class="active"><a href="/team">Բոլոր աշխատակիցները</a></li>
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
	<div class="col-md-10">
		<h3>Ավելացնել աշխատակից</h3>
	    <form action="/team/{{$team->id}}" method="post" enctype="multipart/form-data" id="edit">
	    	<input name="_method" type="hidden" value="PUT">
		    <div class="form-group">
		      <label for="name_en">Անուն անգլերեն</label>
		      <input type="text" class="form-control" id="name_en" placeholder="Անուն" name="name_en" value="{{$team->name_en}}" required>
		      <label for="name_ru">Անուն ռուսերեն</label>
		      <input type="text" class="form-control" id="name_ru" placeholder="Անուն" name="name_ru" value="{{$team->name_ru}}" required>
		      <label for="name_am">Անուն հայերեն</label>
		      <input type="text" class="form-control" id="name_am" placeholder="Անուն" name="name_am" value="{{$team->name_am}}" required>
		    </div>
		    <div class="form-group">
		      <label for="profession_en">Մասնագիտություն անգլերեն</label>
		      <input type="text" class="form-control" id="profession_en" placeholder="Մասնագիտություն" name="profession_en" value="{{$team->profession_en}}" required>
		      <label for="profession_ru">Մասնագիտություն ռուսերեն</label>
		      <input type="text" class="form-control" id="profession_ru" placeholder="Մասնագիտություն" name="profession_ru" value="{{$team->profession_ru}}" required>
		      <label for="profession_am">Մասնագիտություն հայերեն</label>
		      <input type="text" class="form-control" id="profession_am" placeholder="Մասնագիտություն" name="profession_am" value="{{$team->profession_am}}" required>
		    </div>
		    <div class="form-group">
		      <label for="characteristics_en">Աշխատանքաին բնութագիր անգլերեն</label>
		      <textarea class="form-control" id="characteristics_en" placeholder="Աշխատանքաին բնութագիր" name="characteristics_en" required>{{$team->characteristics_en}}</textarea>
		      <label for="characteristics_ru">Աշխատանքաին բնութագիր ռուսերեն</label>
		      <textarea class="form-control" id="characteristics_ru" placeholder="Աշխատանքաին բնութագիր" name="characteristics_ru" required>{{$team->characteristics_ru}}</textarea>
		      <label for="characteristics_am">Աշխատանքաին բնութագիր հայերեն</label>
		      <textarea class="form-control" id="characteristics_am" placeholder="Աշխատանքաին բնութագիր" name="characteristics_am" required>{{$team->characteristics_am}}</textarea>
		    </div>
		    <div class="form-group " v-bind:class="{hide: editimagecontrol}">
		      	<label for="image">Լուսանկար</label>
		      	<input type="file" class="form-control" id="image"  name="image">
		    </div>
		     <div v-bind:class="{hide: !editimagecontrol}" class="form-group">
			    <img class="imgedit" src="{{asset('img/uploads/'.$team->img)}}" >
			    <a v-on:click="editimage" class=" btn btn-primary buttonedit" >Փոխել նկարը</a>
			</div>
		    {{ csrf_field() }}
		    <button type="submit" class="btn btn-default">Ավելացնել</button>
	  </form>
	</div>
</div>
<script src="{{asset('js/editteam.js')}}"></script>
@endsection