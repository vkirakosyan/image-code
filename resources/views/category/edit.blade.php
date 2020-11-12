@extends('layouts.app')
@section('content')
<div class="tabs-left tabbable col-md-2">
	<ul class="nav nav-tabs">
		<li><a href="/team">Բոլոր աշխատակիցները</a></li>
		<li><a  href="/photosesia">Ֆոտոսեսիա</a></li>
		<li><a  href="/training">Դասընթացներ</a></li>
		<li class="active"><a  href="/servises">Ծառայություններ </a></li>
		<li><a  href="/contact">Կոնտակտային տվյալներ</a></li>
		<li><a  href="/lookbook">lookbook</a></li>
		<li><a  href='/programs'>Հաղորդումներ</a></li>
		<li><a  href='/events'>Միջոցառումներ</a></li>
		<li><a  href='/dashbord_text'>Գլխավոր էջի տեքստեր</a></li>
		<li><a  href='/about'>Մեր մասին</a></li>
		<li><a  href='/slide'>Սլայդ</a></li>
	</ul>
</div>
<div id='cotegory' class="adminbody col-md-10">
   	  
	  <div id="editcotegory">
	    <form action="/cotegory/{{$category->id}}" method="post" >
	    	<input name="_method" type="hidden" value="PUT">
	    	<div class="form-group">
			    <label for="name_en">Անուն անգլերեն</label>
			    <input type="text" class="form-control" id="name_en"  name="name_en" value="{{$category->name_en}}" required>
			    <label for="name_ru">Անուն ռուսերեն</label>
			    <input type="text" class="form-control" id="name_ru"  name="name_ru" value="{{$category->name_ru}}" required>
			    <label for="name_am">Անուն հայերեն</label>
			    <input type="text" class="form-control" id="name_am"  name="name_am" value="{{$category->name_am}}" required>
		    </div>
		    {{ csrf_field() }}
		    <button type="submit" class="btn btn-default">Ուղղել</button>
		  </form>
	  </div>
	</div>
@endsection
@section('script')

@endsection