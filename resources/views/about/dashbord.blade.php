@extends('layouts.app')

@section('content')
<script >
	Window.about=JSON.parse('{!! addcslashes(json_encode($about),"'")!!} ');
</script>
<div class="container-fluid adminbody">
	<div class="row">
		<div class="tabs-left tabbable col-md-2">
			<ul class="nav nav-tabs">
				<li><a href="/team">Բոլոր աշխատակիցները</a></li>
				<li><a  href="/photosesia">Ֆոտոսեսիա</a></li>
				<li><a  href="/training">Դասընթացներ</a></li>
				<li><a  href="/servises">Ծառայություններ </a></li>
				<li><a  href="/contact">Կոնտակտային տվյալներ</a></li>
				<li><a  href="/lookbook">lookbook</a></li>
				<li><a  href='/programs'>Հաղորդումներ</a></li>
				<li><a  href='/events'>Միջոցառումներ</a></li>
				<li><a  href='/dashbord_text'>Գլխավոր էջի տեքստեր</a></li>
				<li class="active">
					<a href='/about'>Մեր մասին</a>
					<ul>
						<li class="active"><a data-toggle="tab" href="#aboutdiv">Մեր մասին</a></li>
						<?php
							if (!isset($about)) {
								echo '<li><a data-toggle="tab" href="#addcontact">Ավելացնել տվյալներ</a></li>';

							}
						?>
					</ul>
				</li>
				<li><a  href='/slide'>Սլայդ</a></li>
			</ul>
		</div>
           
		
			<div class="tab-content col-md-10">
			  	<div id="aboutdiv" class="tab-pane fade in active">
				    <h3>Մեր մասին</h3>
				    @if(isset($about))
				    <h4>{{$about->name_en}}</h4>
				    <h4>{{$about->name_ru}}</h4>
				    <h4>{{$about->name_am}}</h4>
				    <p>
				    	{{$about->description_en}}
				    </p>
				    <p>
				    	{{$about->description_ru}}
				    </p>
				    <p>
				    	{{$about->description_am}}
				    </p>
					<a href="/about/{{$about->id}}/edit">Ուղղել</a>
					@endif
			  	</div>
			  <div  id="addcontact" class="tab-pane fade container" >
			    <h3>Ավելացնել տվյալներ</h3>
			    <form action="/about" method="post" enctype="multipart/form-data">
				    <div class="form-group">
				      <label for="name_en">Հասցե անգլերեն</label>
				      <input type="text" class="form-control" id="name_en" placeholder="Հասցե" name="name_en">
				      <label for="name_ru">Հասցե ռուսերեն</label>
				      <input type="text" class="form-control" id="name_ru" placeholder="Հասցե" name="name_ru">
				      <label for="name_am">Հասցե հայերեն</label>
				      <input type="text" class="form-control" id="name_am" placeholder="Հասցե" name="name_am">
				    </div>
				    <div class="form-group">
				      <label for="description_en">Հասցե անգլերեն</label>
				      <textarea class="form-control" id="description_en" placeholder="Հասցե" name="description_en"></textarea>
				      <label for="description_ru">Հասցե ռուսերեն</label>
				      <textarea class="form-control" id="description_ru" placeholder="Հասցե" name="description_ru"></textarea>
				      <label for="description_am">Հասցե հայերեն</label>
				      <textarea class="form-control" id="description_am" placeholder="Հասցե" name="description_am"></textarea>
				    </div>
				    {{ csrf_field() }}
				    <button type="submit" class="btn btn-default">Ավելացնել</button>
				  </form>
			  </div>
			</div>
    </div>
</div>

@endsection
@section('script')
@endsection
