@extends('layouts.app')

@section('content')
<script >
	Window.contacts=JSON.parse('{!! addcslashes(json_encode($contacts),"'")!!}');
</script>
<div class="container-fluid adminbody">
		
    <div class="row">
			<div class="tabs-left tabbable col-md-2">
				<ul class="nav nav-tabs">
					<li><a href="/team">Բոլոր աշխատակիցները</a></li>
					<li><a  href="/photosesia">Ֆոտոսեսիա</a></li>
					<li><a  href="/training">Դասընթացներ</a></li>
					<li><a  href="/servises">Ծառայություններ </a></li>
					<li class="active">
						<a href="/contact">Կոնտակտային տվյալներ</a>
						<ul>
							<li class="active"><a data-toggle="tab" href="#contactsdiv">Կոնտակտային տվյալներ</a></li>
							<?php
								if (!count($contacts)) {
									echo '<li><a data-toggle="tab" href="#addcontact">Ավելացնել կոնտակտային տվյալներ</a></li>';
								}
							?>
						</ul>
					</li>
					<li><a  href="/lookbook">lookbook</a></li>
					<li><a  href='/programs'>Հաղորդումներ</a></li>
					<li><a  href='/events'>Միջոցառումներ</a></li>
					<li><a  href='/dashbord_text'>Գլխավոր էջի տեքստեր</a></li>
					<li><a  href='/about'>Մեր մասին</a></li>
					<li><a  href='/slide'>Սլայդ</a></li>
				</ul>
		
			</div>
			<div class="tab-content col-md-10">
			  	<div id="contactsdiv" class="tab-pane fade in active">
				    <h3>Կոնտակտաին տվյալներ՝</h3>
				    <div class="contactsdiv" v-for="(contact, index) in contacts" v-bind:key="index">
					    Հասցե: <span>@{{contact.address}}</span><br>
					    Հեռ․: <span> @{{contact.phony}}</span><br>
					    Email: <span> @{{contact.email}}</span><br>
					    Viber: <span> @{{contact.viber}}</span><br>
					    Whatsapp: <span> @{{contact.whatsapp}}</span><br>
					   <a :href="contact.facebook"> Facebook </a><br>
					    <a :href="contact.instagram"> Instagram: </a><br>
					    <a :href="contact.telegram"> Telegram: </a><br>
					    <a :href="contact.vk"> Vk: </a><br>
					    <a :href="contact.twiter"> Twitter: </a><br>
					   <iframe v-bind:src="contact.maps" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					    <a v-bind:href="'/contact/'+contact.id+'/edit'" class="btn btn-default">Ուղղել</a>
					    <a v-on:click="destroy(contact.id)" class="btn btn-default">Ջնջել</a>
					</div>
				   
			  </div>
			  <div  id="addcontact" class="tab-pane fade " >
			  	<div class="tabs-left tabbable col-md-2">

			    <h3>Ավելացնել աշխատակից</h3>
			    <form action="/contact" method="post" enctype="multipart/form-data">
				    <div class="form-group">
				      <label for="address_en">Հասցե անգլերեն</label>
				      <input type="text" class="form-control" id="address_en" required placeholder="Հասցե" name="address_en">
				      <label for="address_ru">Հասցե ռուսերեն</label>
				      <input type="text" class="form-control" id="address_ru" required placeholder="Հասցե" name="address_ru">
				      <label for="address_am">Հասցե հայերեն</label>
				      <input type="text" class="form-control" id="address_am" required placeholder="Հասցե" name="address_am">
				    </div>
				    <div class="form-group">
				      <label for="phony">Բջջ․ հեռախոսահամար</label>
				      <input type="text" class="form-control" id="phony" required placeholder="Հեռ. +374..." name="phony">
				      <label for="phony_city">Քաղաքային հեռախոսահամար</label>
				      <input type="text" class="form-control" id="phony_city" required placeholder="Հեռ. +374..." name="phony_city">
				      <label for="viber">Viber</label>
				      <input type="text" class="form-control" id="viber" required placeholder="Հեռ. +374..." name="viber">
				      <label for="whatsapp">Whatsapp</label>
				      <input type="text" class="form-control" id="whatsapp" required placeholder="Հեռ. +374..." name="whatsapp">
				    </div>
				     <div class="form-group">
				      <label for="email">էլեկտրոնային հասցե</label>
				      <input type="text" class="form-control" id="email" required placeholder="email" name="email">
				    </div>
				    <div class="form-group">
				      <label for="facebook">facebook-ի հասցե</label>
				      <input type="text" class="form-control" id="facebook" required placeholder="Հասցե" name="facebook">
				    </div>
				    <div class="form-group">
				      <label for="instagram">Instagram-ի հասցե</label>
				      <input type="text" class="form-control" id="instagram" required placeholder="Հասցե" name="instagram">
				  	</div>
				    <div class="form-group">
				      <label for="telegram">Telegram-ի հասցե</label>
				      <input type="text" class="form-control" id="telegram" required placeholder="Հասցե" name="telegram">
				    </div>
				    <div class="form-group">
				      <label for="vk">Vk-ի հասցե</label>
				      <input type="text" class="form-control" id="vk" required placeholder="Հասցե" name="vk">
				    </div>
				    <div class="form-group">
				      <label for="twiter">Twiter-ի հասցե</label>
				      <input type="text" class="form-control" id="twiter" required placeholder="Հասցե" name="twiter">
				    </div>
				    <div class="form-group">
				      <label for="maps">Քարտեզ</label>
				      <textarea class="form-control" id="maps" required placeholder="Քարտեզ" name="maps"></textarea>
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
	<script  src="{{asset('js/contact.js')}}"></script>
@endsection
