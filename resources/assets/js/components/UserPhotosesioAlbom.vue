<template>
	<div>
		<div v-show="!active" class="row" :class="$style.content">
		   	 <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 mt-2 grid" 
				v-for="(albom, index) in albomes" 
				:key="index"
				@click="$_ShowPhoto(albom.id)"
				:class="$style.albomecontent"  >
		    	<figure class="effect-lexi">
					<img :src="'/img/uploads/'+ (albom.img || albom.image)" :class="$style.images">
					<figcaption>						<p>{{albom.name}}</p>
					</figcaption>			
				</figure>
			</div>
		</div>
		<div  v-show="active">
			    <photo-view v-bind:images="photo"></photo-view>

			    <span class="glyphicon glyphicon-remove-circle"
			    		@click="active=false"
			    		:class="$style.closespan">
			    	
			    </span>
	    </div>
	</div>
</template>
<script>
import photosesia from './UserPhotosesio.vue';

    export default {

        mounted() {
        	//console.log(this.albomes);
        },
        data:function(){
        	return{
        		photo:[],
        		active:false

        	}
        },
        props:{
        	albomes:Array
        },
        components:{
        	'photo-view':photosesia
        },
        methods:{
        	$_ShowPhoto:function(id){
        		this.photo=this.albomes.find(function(element) {
				  return element.id==id;
				});
				this.photo=this.photo.photosesia;
				this.active=true;
        	}
        },
          

//
    }
</script>

<style module>
.content{
	margin-top:50px;

}
.albomecontent{
	min-height: 50px;
	border:1px #000 solid;
}
.images{
	width:100%;
}
.bigimagedisplay{
	width:100%;
	height: 100%;
}
.closespan{
	display: block;
	font-size: 34px;
	position: absolute;
    right: 10px;
    top: -40px;
}
</style>