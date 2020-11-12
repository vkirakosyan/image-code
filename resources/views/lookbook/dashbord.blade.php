@extends('layouts.app')
<script >
	Window.lookbookdata=JSON.parse('{!! addcslashes(json_encode($lookbook),"'")!!}');
	Window.lookbook_category=JSON.parse('{!! addcslashes(json_encode($lookbook_category),"'")!!}');
	console.log(Window.lookbookdata);
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
				<li class="active">
					<a href="/lookbook">lookbook</a>
					<ul>
						<li class="active"><a data-toggle="tab" href="#lookbook_cotegory">lookbook</a></li>
						<li><a data-toggle="tab" href="#addlookbook">Ավելացնել lookbook</a></li>
					</ul>
				</li>
				<li><a  href='/programs'>Հաղորդումներ</a></li>
				<li><a  href='/events'>Միջոցառումներ</a></li>
				<li><a  href='/dashbord_text'>Գլխավոր էջի տեքստեր</a></li>
				<li><a  href='/about'>Մեր մասին</a></li>
				<li><a  href='/slide'>Սլայդ</a></li>
			</ul>
		</div>

		<div class="col-md-10">        
			<div class="tab-content" id="lookbookdiv">
				<div  id="lookbook_cotegory" class="tab-pane fade in active ">
					<edit-lookbook-cotegory   :cotegorydata="lookbookdata" ></edit-lookbook-cotegory>
				</div>
			  <!--	<div  id="alllookbook" class="tab-pane fade  ">
			  		<ul class="nav nav-tabs" >
		           		<li v-bind:class="{active: index==0}"  v-for="(lookbook , index) in lookbookdata "  
		           										v-bind:key="index">
		           			<a data-toggle="tab" v-bind:href="'#lookbook'+lookbook.id">@{{lookbook.name}}</a>
		           		</li>
		            </ul>
					<div class="tab-content" >
						<div 	class="tab-pane fade "	v-bind:class="(index==0)?' active in':''"  
														v-for="(lookbook , index) in lookbookdata " 
														v-bind:key="index"
														v-bind:id="'lookbook'+lookbook.id" >
								<lookbookimg v-bind:imgdata="lookbook.lookbookimg"></lookbookimg>
						</div>
					</div>
				</div>-->
				<div id="addlookbook" class="tab-pane fade" >
				  	<ul class="nav nav-tabs">
		           		<li class="active"><a data-toggle="tab" href="#addcategory">Ավելացնել lookbook տեսակ</a></li>
		           		<li ><a data-toggle="tab" href="#addcategory_lbimg">Ավելացնել lookbook ալբոմ</a></li>
		           		<li ><a data-toggle="tab" href="#addimages">Ավելացնել lookbook նկար</a></li>
		            </ul>
		            <div class="tab-content">
		            	<div id="addcategory" class="tab-pane in active" >
							<form action="/lookbook" method="post" >
								<h3>Ավելացնել lookbook տեսակ</h3>
							 	<div class="form-group">
								    <label for="name_en">Անուն անգլերեն</label>
								    <input type="text" class="form-control" id="name_en" placeholder="Անուն" name="name_en">
							    </div>
							    <div class="form-group">
								    <label for="name_ru">Անուն ռուսերեն</label>
								    <input type="text" class="form-control" id="name_ru" placeholder="Անուն" name="name_ru">
							    </div>
							    <div class="form-group">
								    <label for="name_am">Անուն հայերեն</label>
								    <input type="text" class="form-control" id="name_am" placeholder="Անուն" name="name_am">
							    </div>
							    {{ csrf_field() }}
							   	<button type="submit" class="btn btn-default">Ավելացնել</button>
							</form>
		            	</div>

		            	<div id="addcategory_lbimg" class="tab-pane in" >
							<form action="/lookbook_category" method="post" enctype="multipart/form-data">
								<h3>Ավելացնել lookbook ալբոմ</h3>
								<label for="lookbook_id">lookbook ալբոմ</label>
								<select name="lookbook_id" >
								    	<option v-for="(lookbook,index ) in lookbookdata" 
								    			v-bind:key="index"
								    			v-bind:value="lookbook.id">
								    			@{{lookbook.name}}
								    					</option>
								</select>
							 	<div class="form-group">
								    <label for="name_en">Անուն անգլերեն</label>
								    <input type="text" class="form-control" id="name_en" placeholder="Անուն" name="name_en">
							    </div>
							    <div class="form-group">
								    <label for="name_ru">Անուն ռուսերեն</label>
								    <input type="text" class="form-control" id="name_ru" placeholder="Անուն" name="name_ru">
							    </div>
							    <div class="form-group">
								    <label for="name_am">Անուն հայերեն</label>
								    <input type="text" class="form-control" id="name_am" placeholder="Անուն" name="name_am">
							    </div>

							    <div class="form-group">
								    <label for="image">Լուսանկար</label>
								    <input type="file" class="form-control" id="image"  name="image">
							    </div>
							    {{ csrf_field() }}
							   	<button type="submit" class="btn btn-default">Ավելացնել</button>
							</form>
		            	</div>

		            	<div id="addimages" class="tab-pane fade " >
							 <h3>Ավելացնել lookbook նկար</h3>
						    <form action="/lookbook_img" method="post" enctype="multipart/form-data">
						    	<div class="form-group">
								    <label for="lookbook_id">lookbook տեսակ</label>
								    <select name="lookbook_id" >
								    	<option v-for="(lookbook,index ) in lookbookdata" 
								    			v-bind:key="index"
								    			v-bind:value="lookbook.id">
								    			@{{lookbook.name}}
								    					</option>
								    </select>
							    </div>
							    <div class="form-group">
								    <label for="lookbook_id">lookbook ալբոմ</label>
								    <select name="lookbook_category_id" >
								    	<option v-for="(lookbook,index ) in lookbook_category_data" 
								    			v-bind:key="index"
								    			v-bind:value="lookbook.id"
								    			v-on:change="selectCategory">
								    			@{{lookbook.name}}
								    					</option>
								    </select>
							    </div>
							    <div class="form-group">
								    <label for="name_en">Անուն անգլերեն</label>
								    <input type="text" class="form-control" id="name_en" placeholder="Անուն" name="name_en">
								    <label for="name_ru">Անուն ռուսերեն</label>
								    <input type="text" class="form-control" id="name_ru" placeholder="Անուն" name="name_ru">
								    <label for="name_am">Անուն հայերեն</label>
								    <input type="text" class="form-control" id="name_am" placeholder="Անուն" name="name_am">
							    </div>
							    <div class="form-group hidden">
								    <label for="description_en">Նկարագրություն անգլերեն</label>
								    <input type="text" class="form-control" id="description_en" placeholder="Նկարագրություն" name="description_en">
								    <label for="description_ru">Նկարագրություն ռուսերեն</label>
								    <input type="text" class="form-control" id="description_ru" placeholder="Նկարագրություն" name="description_ru">
								    <label for="description_am">Նկարագրություն հայերեն</label>
								    <input type="text" class="form-control" id="description_am" placeholder="Նկարագրություն" name="description_am">
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
    </div>
</div>

@endsection
@section('script')
	<script  src="{{asset('js/lookbook.js')}}"></script>
@endsection