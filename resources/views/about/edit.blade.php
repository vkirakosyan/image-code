@extends('layouts.app')

@section('content')

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
					<li class="active"><a  href='/about'>Մեր մասին</a></li>
					<li><a  href='/slide'>Սլայդ</a></li>
				</ul>
			</div>
			<div class="col-md-10"> 
					<div  id="addabout" class="tab-pane fade in active " >
						<h3>Թարմացնել </h3>
						<form action="/about/{{$about->id}}" method="post" >
						<input name="_method" type="hidden" value="PUT">
							<div class="form-group">
								<label for="name_en">Հասցե</label>
								<input type="text" class="form-control" id="name_en"  name="name_en" value="{{$about->name_en}}" required>
								<label for="name_ru">Հասցե</label>
								<input type="text" class="form-control" id="name_ru"  name="name_ru" value="{{$about->name_ru}}" required>
								<label for="name_am">Հասցե</label>
								<input type="text" class="form-control" id="name_am"  name="name_am" value="{{$about->name_am}}" required>
							</div>
							<div class="form-group">
									<label for="description_en">Հասցե անգլերեն</label>
									<textarea class="form-control" id="description_en" placeholder="Հասցե" name="description_en" required>{{$about->description_en}}</textarea>
									<label for="description_ru">Հասցե ռուսերեն</label>
									<textarea class="form-control" id="description_ru" placeholder="Հասցե" name="description_ru" required>{{$about->description_ru}}</textarea>
									<label for="description_am">Հասցե հայերեն</label>
									<textarea class="form-control" id="description_am" placeholder="Հասցե" name="description_am" required>{{$about->description_am}}</textarea>
								</div>
							{{ csrf_field() }}
							<button type="submit" class="btn btn-default">Ուղղել</button>
					</form>
				</div>
			</div>
			Մեր մասին
	</div>
</div>

@endsection
@section('script')
@endsection
