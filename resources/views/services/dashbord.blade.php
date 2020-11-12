@extends('layouts.app')
<script >
	Window.category_obj=JSON.parse('{!! addcslashes(json_encode($category),"'")!!}');
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
				<li class="active">
					<a href="/servises">Ծառայություններ</a>
					<ul>
						<li class="active"><a data-toggle="tab" href="#allservises">Բոլոր ծառայությունները</a></li>
						<li ><a data-toggle="tab" href="#addservises">Ավելացնել ծառայություն</a></li>
					</ul>
				</li>
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
			<div class="tab-content" id="cotegorydiv">
			  	<div  id="allservises" class="tab-pane fade in active ">
			  		<ul class="nav nav-tabs" >
			  			<li class="active"><a data-toggle="tab" href="#editallservises">Բոլոր ծառայությունները</a></li>
		           		<li  v-for="(cotegory , index) in cotegorydata "  
		           			 v-bind:key="index">
		           			<a data-toggle="tab" v-bind:href="'#category'+cotegory.id">@{{cotegory.name}}</a>
		           		</li>
		            </ul>
					<div class="tab-content" >
						<div class="tab-pane fade in active " id="editallservises">
							<editservices v-bind:cotegorydata="cotegorydata"></editservices>
						</div>
						<div 	class="tab-pane fade " v-for="(cotegory , index) in cotegorydata " 
														v-bind:key="index"
														v-bind:id="'category'+cotegory.id" >
								<services v-bind:servisesdata="cotegory.servises"></services>
						</div>
					</div>
				</div>
				<div id="addservises" class="tab-pane fade" >
				  	<ul class="nav nav-tabs">
		           		<li class="active"><a data-toggle="tab" href="#addcategory">Ավելացնել ծառայության տեսակ</a></li>
		           		<li class=""><a data-toggle="tab" href="#addservise">Ավելացնել ծառայություն</a></li>
		            </ul>
		            <div class="tab-content">
		            	<div id="addcategory" class="tab-pane in active" >
							<form action="/cotegory" method="post" >
								<h3>Ավելացնել ծառայության տեսակ</h3>
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
		            	<div id="addservise" class="tab-pane fade" >
							 <h3>Ավելացնել ծառայություն</h3>
						    <form action="/servises" method="post" enctype="multipart/form-data">
						    	<div class="form-group">
								    <label for="name">Անուն</label>
								    <select name="cotegory" >
								    	<option v-for="(cotegory,index ) in cotegorydata" 
								    			v-bind:key="index"
								    			v-bind:value="cotegory.id">
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
							        <label for="price">Գին</label>
							        <select name="valiut" >
							        	<option value="֏">֏</option>
							        </select>
							        <input type="text" class="form-control" id="price" placeholder="Գին" name="price" required>
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
	<script  src="{{asset('js/service.js')}}"></script>
@endsection