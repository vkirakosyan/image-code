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
	    <h3>Ուղղել ալբոմի նկարագրությունը</h3>
	    <form action="/albome/{{$albom->id}}" method="post" enctype="multipart/form-data">
	    	<input name="_method" type="hidden" value="PUT">
		    <div class="form-group">
		      <label for="name_en">Անուն անգլերեն</label>
		      <input type="text" class="form-control" id="name_en" required name="name_en" value="{{$albom->name_en}}">
		      <label for="name_ru">Անուն ռուսերեն</label>
		      <input type="text" class="form-control" id="name_ru" required name="name_ru" value="{{$albom->name_ru}}">
		      <label for="name_am">Անուն հայերեն</label>
		      <input type="text" class="form-control" id="name_am" required name="name_am" value="{{$albom->name_am}}">
		    </div>
		    <div class="form-group">
		    	<label for="changImg">Ավելացնել լուսանկար</label>
		    	<input type="checkbox"  id="changImg" v-model="editAlbom">
		    </div>
		     	<div class="form-group" v-show="editAlbom">
					<label for="image">Լուսանկար</label>
					<input type="file" class="form-control" id="image"  name="image">
				</div>
				<img src="/img/uploads/{{$albom->img}}" class="img-thumbnail" alt="Cinque Terre" width="304" height="236" v-show="!editAlbom"> 
		    {{ csrf_field() }}
		    <button type="submit" class="btn btn-default">Ավելացնել</button>
		  </form>
	  </div>
	</div>
@endsection
@section('script')
	<script  src="{{asset('js/photosesia.js')}}"></script>
@endsection