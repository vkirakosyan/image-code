@extends('layouts.app')
@section('content')

<div id='photos' class="adminbody">
	<div class="tabs-left tabbable col-md-2">
		<ul class="nav nav-tabs">
			<li><a href="/team">Բոլոր աշխատակիցները</a></li>
			<li><a  href="/photosesia">Ֆոտոսեսիա</a></li>
			<li><a  href="/training">Դասընթացներ</a></li>
			<li class="active"><a href="/servises">Ծառայություններ</a></li>
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
	    <h3>Ուղղել ծառայության նկարագրությունը</h3>
	    <form action="/servises/{{$servises->id}}" method="post" enctype="multipart/form-data">
	    	<input name="_method" type="hidden" value="PUT">
	    	<div class="form-group">
	    		<select name="cotegory">
	    			@foreach($categorys as $category)
	    				<option value="{{$category->id}}"  {{($category->id==$servises->category_id)?'selected':''}}>{{$category->name}}</option>
	    			@endforeach
	    		</select>
	    	</div>
		<div class="form-group">
		    <label for="name_en">Անուն անգլերեն</label>
		    <input type="text" class="form-control" id="name_en"  name="name_en" value="{{$servises->name_en}}" required>
		    <label for="name_ru">Անուն ռուսերեն</label>
		    <input type="text" class="form-control" id="name_ru"  name="name_ru" value="{{$servises->name_ru}}" required>
		    <label for="name_am">Անուն հայերեն</label>
			<input type="text" class="form-control" id="name_am"  name="name_am" value="{{$servises->name_am}}" required>
		</div>
		<div class="form-group">
	      	<label for="price">Գին</label>
	     	 <select name="valiut" >
	        	<option value="USA" {{ ($servises->valiut=='USA') ? 'selected' : false}} >USA</option>
	        	<option value="₽" {{ ($servises->valiut=='₽') ? 'selected' : false}} >₽</option>
	        	<option value="֏" {{ ($servises->valiut=='֏') ? 'selected' : false}}>֏</option>
	        </select>
	     	<input type="text" class="form-control" id="price"  name="price" value="{{$servises->price}}">
	    </div>
		    {{ csrf_field() }}
		    <button type="submit" class="btn btn-default">Ավելացնել</button>
		  </form>
	  </div>
	</div>
@endsection
@section('script')
	<script  src="{{asset('js/editservice.js')}}"></script>
@endsection