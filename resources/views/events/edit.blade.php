@extends('layouts.app')
@section('content')

<div id='events'>
	<div class="tabs-left tabbable col-md-2">
		<ul class="nav nav-tabs adminbody">
			<li><a  href="/events">Բոլոր միջոցառումները</a></li>
			<li><a  href="/team">Բոլոր աշխատակիցները</a></li>
			<li><a  href="/training">Բոլոր դասընթացները</a></li>
			<li><a  href="/servises">Ծառայություններ </a></li>
			<li><a  href="/contact">Կոնտակտային տվյալներ</a></li>
			<li><a  href="/lookbook">lookbook</a></li>
			<li><a  href="/programs">Հաղորդումներ</a></li>
			<li><a  href='/about'>Մեր մասին</a></li>
			<li><a  href='/slide'>Սլայդ</a></li>
		</ul>
	</div>

	<div class="tab-content col-md-10">
	  	
	  <div  class="container" >
	    <h3>Ուղղել միջոցառումը</h3>
	    <form action="/events/{{$event->id}}" method="post" enctype="multipart/form-data">
	    	<input name="_method" type="hidden" value="PUT">
		    <div class="form-group">
		       <label for="name_en">Անուն անգլերեն</label>
		       <input type="text" class="form-control" id="name_en"  name="name_en" required value="{{$event->name_en}}">
		       <label for="name_ru">Անուն ռուսերեն</label>
		       <input type="text" class="form-control" id="name_ru"  name="name_ru" required value="{{$event->name_ru}}">
		       <label for="name_am">Անուն հայերեն</label>
		       <input type="text" class="form-control" id="name_am"  name="name_am" required value="{{$event->name_am}}">
		    </div>
		     <div class="form-group">
		        <label for="description_en">Բնութագիր անգլերեն</label>
		        <textarea class="form-control" id="description_en"  name="description_en" required>{{$event->description_en}}</textarea>
		        <label for="description_ru">Բնութագիր ռուսերեն</label>
		        <textarea class="form-control" id="description_ru"  name="description_ru" required>{{$event->description_ru}}</textarea>
		        <label for="description_am">Բնութագիր հայերեն</label>
		        <textarea class="form-control" id="description_am"  name="description_am" required>{{$event->description_am}}</textarea>
		    </div>
		    <div class="form-group">
		        <label for="previous">Նախապես զգուշացնել</label>
		        <input type="checkbox" id="previous" name="previous" v-model="previousevents" >
		    </div>
		    <div class="form-group" v-bind:class="{hide: previousevents}">
		        <label for="url">Youtube հասցե</label>
		        <input type="text" class="form-control" id="url"  name="url" >
		    </div>
		    <div class="form-group" v-bind:class="{hide: !previousevents}">
		        <label for="image">Մուտքագրել ժամանակավոր նկար</label>
		        <input type="file" class="form-control" id="image"  name="image" >
		    </div>
		    {{ csrf_field() }}
		    <button type="submit" class="btn btn-default">Ավելացնել</button>
		  </form>
	  </div>
	</div>
</div>
@endsection
@section('script')
	<script  src="{{asset('js/editevents.js')}}"></script>
@endsection