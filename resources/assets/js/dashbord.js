import UserImages from './components/UserImages.vue';
import UserBigImagesAllDiplay from './components/UserBigImagesAllDiplay.vue';

const NavBarContent=new Vue({
	 mounted() {

            setTimeout(()=>{this.start=true;},1000);
        },
	el:'#dashbord',
	data:{
		showimagebig:false,
		view_1_image_text:false,
		view_2_image_text:false,
		images:[],
    	url:"",
        start:false,
        lang:[]
	},
	components:{
	    'user-images':UserImages,
    	'user-big-images-all-diplay': UserBigImagesAllDiplay
	},
	methods:{
		$_BigShowcallbac:function(url){
    		this.url=url;
    		this.showimagebig=true;
    	},
    	$_CloseImage:function(){
    		this.showimagebig=false;
    	},
    	$_AnimatText:function(event){
    		var scroll=window.scrollY;
            var heightsize =(scroll/document.documentElement.scrollHeight)*100;
    		if(37<heightsize){
    			this.view_1_image_text=true;
    		}
    		else{
    			this.view_1_image_text=false;
    		}

    		if(60<heightsize){
    			this.view_2_image_text=true;

    		}
    		else
    		{
    			this.view_2_image_text=false;
    		}
            //console.log((scroll/document.documentElement.scrollHeight)*100)
        }
       
	},
	created:function(){
        	window.addEventListener('scroll', this.$_AnimatText);
            this.lang=Window.lang;
        	this.images=Window.imagesUrl;
            
        },
    destroyed:function () {
	  window.removeEventListener('scroll', this.$_AnimatText);
	},
    beforeUpdate:function(){
        
    }
	
})