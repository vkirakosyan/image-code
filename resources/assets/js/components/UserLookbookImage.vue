<template>
	<div class="row">
		<div class=" col-lg-3 col-md-3 col-sm-6 grid" v-for="(img, index) in images"
														:key="index"
														v-show="!active">
			<figure class="effect-ruby" >
				<img :src="'/img/uploads/'+img.img" alt="img.name"/>
				<figcaption @click="$_ShowPhoto(img.id)">
					<h2>{{img.name}}</h2>
					<p v-if="img.description">{{img.description}}</p>
				</figcaption>			
			</figure>
		</div>
		<big-images  	:url="images"
						:imageurl="imageurl"
						v-show="active"
						@closeimage="$_ClosBigImages"></big-images>
	</div>
</template>
<script>
import BigImage from './UserBigImagesAllDiplay.vue';
    export default {

        mounted() {

        },
        data:function(){
        		return{
        			imageurl:"",
        			active:false
        		}
        	},
        props:{
        	images:Array
        },
        methods:{
        	$_ShowPhoto:function(id){
        		this.photo=this.images.find(function(element) {
				  return element.id==id;
				});
				this.imageurl=this.photo.img;
				console.log(this.imageurl);
				this.active=true;
        	},
        	$_ClosBigImages:function(){
        		this.active=false;
        	},
        },
        components:{
        	'big-images':BigImage
        }


    }
</script>

<style module>

</style>