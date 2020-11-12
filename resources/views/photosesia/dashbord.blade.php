@extends('layouts.app')
<script >
	Window.photos=JSON.parse('{!! addcslashes(json_encode($photos),"'")!!}');
</script>
@section('content')

<div id='photos' class="adminbody">
   <div class="tabs-left tabbable col-md-2">
		<ul class="nav nav-tabs ">
			<li><a href="/team">Բոլոր աշխատակիցները</a></li>
			<li class="active">
				<a href="/photosesia">Ֆոտոսեսիա</a>
				<ul>
					<li class="active"><a data-toggle="tab" href="#photosesiaalbom">Մեր աշխատանքներից</a></li>
					<li><a data-toggle="tab" href="#addphotosesia">Ավելացնել նկար</a></li>
				</ul>
			</li>
			<li><a  href="/training">Դասընթացներ</a></li>
			<li><a  href="/servises">Ծառայություններ </a></li>
			<li><a  href="/contact">Կոնտակտային տվյալներ</a></li>
			<li><a  href="/lookbook">lookbook</a></li>
			<li><a  href='/programs'>Հաղորդումներ</a></li>
			<li><a  href='/events'>Միջոցառումներ</a></li>
			<li><a  href='/dashbord_text'>Գլխավոր էջի տեքստեր</a></li>
			<li><a  href='/about'>Մեր մասին</a></li>
			<li><a  href='/slide'>Սլայդ</a></li>
		</ul>
   </div>
   

	<div class="tab-content col-md-10">
	  	<div id="photosesiaalbom" class="tab-pane fade in active">
		    <h3>Մեր կատարած աշխատանքներից</h3>
			<albomes-data  :albomes="albomes" 
										:edit_url="'/albome/'" 
										:delete_url="'/albome/'" 
										:photo_edit_url="'/photosesia/'">
			</albomes-data>
	  </div>
	  <div id="addphotosesia" class="tab-pane fade" >
	  	<ul class="nav nav-tabs ">
		    <li class="active"><a data-toggle="tab" href="#addalbom">Ավելացնել Ալբոմ</a></li>
		    <li><a data-toggle="tab" href="#addphotoinalbom">Ավելացնել նկար</a></li>
		</ul>
		<div class="tab-content">
			<div id="addalbom" class="tab-pane fade in active">
				<h3>Ավելացնել Ալբոմ</h3>
				 <form action="/albome" method="post" enctype="multipart/form-data">
				 	<div class="form-group">
					      <label for="name_en">Անուն անգլերեն</label>
					      <input type="text" class="form-control" id="name_en" placeholder="Անուն" name="name_en" required>
					      <label for="name_ru">Անուն ռուսերեն</label>
					      <input type="text" class="form-control" id="name_ru" placeholder="Անուն" name="name_ru" required>
					      <label for="name_am">Անուն հայերեն</label>
					      <input type="text" class="form-control" id="name_am" placeholder="Անուն" name="name_am" required>
					</div>
					<div class="form-group">
					    <label for="image">Լուսանկար</label>
					    <input type="file" class="form-control" id="image"  name="image">
					</div>
					    {{ csrf_field() }}
					<button type="submit" class="btn btn-default">Ավելացնել</button>
				 </form>
			</div>
			<div id="addphotoinalbom" class="tab-pane fade" >
				<h3>Ավելացնել նկար</h3>
				    <form action="/photosesia" method="post" enctype="multipart/form-data">
				    	<div class="form-group">
				    		 <label for="albome">Անուն</label>
				    		 <select name="albome" id="albome" required>
								    	<option v-for="(albom,index ) in albomes" 
								    			:key="index"
								    			:value="albom.id">
								    			@{{albom.name}}
								    	</option>
							</select>
				    	</div>
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
					      <textarea class="form-control" id="description_en" placeholder="Աշխատանքաին բնութագիր" name="description_en" required></textarea>
					      <label for="description_ru">Բնութագիր ռուսերեն</label>
					      <textarea class="form-control" id="description_ru" placeholder="Աշխատանքաին բնութագիր" name="description_ru" required></textarea>
					      <label for="description_am">Բնութագիր հայերեն</label>
					      <textarea class="form-control" id="description_am" placeholder="Աշխատանքաին բնութագիր" name="description_am" required></textarea>
					    </div>
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
</div>
@endsection
@section('script')
	<script  src="{{asset('js/photosesia.js')}}"></script>
@endsection