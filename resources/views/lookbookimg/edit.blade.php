@extends('layouts.app')
<script >
	Window.lookbookdata=JSON.parse('{!! addcslashes(json_encode($lookbook),"'")!!}');
	Window.lookbook_category=JSON.parse('{!! addcslashes(json_encode($lookbook_category),"'")!!}');
	Window.lookbookimgdata=JSON.parse('{!! addcslashes(json_encode($lookbookimg),"'")!!}');
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
				<li class="active"><a href="/lookbook">lookbook</a></li>
				<li><a  href='/programs'>Հաղորդումներ</a></li>
				<li><a  href='/events'>Միջոցառումներ</a></li>
				<li><a  href='/dashbord_text'>Գլխավոր էջի տեքստեր</a></li>
				<li><a  href='/about'>Մեր մասին</a></li>
				<li><a  href='/slide'>Սլայդ</a></li>
			</ul>
		</div>

        <div class="col-md-10">
            
			<div class="tab-content" id="lookbookdiv">
				<div id="addlookbook" class="tab-pane fade container in active" >
					 <h3>Փոխել lookbook նկար</h3>
				    <form v-bind:action="'/lookbook_img/'+lookbookimg.id" method="post" enctype="multipart/form-data">
				    	<input name="_method" type="hidden" value="PUT">
				    	<div class="form-group">
						    <label for="lookbook_id">lookbook տեսակ</label>
						    <select name="lookbook_id" >
						    	<option v-for="(lookbook,index ) in lookbookdata" 
						    			v-bind:key="index"
						    			v-bind:value="lookbook.id"
						    			v-bind:selected=" lookbook.id==lookbookimg.lookbook.id">
						    			@{{lookbook.name}}
						    	</option>
						    </select>
						</div>
						<div class="form-group">
						    <label for="lookbook_id">lookbook ալբոմ</label>
						    <select name="lookbook_id" >
						    	<option v-for="(lookbook,index ) in lookbookdata" 
						    			v-bind:key="index"
						    			v-bind:value="lookbook.id"
						    			v-bind:selected=" lookbook.id==lookbookimg.lookbook.id">
						    			@{{lookbook.name}}
						    	</option>
						    </select>
					    </div>
					    <div class="form-group">
						    <label for="name_en">Անուն </label>
						    <input type="text" class="form-control" id="name_en"  name="name_en" v-bind:value="lookbookimg.name_en" required>
						    <label for="name_ru">Անուն</label>
						    <input type="text" class="form-control" id="name_ru"  name="name_ru" v-bind:value="lookbookimg.name_ru" required>
						    <label for="name_am">Անուն</label>
						    <input type="text" class="form-control" id="name_am"  name="name_am" v-bind:value="lookbookimg.name_am" required>
					    </div>
					    <div class="form-group">
						    <label for="description_en">Նկարագրություն անգլերեն</label>
						    <input type="text" class="form-control" id="description_en" required name="description_en" v-bind:value="lookbookimg.description_en">
						    <label for="description_ru">Նկարագրություն ռուսերեն</label>
						    <input type="text" class="form-control" id="description_ru" required name="description_ru" v-bind:value="lookbookimg.description_ru">
						    <label for="description_am">Նկարագրություն հայերեն</label>
						    <input type="text" class="form-control" id="description_am" required name="description_am" v-bind:value="lookbookimg.description_am">
					    </div>
					    <div class="form-group" v-bind:class="{'hide': !isactive}">
						    <label for="image">Լուսանկար</label>
						    <input type="file" class="form-control" id="image"  name="image">
					    </div>
					    <img v-bind:class="{'hide': isactive}" v-bind:src="'/img/uploads/'+lookbookimg.img" style="width:50%;">
					    <a v-on:click="editimg" class="btn btn-default" v-bind:class="{'hide': isactive}">Փոխել նկարը</a><br><br>
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
	<script  src="{{asset('js/lookbook.js')}}"></script>
@endsection