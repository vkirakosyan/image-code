import Albom from './components/Alboms.vue';

const UserPhotosesia = new Vue({
    el: '#alllookbook_cotegory',
     mounted() {
	 	//console.log(this.photosesiadata);
        },
    data:{
    	albom:[]
    },
    created:function(){
		this.albom = Window.albom.lookbook_category
		console.log('this.albom',this.albom)
    },
	components:{
	    'albom-img': Albom	
 	},
 	methods:{
 	},
 	
   
});