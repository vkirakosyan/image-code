@extends('layouts.app')

@section('content')

<div id='dashbord_text'>
	<div class="tabs-left tabbable col-md-2">
		<ul class="nav nav-tabs adminbody">
			<li class="active"><a href="/dashbordtext">Գլխավոր էջի տեքստեր</a></li>
			<li><a href="/team">Բոլոր աշխատակիցները</a></li>
			<li><a  href="/training">Բոլոր դասընթացները</a></li>
			<li><a  href="/servises">Ծառայություններ </a></li>
			<li><a  href="/contact">Կոնտակտային տվյալներ</a></li>
			<li><a  href="/photosesia">Ֆոտոսեսիա</a></li>
			<li><a  href="/lookbook">lookbook</a></li>
			<li><a  href="/programs">Հաղորդումներ</a></li>
			<li><a  href='/events'>Միջոցառումներ</a></li>
			<li><a  href='/about'>Մեր մասին</a></li>
			<li><a  href='/slide'>Սլայդ</a></li>
		</ul>
	</div>
   

	  	<div id="addtext" class="tab-pane fade in active col-md-10">
			<form action="/dashbord_text" method="post" >
				<div class="form-group">
				  	<label for="description_en">IMAGE CODE Beauty Salon-ի նկարագրություն անգլերեն</label>
				  	<textarea class="form-control" id="description_en"  name="description_en" required>{{$text[0]->description_en}}</textarea>
				  	<label for="description_ru">IMAGE CODE Beauty Salon-ի նկարագրություն ռուսերեն</label>
				  	<textarea class="form-control" id="description_ru"  name="description_ru" >{{$text[0]->description_ru}}</textarea>
				  	<label for="description_am">IMAGE CODE Beauty Salon-ի նկարագրություն հայերեն</label>
				  	<textarea class="form-control" id="description_am"  name="description_am" >{{$text[0]->description_am}}</textarea>
				</div>
				 <div class="form-group">
				 	<label for="elos_en">Էլոս֊ի տեքստ անգլերեն</label>
				  	<textarea class="form-control" id="elos_en"  name="elos_en" required>{{$text[0]->elos_en}}</textarea>
				  	<label for="elos_ru">Էլոս֊ի տեքստ ռուսերեն</label>
				  	<textarea class="form-control" id="elos_ru"  name="elos_ru" >{{$text[0]->elos_ru }}</textarea>
				  	<label for="elos_am">Էլոս֊ի տեքստ հայերեն</label>
				  	<textarea class="form-control" id="elos_am"  name="elos_am" >{{$text[0]->elos_am}}</textarea>
				</div>
				 <div class="form-group">
				  	<label for="training_en">Դասընթացների նկարագրություն անգլերեն</label>
				  	<textarea class="form-control" id="training_en"  name="training_en" required>{{$text[0]->training_en}}</textarea>
				  	<label for="training_ru">Դասընթացների նկարագրություն ռուսերեն</label>
				  	<textarea class="form-control" id="training_ru"  name="training_ru" >{{$text[0]->training_ru}}</textarea>
				  	<label for="training_am">Դասընթացների նկարագրություն հայերեն</label>
				  	<textarea class="form-control" id="training_am"  name="training_am" >{{$text[0]->training_am}}</textarea>
				</div>
				 <div class="form-group">
				  	<label for="footer_en">Վերջին տեքստը անգլերեն</label>
				  	<textarea class="form-control" id="footer_en"  name="footer_en" required>{{$text[0]->footer_en}}</textarea>
				  	<label for="footer_ru">Վերջին տեքստը ռուսերեն</label>
				  	<textarea class="form-control" id="footer_ru"  name="footer_ru" >{{$text[0]->footer_ru}}</textarea>
				  	<label for="footer_am">Վերջին տեքստը հայերեն</label>
				  	<textarea class="form-control" id="footer_am"  name="footer_am" >{{$text[0]->footer_am}}</textarea>
				</div>
				
				{{ csrf_field() }}
				<button type="submit" class="btn btn-default">Ավելացնել</button>
			</form>
		  
	</div>
</div>
@endsection
@section('script')
@endsection