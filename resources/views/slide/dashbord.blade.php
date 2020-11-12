@extends('layouts.app')
<script >
	
	// console.log(Window.category_obj);
</script>
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
				<li><a  href='/about'>Մեր մասին</a></li>
				<li class="active">
					<a href='/slide'>Սլայդ</a>
					<ul>
						<li class="active"><a data-toggle="tab" href="#imagesdiv">Բոլոր Լուսանկար</a></li>
						<li><a data-toggle="tab" href="#addimage">Ավելացնել լուսանկար</a></li>
					</ul>
				</li>
			</ul>
		</div>
        <div class="col-md-10">

			<div class="tab-content">
			  	<div id="imagesdiv" class="tab-pane fade in active container">
				    <h3>Լուսանկարներ</h3>
					<div class="row">
					@foreach($images as $image)
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
							<img src="/images/fullscreen/{{$image->url}}" style="width: 100%">
							<a v-on:click="destroy({{$image->id}})" class="btn btn-default">Ջնջել</a>
						</div>
					@endforeach
					</div>
			  </div>
			  <div  id="addimage" class="tab-pane fade container" >
			    <h3>Ավելացնել լուսանկար</h3>
			    <form action="/slide" method="post" enctype="multipart/form-data">
				    <div class="form-group">
						<label for="image">Լուսանկար</label>
						<input type="file" class="form-control" id="image"  name="image" required>
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
	<script  src="{{asset('js/slide.js')}}"></script>
@endsection