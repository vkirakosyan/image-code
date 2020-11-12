<template>
	<div class="container">
		<h2></h2>
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		    <!-- Indicators -->
		    <ol class="carousel-indicators">
		      <li data-target="#myCarousel" 	:data-slide-to="index" 
			    								v-for="(img , index) in images"
			    								:class="{active: (index==0)}"></li>
		    </ol>

		    <!-- Wrapper for slides -->
		    <div class="carousel-inner"> 

		      <div class="item" :class="{active: index==0}" v-for="(img , index) in images" :key="index">
		        <img :src="'/img/uploads/'+img.img" alt="Los Angeles" style="width:100%;">
		        <div class="carousel-caption">
		         <!--  <h3></h3>
		          <p></p> -->
		        </div>
		      </div>

		    </div>

		    <!-- Left and right controls -->
		    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
		      <span class="glyphicon glyphicon-chevron-left"></span>
		      <span class="sr-only">Ետ</span>
		    </a>
		    <a class="right carousel-control" href="#myCarousel" data-slide="next">
		      <span class="glyphicon glyphicon-chevron-right"></span>
		      <span class="sr-only">Առաջ</span>
		    </a>
	  </div>
	</div>
</template>
<script>
    export default {
    	
        mounted() {
            //console.log(this.images)
        },
        props:{
        	images:Array,
        },
        computed:{
        	}


    }
</script>

<style module>

</style>