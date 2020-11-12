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
				<li class="active"><a  href="/contact">Կոնտակտային տվյալներ</a></li>
				<li><a  href="/lookbook">lookbook</a></li>
				<li><a  href='/programs'>Հաղորդումներ</a></li>
				<li><a  href='/events'>Միջոցառումներ</a></li>
				<li><a  href='/dashbord_text'>Գլխավոր էջի տեքստեր</a></li>
				<li><a  href='/about'>Մեր մասին</a></li>
				<li><a  href='/slide'>Սլայդ</a></li>
			</ul>
		</div>
		<div class="col-md-10">
		<div  id="addcontact" class="tab-pane fade in active container" >
		    <h3>Թարմացնել </h3>
		    <form action="/contact/{{$contact->id}}" method="post" >
	    	<input name="_method" type="hidden" value="PUT">
			    <div class="form-group">
			      <label for="address_en">Հասցե</label>
			      <input type="text" class="form-control" id="address_en" required name="address_en" value="{{$contact->address_en}}">
			      <label for="address_ru">Հասցե</label>
			      <input type="text" class="form-control" id="address_ru" required name="address_ru" value="{{$contact->address_ru}}">
			      <label for="address_am">Հասցե</label>
			      <input type="text" class="form-control" id="address_am" required name="address_am" value="{{$contact->address_am}}">
			    </div>
			    <div class="form-group">
			      <label for="phony">Հեռախոսահամար</label>
			      <input type="text" class="form-control" id="phony" required name="phony" value="{{$contact->phony}}">
			    </div>
			    <div class="form-group">
			      <label for="phony_city">Հեռախոսահամար</label>
			      <input type="text" class="form-control" id="phony_city" required name="phony_city" value="{{$contact->phony_city}}">
			    </div>
			    <div class="form-group">
				    <label for="viber">Viber</label>
			      	<input type="text" class="form-control" id="viber" required  name="viber" value="{{$contact->viber}}">
				</div>
			    <div class="form-group">
				    <label for="whatsapp">Whatsapp</label>
				    <input type="text" class="form-control" id="whatsapp" required name="whatsapp" value="{{$contact->whatsapp}}">
				</div>
			     <div class="form-group">
			      <label for="email">էլեկտրոնային հասցե</label>
			      <input type="text" class="form-control" id="email" required name="email" value="{{$contact->email}}">
			    </div>
			    <div class="form-group">
			      <label for="facebook">facebook-ի հասցեն</label>
			      <input type="text" class="form-control" id="facebook" required placeholder="Հասցե" name="facebook" value="{{$contact->facebook}}">
			    </div>
			    <div class="form-group">
			      <label for="instagram">Instagram-ի հասցե</label>
			      <input type="text" class="form-control" id="instagram" required placeholder="Հասցե" name="instagram" value="{{$contact->instagram}}">
			    </div>
			    <div class="form-group">
			      <label for="telegram">Telegram-ի հասցե</label>
			      <input type="text" class="form-control" id="telegram" required placeholder="Հասցե" name="telegram" value="{{$contact->telegram}}">
			    </div>
			    <div class="form-group">
				    <label for="vk">Vk-ի հասցե</label>
				    <input type="text" class="form-control" id="vk" required name="vk" value="{{$contact->vk}}">
				</div>
				<div class="form-group">
				    <label for="twiter">Twiter-ի հասցե</label>
				    <input type="text" class="form-control" id="twiter" required name="twiter" value="{{$contact->twiter}}">
				</div>
			    <div class="form-group">
			      <label for="maps">Քարտեզ</label>
			      <textarea class="form-control" id="maps" required name="maps">{{$contact->maps}}</textarea>
			    </div>

			    {{ csrf_field() }}
			    <button type="submit" class="btn btn-default">Ուղղել</button>
			</form>
		</div>
		</div>	
		 
	</div>
	<div class="container">
		<iframe src="{{$contact->maps}}" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
</div>

@endsection
@section('script')
@endsection
