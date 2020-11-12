@extends('layouts.app')

@section('content')
<div class="row">
	<div class="tabs-left tabbable col-md-2">
		<ul class="nav nav-tabs">
			<li><a href="/team">Բոլոր աշխատակիցները</a></li>
			<li><a  href="/photosesia">Ֆոտոսեսիա</a></li>
			<li class="active"><a  href="/training">Դասընթացներ</a></li>
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
	    <form action="/training/{{$training->id}}" method="post" enctype="multipart/form-data" id="edit">
	    	<input name="_method" type="hidden" value="PUT">
		    <div class="form-group">
		      <label for="name_en">Անուն անգլերեն</label>
		      <input type="text" class="form-control" id="name_en"  name="name_en" value="{{$training->name_en}}" required>
		      <label for="name_ru">Անուն ռուսերեն</label>
		      <input type="text" class="form-control" id="name_ru"  name="name_ru" value="{{$training->name_ru}}" required>
		      <label for="name_am">Անուն հայերեն</label>
		      <input type="text" class="form-control" id="name_am"  name="name_am" value="{{$training->name_am}}" required>
		    </div>
		    <div class="form-group">
		      <label for="specificity_en">Մասնագիտություն անգլերեն</label>
		      <input type="text" class="form-control" id="specificity_en"  name="specificity_en" value="{{$training->specificity_en}}" required>
		      <label for="specificity_ru">Մասնագիտություն ռուսերեն</label>
		      <input type="text" class="form-control" id="specificity_ru"  name="specificity_ru" value="{{$training->specificity_ru}}" required>
		      <label for="specificity_am">Մասնագիտություն հայերեն</label>
		      <input type="text" class="form-control" id="specificity_am"  name="specificity_am" value="{{$training->specificity_am}}" required>
		    </div>
		     <div class="form-group">
		      <label for="description_en">Դասընթացի բնութագիր անգլերեն</label>
		      <textarea class="form-control" id="description_en"  name="description_en" required>{{$training->description_en}}</textarea>
		      <label for="description_ru">Դասընթացի բնութագիր ռուսերեն</label>
		      <textarea class="form-control" id="description_ru"  name="description_ru" required>{{$training->description_ru}}</textarea>
		      <label for="description_am">Դասընթացի բնութագիր հայերեն</label>
		      <textarea class="form-control" id="description_am"  name="description_am" required>{{$training->description_am}}</textarea>
		    </div>
		    <div v-bind:class="{hide: !editimagecontrol}">
			    <img class="imgedit" src="{{asset('img/uploads/'.$training->img)}}" >
			    <a v-on:click="editimage" class=" btn btn-primary buttonedit" >Փոխել նկարը</a>
			</div>
		    <div class="form-group " v-bind:class="{hide: editimagecontrol}">
		      <label for="image">Լուսանկար</label>
		      <input type="file" class="form-control" id="image"  name="image">
		    </div>
		    {{ csrf_field() }}
		    <button type="submit" class="btn btn-default">Ավելացնել</button>
		</form>
	</div>	
@endsection
@section('script')
<script src="{{asset('js/trainingedit.js')}}"></script>
@endsection