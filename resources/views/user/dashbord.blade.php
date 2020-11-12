@extends('layouts.user')

@section('title','HOME')

@section('style')
	@parent
	<link rel="stylesheet" type="text/css" href="/css/dashbord.css">
	<link rel="stylesheet" type="text/css" href="/css/paralax.css">
@endsection
@section('script_head')
	@parent
	
@endsection

@section('content')
	@parent
	<div id="dashbord"  class="container-fluid">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
			<ol class="carousel-indicators">
			@foreach($slide as $image)
				 <li data-target="#myCarousel" data-slide-to="{{$loop->index}}" class="{{$loop->index==0? 'active' : ''}}"></li>
			@endforeach 
			</ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner"  style="max-height: 700px; overflow: hidden;">
			  	<div class="animation animationbackground" :class="{starts : start}">
	                <div class="home-mask bg-mask dark op4" style="opacity: 0.4;"></div>
	                <h1 class="home-title fs60 text-center" >
	                	<span class="samerstyle">Image code</span>
	                </h1>
	                <div class="line-home line-top  on"></div>
	                <div class="line-home line-right on"></div>
	                <div class="line-home line-bottom on"></div>
	                <div class="line-home line-left on"></div>
	            </div>
				@foreach($slide as $image)
			    <div class="item {{$loop->index==0? 'active' : ''}}">
			      <img src="/images/fullscreen/{{$image->url}}" style="width: 100%;">
			    </div>
				@endforeach
			  </div>

			  <!-- Left and right controls -->
			  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#myCarousel" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right"></span>
			    <span class="sr-only">Next</span>
			  </a>

		</div>
		<div class="container-fluid  ">
			<div class="row effect-jazz-content1">
				<div class="col-lg-3 col-md-3 col-sm-6 grid ">
					<figure class="effect-jazz">
						<img src="/img/cosmetology.jpg" alt="img25"/>
						<figcaption>
							<h2>@{{lang.cosmetology}}</h2>
							<p>Image code</p>
							<a href="/user_lookbook/1"></a>
						</figcaption>			
					</figure>
				</div>
				<div class=" col-lg-3 col-md-3 col-sm-6 grid">
					<figure class="effect-jazz">
						<img src="/img/Dimahardarum.jpg" alt="img25"/>
						<figcaption>
							<h2>@{{lang.makeup}}</h2>
							<p>Image code</p>
							<a href="/user_lookbook/2"></a>
						</figcaption>			
					</figure>
				</div>
				<div class=" col-lg-3 col-md-3 col-sm-6 grid">
					<figure class="effect-jazz">
						<img src="/img/varsahardarum.jpg" alt="img25"/>
						<figcaption>
							<h2>@{{lang.hairdressing}}</h2>
							<p>Image code</p>
							<a href="/user_lookbook/3"></a>
						</figcaption>			
					</figure>
				</div>
				<div class=" col-lg-3 col-md-3  col-sm-6 grid">
					<figure class="effect-jazz">
						<img src="/img/matnahardarum.jpg" alt="img25"/>
						<figcaption>
							<h2> @{{lang.manicure}}</h2>
							<p>Image code</p>
							<a href="/user_lookbook/4"></a>
						</figcaption>			
					</figure>
				</div>
			</div>
			<div class="row effect-jazz-content2">
				<div class=" col-lg-3 col-md-3 col-sm-6 grid">
					<figure class="effect-jazz">
						<img src="/img/pedicure.jpg" alt="img25"/>
						<figcaption>
							<h2>@{{lang.pedicure}}</h2>
							<p>Image code</p>
							<a href="/user_lookbook/5"></a>
						</figcaption>			
					</figure>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6  addressdiv">
					<div class="about row">

 						<p><?php if(isset($text[0]))echo $text[0]->description;?></p>
				</div>
				</div>
				<div class=" col-lg-3 col-md-3 col-sm-6 grid topaddress">
					<figure class="effect-jazz">
						<img src="/img/spa.jpg" alt="img25"/>
						<figcaption>
							<h2>@{{lang.spa}}</h2>
							<p>Image code</p>
							<a href="/user_lookbook/6"></a>
						</figcaption>			
					</figure>
				</div>
			</div>
		</div>

		<div class="parallax set_1_image">
			<font class="set_1_image_text" :class="{'view_1_image_text' : view_1_image_text}">
				<h3>@{{lang.elos}}</h3>

				<p><?php  if(isset($text[0]))echo $text[0]->elos ;?></p>
				<a href="/user_lookbook/7" class="hvr-border-fade">@{{lang.more}}</a>
			</font>
		</div>
			
		<div class="container-fluid ">
			<div class="container training_content">
				<h3>@{{lang.training}}</h3>
				<p><?php  if(isset($text[0])) echo $text[0]->training;?><p>
				<?php
					if ($trainingsCount) {
						echo '<a href="/user_training/1" class="hvr-border-fade">@{{lang.more}}</a></p>';
					}
				?>
			</div>
		</div>
		<div class="parallax set_2_image " >
			<div class="container-fluid">
				<font class="set_2_image_text" :class="{'view_2_image_text' : view_2_image_text}">
					<?php  if(isset($text[0]))echo $text[0]->footer;?>
				</font>
			</div>
		</div>

		<div class="container-fluid">
			<div class="container">
				
			</div>
			<div class="mapsaddress">
				<iframe src="{{isset($contact->maps)?$contact->maps:''}}" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				
			</div>
		</div>								
	</div>
@endsection

@section('footer')
	@parent
@endsection

@section('script')
	@parent
	<script src="{{asset('/js/dashbord.js')}}"></script>
@endsection
