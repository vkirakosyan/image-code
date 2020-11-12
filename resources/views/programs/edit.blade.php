@extends('layouts.app')

@section('content')

<div id='programs' class="adminbody">
	<div class="row">
		<div class="tabs-left tabbable col-md-2">
			<ul class="nav nav-tabs">
				<li><a href="/team">Բոլոր աշխատակիցները</a></li>
				<li><a  href="/photosesia">Ֆոտոսեսիա</a></li>
				<li><a  href="/training">Դասընթացներ</a></li>
				<li><a  href="/servises">Ծառայություններ </a></li>
				<li><a  href="/contact">Կոնտակտային տվյալներ</a></li>
				<li><a  href="/lookbook">lookbook</a></li>
				<li class="active"><a href='/programs'>Հաղորդումներ</a></li>
				<li><a  href='/events'>Միջոցառումներ</a></li>
				<li><a  href='/dashbord_text'>Գլխավոր էջի տեքստեր</a></li>
				<li><a  href='/about'>Մեր մասին</a></li>
				<li><a  href='/slide'>Սլայդ</a></li>
			</ul>
		</div>	  	
	  <div id="editvideo" class="col-md-10" >
	    <h3>Ավելացնել հաղորդում</h3>
	    <form action="/programs/{{$video->id}}" method="post" enctype="multipart/form-data">
	    	<input name="_method" type="hidden" value="PUT">
		    <div class="form-group">
		      <label for="name_en">Անուն անգլերեն</label>
		      <input type="text" class="form-control" id="name_en" placeholder="Անուն" name="name_en" required value="{{$video->name_en}}" >
		      <label for="name_ru">Անուն ռուսերեն</label>
		      <input type="text" class="form-control" id="name_ru" placeholder="Անուն" name="name_ru" required value="{{$video->name_ru}}" >
		      <label for="name_am">Անուն հայերեն</label>
		      <input type="text" class="form-control" id="name_am" placeholder="Անուն" name="name_am" required value="{{$video->name_am}}" >
		    </div>
		     <div class="form-group">
		      <label for="description_en">Բնութագիր անգլերեն</label>
		      <textarea class="form-control" id="description_en" placeholder="Բնութագիր" required name="description_en" required >{{$video->description_en}}</textarea>
		      <label for="description_ru">Բնութագիր ռուսերեն</label>
		      <textarea class="form-control" id="description_ru" placeholder="Բնութագիր" required name="description_ru"  >{{$video->description_ru}}</textarea>
		      <label for="description_am">Բնութագիր հայերեն</label>
		      <textarea class="form-control" id="description_am" placeholder="Բնութագիր" required name="description_am"  >{{$video->description_am}}</textarea>
		    </div>
		    <div class="form-group" v-bind:class="{hide: !isactiv}" >
		      <label for="url">Youtube հասցե</label>
		      <input type="text" class="form-control" id="url"  name="url">
		    </div>
		    <iframe width="420" height="315"  v-bind:class="{hide: isactiv}"
				src="https://www.youtube.com/embed/{{$video->url}}">
			</iframe>
			<a class="btn btn-default" v-on:click="loadvideo" v-bind:class="{hide: isactiv}" >Ներբեռնել նոր վիդեո</a>
		    {{ csrf_field() }}
		    <br>
		    <button type="submit" class="btn btn-default">Ավելացնել</button>
		    <br>
		  </form>
	  </div>
	</div>
</div>
@endsection
@section('script')
	<script  src="{{asset('js/editprograms.js')}}"></script>
@endsection