import UserLookbookAlbom from './components/UserPhotosesioAlbom.vue';


const userlookbook = new Vue({
    el: '#lookbooks',
    data:{
    	lookbook:[]
    },
    created:function(){
    	this.lookbook=Window.lookbookimgdata
    },
	components:{
	    'lookbook-albom':UserLookbookAlbom	
 	},
 	methods:{
 	},
 	
   
});