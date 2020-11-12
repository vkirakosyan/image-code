<template>
	<div class="row" :class="$style.content">
		<div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12 grid" v-for="(img, index) in images"
														:key="index"
														v-show="activeComponent">
			<figure class="effect-jazz"
                        @click="$_EnterImages(img.img)"
                        >
				<img :src="'/img/uploads/'+img.img" alt="img.name" style="width:100%;" 
											
											/>
				<figcaption>
					<h2>{{img.name}}</h2>
					<p>{{img.description}}</p>
				</figcaption>			
			</figure>
		</div>
		<big-image-slider  	:url="images"
							:imageurl="url"
							@closeimage="$_ClosBigImages"
							v-show="!activeComponent"></big-image-slider>
	</div>
</template>
<script>
	import BigImage from './UserBigImagesAllDiplay.vue';
    export default {

        mounted() {
        	
        },
        data:function(){
        	return{
        		activeComponent:true,
        		url:""
        	}
        },
        props:{
        	images:Array
        },
        methods:{
        	$_ClosBigImages:function(){
        		this.activeComponent=true;
        	},
        	$_EnterImages:function(url){
        		this.url=url;
        		this.activeComponent=false;
        	},
        },
        components:{
        	'big-image-slider':BigImage
        }


    }
</script>
<style module>
.content{
    margin-top:50px;
}
</style>
<style>
.slide-fade-enter-grid {
  transition: all .3s ease;
}
.slide-fade-leave-grid {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active до версии 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}

</style>