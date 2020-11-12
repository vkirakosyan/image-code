<template>
	<div  :class="$style.AbsoluteCenterDiv">
		<div :class="$style.AllDisplay"></div>
		<div  :class="$style.AbsoluteCenter"
		class="col-lg-7 col-md-6 col-sm-11 col-xs-11">
			<span @click="$emit('closeimage')" 
			:class="$style.CloseButton"
			class="glyphicon glyphicon-remove"></span>
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#myCarousel" 	:data-slide-to="index" 
			    								v-for="(img , index) in url"
			    								:class="{active: (index==0)}"></li>
			    
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner">
			    <div class="item "  :class="{active: (img.img==imageurl)}" 
			    					v-for="(img , index) in url"
			    					:key="index" >
			      <img 	:src="'/img/uploads/'+img.img"
			      		:class="$style.images"
			      		:alt="img.name">
			      	<div class="carousel-caption">
			        <h3>{{img.name}}</h3>
			        <p>{{img.description}}</p>
			      </div>
			    </div>
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
		</div>
	</div>
</template>
<script>
    export default {

        props:{
        	url:Array,
        	imageurl:String
        }

    }
</script>

<style module>
.AbsoluteCenter {
	display: inline-block;
	padding-top: 2%;
	height: auto;
	margin: auto;
	position: absolute;
	top: 0; left: 0; bottom: 0; right: 0;
	z-index:20;
	transition: all .5s;
}

.AbsoluteCenterDiv,.AllDisplay{
	position: fixed;
	text-align: center;
	top:0px;
	left:0px;
	width: 100%;
	height: 100%;
	z-index:19;
	transition: all .5s;
}
.AbsoluteCenterDiv img{
	display: block;
	transition: all .5s;
}
.AllDisplay{
	opacity: 0.9;
	background-color: #000;
	transition: all .5s;
}

.CloseButton{
	font-size: 20px;
	display: block;
	position: relative;
	top:0px;
    width: 100%;
    height: 30px;
    text-align: right;
}
.images{
	width: 100%;
}
</style>