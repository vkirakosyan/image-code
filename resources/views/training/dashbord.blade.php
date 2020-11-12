@extends('layouts.app')
<script >
	Window.training=JSON.parse('{!! addcslashes(json_encode($training),"'")!!}');
	window.cotegorytraining=JSON.parse('{!! addcslashes(json_encode($cotegorytraining),"'")!!}');
</script>
@section('content')

<div class="container-fluid adminbody">
		<div id="training_content" class="row">
		<div class="tabs-left tabbable col-md-2">
			<ul class="nav nav-tabs">
				<li><a href="/team">Բոլոր աշխատակիցները</a></li>
				<li><a  href="/photosesia">Ֆոտոսեսիա</a></li>
				<li class="active">
					<a href="/training">Դասընթացներ</a>
					<ul>
						<li class="active"><a data-toggle="tab" href="#training">Բոլոր դասընթացների տեսակները</a></li>
						<li><a data-toggle="tab" href="#addtrainings">Ավելացնել դասընթաց</a></li>
					</ul>
				</li>
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
		
  <div class="col-md-10">
          

			<div class="tab-content">
			  	<div id="training" class="tab-pane fade in active">
				    <h3>Դասընթացներ</h3>
						<ul class="nav nav-tabs">
				           	<li class="active"><a data-toggle="tab" href="#alltrainingcategory">Բոլոր դասընթացների տեսակներ</a></li>
				           	<li><a data-toggle="tab" href="#addtrainingcategory">Ավելացնել դասընթացի տեսակ</a></li>
				        </ul>
				        <div class="tab-content">
				  			<div id="alltrainingcategory" class="tab-pane fade in active">
								<category-training  v-bind:cotegorytraining="cotegorytraining">
								</category-training>

				  			</div>
				  			<div id="addtrainingcategory" class="tab-pane fade">
								 <h3>Ավելացնել դասընթացի տեսակ</h3>
								    <form action="/training_category" method="post" >
									    <div class="form-group">
									      <label for="name_en">Անուն անգլերեն</label>
									      <input type="text" class="form-control" id="name_en" placeholder="Անուն" name="name_en" required>
									      <label for="name_ru">Անուն ռուսերեն</label>
									      <input type="text" class="form-control" id="name_ru" placeholder="Անուն" name="name_ru" required>
									      <label for="name_am">Անուն հայերեն</label>
									      <input type="text" class="form-control" id="name_am" placeholder="Անուն" name="name_am" required>
									    </div>
									    {{ csrf_field() }}
									    <button type="submit" class="btn btn-default">Ավելացնել</button>
									  </form>
				  			</div>
				  		</div>
			  </div>
			  <div id="addtrainings" class="tab-pane fade" >
			    <h3>Ավելացնել դասընթաց</h3>
			    <form action="/training" method="post" enctype="multipart/form-data">
			    	<div class="form-group">
			    		<select name="cotegory" required>
					    	<option v-for="(cotegory,index ) in cotegorytraining" 
					    			v-bind:key="index"
					    			v-bind:value="cotegory.id"
					    			>
					    			@{{cotegory.name}}
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
				      <label for="specificity_en">Մասնագիտություն անգլերեն</label>
				      <input type="text" class="form-control" id="specificity_en" placeholder="Մասնագիտություն" name="specificity_en" required>
				      <label for="specificity_ru">Մասնագիտություն ռուսերեն</label>
				      <input type="text" class="form-control" id="specificity_ru" placeholder="Մասնագիտություն" name="specificity_ru" required>
				      <label for="specificity_am">Մասնագիտություն հայերեն</label>
				      <input type="text" class="form-control" id="specificity_am" placeholder="Մասնագիտություն" name="specificity_am" required>
				    </div>
				     <div class="form-group">
				      <label for="description_en">Դասընթացի բնութագիր անգլերեն</label>
				      <textarea class="form-control" id="description_en" placeholder="Դասընթացի բնութագիր" name="description_en" required></textarea>
				      <label for="description_ru">Դասընթացի բնութագիր ռուսերեն</label>
				      <textarea class="form-control" id="description_ru" placeholder="Դասընթացի բնութագիր" name="description_ru" required></textarea>
				      <label for="description_am">Դասընթացի բնութագիր հայերեն</label>
				      <textarea class="form-control" id="description_am" placeholder="Դասընթացի բնութագիր" name="description_am" required></textarea>
				    </div>
				    <div class="form-group">
				      <label for="image">Լուսանկար</label>
				      <input type="file" class="form-control" id="image"  name="image">
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
	<script  src="{{asset('js/training.js')}}"></script>
@endsection