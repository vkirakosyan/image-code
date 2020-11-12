@extends('layouts.app')

@section('content')

<div id='dashbord_text'>

	<div class="tabs-left tabbable col-md-2">
		<ul class="nav nav-tabs adminbody">
			<li><a href="/team">Բոլոր աշխատակիցները</a></li>
			<li><a  href="/photosesia">Ֆոտոսեսիա</a></li>
			<li><a  href="/training">Դասընթացներ</a></li>
			<li><a  href="/servises">Ծառայություններ </a></li>
			<li><a  href="/contact">Կոնտակտային տվյալներ</a></li>
			<li><a  href="/lookbook">lookbook</a></li>
			<li><a  href='/programs'>Հաղորդումներ</a></li>
			<li><a  href='/events'>Միջոցառումներ</a></li>
			<li class="active">
				<a href='/dashbord_text'>Գլխավոր էջի տեքստեր</a>
				<ul>
					<li class="active"><a data-toggle="tab" href="#alltext">Գլխավոր էջի տեքստեր</a></li>
					<?php
						if (!isset($text[0])) {
							echo '<li><a data-toggle="tab" href="#addtext">Ավելացնել տեքստ</a></li>';

						}
					?>
				</ul>
			</li>
			<li><a  href='/about'>Մեր մասին</a></li>
			<li><a  href='/slide'>Սլայդ</a></li>
		</ul>

	</div>
	<div class="tab-content col-md-10">
	  	<div id="alltext" class="tab-pane fade in active">
		  
           <div class="description">
              <?php  if(isset($text[0])){echo $text[0]->description;}?>
           </div>
           <div class="elos">
               <?php  if(isset($text[0]))echo $text[0]->elos;?>
           </div>
           <div class="training">
               <?php if(isset($text[0]))echo $text[0]->training;?>
           </div>
           <div class="footer_text">
              <?php  if(isset($text[0]))echo $text[0]->footer;?>
           </div>
           <?php
            if (isset($text[0]))
            	echo "<a href='/dashbord_text/{$text[0]->id}/edit' class='btn btn-default'>Ուղղել</a>";
           ?>
	  	</div>

	  	<div id="addtext" class="tab-pane fade ">
			<form action="/dashbord_text" method="post" >
				<div class="form-group mb-3">
				  	<label for="elos_en">Էլոս֊ի տեքստ անգլերեն</label>
				  	<textarea class="form-control" id="elos_en" placeholder="Անուն" name="elos_en" required></textarea>
				  	<label for="elos_ru">Էլոս֊ի տեքստ ռուսերեն</label>
				  	<textarea class="form-control" id="elos_ru" placeholder="Անուն" name="elos_ru" required></textarea>
				  	<label for="elos_am">Էլոս֊ի տեքստ հայերեն</label>
				  	<textarea class="form-control" id="elos_am" placeholder="Անուն" name="elos_am" required ></textarea>
				</div>
				 <div class="form-group">
				  	<label for="description_en">IMAGE CODE Beauty Salon-ի նկարագրություն անգլերեն</label>
				  	<textarea class="form-control" id="description_en" placeholder="Բնութագիր" name="description_en" required></textarea>
				  	<label for="description_ru">IMAGE CODE Beauty Salon-ի նկարագրություն ռուսերեն</label>
				  	<textarea class="form-control" id="description_ru" placeholder="Բնութագիր" name="description_ru" required ></textarea>
				  	<label for="description_am">IMAGE CODE Beauty Salon-ի նկարագրություն հայերեն</label>
				  	<textarea class="form-control" id="description_am" placeholder="Բնութագիր" name="description_am" required ></textarea>
				</div>
				 <div class="form-group">
				  	<label for="training_en">Դասընթացների նկարագրություն անգլերեն</label>
				  	<textarea class="form-control" id="training_en" placeholder="Բնութագիր" name="training_en" required></textarea>
				  	<label for="training_ru">Դասընթացների նկարագրություն ռուսերեն</label>
				  	<textarea class="form-control" id="training_ru" placeholder="Բնութագիր" name="training_ru" required ></textarea>
				  	<label for="training_am">Դասընթացների նկարագրություն հայերեն</label>
				  	<textarea class="form-control" id="training_am" placeholder="Բնութագիր" name="training_am" required ></textarea>
				</div>
				 <div class="form-group">
				  	<label for="footer_en">Վերջին տեքստը անգլերեն</label>
				  	<textarea class="form-control" id="footer_en" placeholder="Բնութագիր" name="footer_en" required></textarea>
				  	<label for="footer_ru">Վերջին տեքստը ռուսերեն</label>
				  	<textarea class="form-control" id="footer_ru" placeholder="Բնութագիր" name="footer_ru" required ></textarea>
				  	<label for="footer_am">Վերջին տեքստը հայերեն</label>
				  	<textarea class="form-control" id="footer_am" placeholder="Բնութագիր" name="footer_am" required ></textarea>
				</div>
				
				{{ csrf_field() }}
				<button type="submit" class="btn btn-default">Ավելացնել</button>
			</form>
		</div>	  
	</div>
</div>
@endsection
@section('script')
@endsection