@extends('layouts.app')
@section('content')

<div id='photos' class="adminbody">

		<div class="tabs-left tabbable col-md-2">
			<ul class="nav nav-tabs ">
				<li><a href="/team">Բոլոր աշխատակիցները</a></li>
				<li class="active"><a href="/photosesia">Ֆոտոսեսիա</a></li>
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
			  
	  <div id="edit" class="tab-pane fade in active col-md-10" >
	    <h3>Ուղղել նկարի նկարագրությունը</h3>
	    <form action="/photosesia/{{$photo->id}}" method="post" enctype="multipart/form-data">
	    	<input name="_method" type="hidden" value="PUT">
		    <div class="form-group">
		      <label for="name_en">Անուն անգլերեն</label>
		      <input type="text" class="form-control" id="name_en" placeholder="Անուն" name="name_en" required value="{{$photo->name_en}}">
		      <label for="name_ru">Անուն ռուսերեն</label>
		      <input type="text" class="form-control" id="name_ru" placeholder="Անուն" name="name_ru" required value="{{$photo->name_ru}}">
		      <label for="name_am">Անուն հայերեն</label>
		      <input type="text" class="form-control" id="name_am" placeholder="Անուն" name="name_am" required value="{{$photo->name_am}}">
		    </div>
		     <div class="form-group">
		      <label for="description_en">Բնութագիր անգլերեն</label>
		      <textarea class="form-control" id="description_en" placeholder="Աշխատանքաին բնութագիր" required name="description_en">{{$photo->description_en}}</textarea>
		      <label for="description_ru">Բնութագիր ռուսերեն</label>
		      <textarea class="form-control" id="description_ru" placeholder="Աշխատանքաին բնութագիր" required name="description_ru">{{$photo->description_ru}}</textarea>
		      <label for="description_am">Բնութագիր հայերեն</label>
		      <textarea class="form-control" id="description_am" placeholder="Աշխատանքաին բնութագիր" required name="description_am">{{$photo->description_am}}</textarea>
		    </div>
		    {{ csrf_field() }}
		    <button type="submit" class="btn btn-default">Ավելացնել</button>
		  </form>
	  </div>
	</div>
@endsection
@section('script')
	<script  src="{{asset('js/photosesia.js')}}"></script>
@endsection