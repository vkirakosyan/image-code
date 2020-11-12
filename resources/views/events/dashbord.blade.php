@extends('layouts.app')
<script >
	Window.eventsdata=JSON.parse('{!! addcslashes(json_encode($events),"'")!!}');
	Window.eventsprevious=JSON.parse('{!! addcslashes(json_encode($previousdata),"'")!!}');
</script>
@section('content')

<div id='events'>
<div class="tabs-left tabbable col-md-2">
	<ul class="nav nav-tabs adminbody">
		<li><a href="/team">Բոլոր աշխատակիցները</a></li>
		<li><a  href="/photosesia">Ֆոտոսեսիա</a></li>
		<li><a  href="/training">Դասընթացներ</a></li>
		<li><a  href="/servises">Ծառայություններ </a></li>
		<li><a  href="/contact">Կոնտակտային տվյալներ</a></li>
		<li><a  href="/lookbook">lookbook</a></li>
		<li><a  href='/programs'>Հաղորդումներ</a></li>
		<li class="active">
			<a href='/events'>Միջոցառումներ</a>
			<ul>
				<li class="active"><a data-toggle="tab" href="#allevents">Բոլոր միջոցառումները</a></li>
				<li><a data-toggle="tab" href="#addevents"> Ավելացնել միջոցառում</a></li>
			</ul>
		</li>
		<li><a  href='/dashbord_text'>Գլխավոր էջի տեքստեր</a></li>
		<li><a  href='/about'>Մեր մասին</a></li>
		<li><a  href='/slide'>Սլայդ</a></li>
	</ul>
</div>
  

	<div class="tab-content col-md-10">
	  	<div id="allevents" class="tab-pane fade in active">
		   <ul class="nav nav-tabs">
			   <li class="active"><a data-toggle="tab" href="#allevent">Բոլոր միջոցառումները</a></li>
			   <li ><a data-toggle="tab" href="#allpreviousevents">Նախապես տեղեկացնել</a></li>
			</ul>
			<div class="tab-content">
				<div  id="allevent" class="tab-pane fade in active ">
					<events v-bind:eventsdata="eventsdata"></events>
				</div>
				<div  id="allpreviousevents" class="tab-pane fade ">
					<events  v-bind:eventsdata="eventsprevious"></events>
				</div>
			</div>

	  </div>
	  <div id="addevents" class="tab-pane fade" >
	    <h3>Ավելացնել միջոցառում</h3>
	    <form action="/events" method="post" enctype="multipart/form-data">
		    <div class="form-group">
		      	<label for="name_en">Անուն անգլերեն</label>
		      	<input type="text" class="form-control" id="name_en" placeholder="Անուն" name="name_en" required>
		      	<label for="name_ru">Անուն ռուսերեն</label>
		      	<input type="text" class="form-control" id="name_ru" placeholder="Անուն" name="name_ru" required>
		      	<label for="name_am">Անուն հայերեն</label>
		      	<input type="text" class="form-control" id="name_am" placeholder="Անուն" name="name_am" required>
		    </div>
		     <div class="form-group">
		      	<label for="description_en">Բնութագիր անգլերեն</label>
		      	<textarea class="form-control" id="description_en" placeholder="Բնութագիր" name="description_en" required></textarea>
		      	<label for="description_ru">Բնութագիր ռուսերեն</label>
		      	<textarea class="form-control" id="description_ru" placeholder="Բնութագիր" name="description_ru" required></textarea>
		      	<label for="description_am">Բնութագիր հայերեն</label>
		      	<textarea class="form-control" id="description_am" placeholder="Բնութագիր" name="description_am" required></textarea>
		    </div>
		    <div class="form-group">
		      <label for="previous">Նախապես զգուշացնել</label>
		      <input type="checkbox" id="previous" name="previous" v-model="previousevents">
		  </div>
		    <div class="form-group" v-bind:class="{hide: previousevents}">
		      <label for="url">Youtube հասցե</label>
		      <input type="text" class="form-control" id="url"  name="url" required>
		    </div>
		    <div class="form-group" v-bind:class="{hide: !previousevents}">
		      <label for="image">Մուտքագրել ժամանակավոր նկար</label>
		      <input type="file" class="form-control" id="image"  name="image" required>
		    </div>
		    {{ csrf_field() }}
		    <button type="submit" class="btn btn-default">Ավելացնել</button>
		  </form>
	  </div>
	</div>
</div>
@endsection
@section('script')
	<script  src="{{asset('js/events.js')}}"></script>
@endsection