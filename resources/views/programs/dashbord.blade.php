@extends('layouts.app')
<script >
	Window.video=JSON.parse('{!! addcslashes(json_encode($videos),"'")!!}');
</script>
@section('content')

<div id='programs' class="adminbody row">
		<div class="tabs-left tabbable col-md-2">
			<ul class="nav nav-tabs">
				<li><a href="/team">Բոլոր աշխատակիցները</a></li>
				<li><a  href="/photosesia">Ֆոտոսեսիա</a></li>
				<li><a  href="/training">Դասընթացներ</a></li>
				<li><a  href="/servises">Ծառայություններ </a></li>
				<li><a  href="/contact">Կոնտակտային տվյալներ</a></li>
				<li><a  href="/lookbook">lookbook</a></li>
				<li class="active">
					<a href='/programs'>Հաղորդումներ</a>
					<ul>
						<li class="active"><a data-toggle="tab" href="#allprograms">Հաղորդումներ</a></li>
						<li><a data-toggle="tab" href="#addprograms">Ավելացնել նոր հաղորդում</a></li>
					</ul>
				</li>
				<li><a  href='/events'>Միջոցառումներ</a></li>
				<li><a  href='/dashbord_text'>Գլխավոր էջի տեքստեր</a></li>
				<li><a  href='/about'>Մեր մասին</a></li>
				<li><a  href='/slide'>Սլայդ</a></li>
			</ul>
		</div>
   
	<div class="tab-content col-md-10">
	  	<div id="allprograms" class="tab-pane fade in active">
		    <h3>Մեր հաղորդումները</h3>
			<programs v-bind:video="video"></programs>
	  </div>
	  <div id="addprograms" class="tab-pane fade" >
	    <h3>Ավելացնել հաղորդում</h3>
	    <form action="/programs" method="post" enctype="multipart/form-data">
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
		      <label for="url">Youtube հասցեն</label>
		      <input type="text" class="form-control" id="url"  name="url" required>
		    </div>
		    {{ csrf_field() }}
		    <button type="submit" class="btn btn-default">Ավելացնել</button>
		  </form>
	  </div>
	</div>
</div>
@endsection
@section('script')
	<script  src="{{asset('js/programs.js')}}"></script>
@endsection