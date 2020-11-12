<template>
	<div class="container-fluid " :class="$style.albomconteyner">
		<div v-show="!active">
		    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 mt-2" 
			v-for="(albom, index) in albomes" 
			:key="index"
			:class="$style.albomecontent"
			@click="$_ShowPhoto(albom.id)" >
		    	<img :src="'/img/uploads/'+(albom.img || albom.image)" :class="$style.images">
		    	<h3>{{albom.name}}</h3>
		    	<a :href="edit_url+albom.id+'/edit/'" class="btn btn-defalut">Ուղղել</a>
		    	<a href="#"  class="btn btn-defalut"
		    										@click="destroy(albom.id)"
		    										>Ջնջել</a>
		    </div>
	    </div>
	    <div 	:class="$style.bigimagedisplay"
	    		v-show="active">
		    <photo-view v-bind:photo="photo" :edit_photo="photo_edit_url">
		    </photo-view>
		    <span class="glyphicon glyphicon-remove-circle"
		    		@click="active=false"
		    		:class="$style.closespan">
		    	
		    </span>
	    </div>
	</div>
</template>
<script>
import photosesia from './photosesia.vue';

    export default {

        mounted() {
        },
        data:function(){
        	return{
        		photo:[],
        		active:false

        	}
        },    
        props:{
			albomes:Array,
			edit_url:String,
			delete_url:String,
			photo_edit_url:String
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
        	},
        	destroy:function(id){
             console.log("delete")
                  axios.delete(delete_url+id).then((response) => {
                                        var removeIndex=this.albomes.map(function(img) { return img.id; }).indexOf(id);
                                        this.albomes.splice(removeIndex, 1);
                                        this.photo=this.albomes.find(function(element) {
										  return element.id==id;
										});
										this.photo=[];
                                        console.log(response)
                                    }, (error) => {
                                        // error callback
                                    })
           }
        },
          


    }
</script>

<style module>
.albomecontent{
	min-height: 50px;
	border:1px #000 solid;
	cursor: pointer;
	margin-right:10px;
}
.images{
	width:100%;
}
.bigimagedisplay{
	width:100%;
	height: 100%;
}
.closespan{
	font-size: 34px;
	position: absolute;
	cursor: pointer;
	right: 5px;
	top:-30px;
}
.albomconteyner{
	position:relative;
}
</style>