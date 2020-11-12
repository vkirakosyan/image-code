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
				<li class="active"><a  href="/lookbook">lookbook</a></li>
				<li><a  href='/programs'>Հաղորդումներ</a></li>
				<li><a  href='/events'>Միջոցառումներ</a></li>
				<li><a  href='/dashbord_text'>Գլխավոր էջի տեքստեր</a></li>
				<li><a  href='/about'>Մեր մասին</a></li>
				<li><a  href='/slide'>Սլայդ</a></li>
			</ul>
		</div>
        <div class="col-md-10">
			<div class="tab-content" id="lookbookdiv">
				<div id="editlookbook" class="tab-pane fade in active" >
					 <h3>Ուղղել lookbook Կատեգորիան</h3>
				    <form action="/lookbook/{{$lookbook->id}}" method="post" enctype="multipart/form-data">
				    	<input name="_method" type="hidden" value="PUT">
				    	
					    <div class="form-group">
						    <label for="name_en">Անուն անգլերեն</label>
						    <input type="text" class="form-control" id="name_en"  name="name_en" value="{{$lookbook->name_en}}" required>
						    <label for="name_ru">Անուն ռուսերեն</label>
						    <input type="text" class="form-control" id="name_ru"  name="name_ru" value="{{$lookbook->name_ru}}" required>
						    <label for="name_am">Անուն հայերեն</label>
						    <input type="text" class="form-control" id="name_am"  name="name_am" value="{{$lookbook->name_am}}" required>
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