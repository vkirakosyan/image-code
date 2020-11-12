import Photo from './components/UserPhotosesioAlbom.vue';

const UserPhotosesia = new Vue({
    el: '#photosesia',
     mounted() {
	 	//console.log(this.photosesiadata);
        },
    data:{
    	photosesiadata:[]
    },
    created:function(){
    	this.photosesiadata=Window.images
    },
	components:{
	    'photo-img':Photo	
 	},
 	methods:{
 	},
 	
   
});