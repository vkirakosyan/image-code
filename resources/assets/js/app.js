
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import FooterContent from './components/footertemplate.vue';

const app = new Vue({
    el: '#app',
    data:{
    },
    created:function(){
    	
    },
	components:{
	    	
 	},
 	methods:{
 		
 	},
 	
   
});
const footer = new Vue({
    el: '#footerBar',
    data:{
    	scrol:100,
        contact:[],
        animat:false
    },
    created:function(){
    	this.contact=Window.contactdata;
        window.addEventListener('scroll', this.$_AnimatReturnTop);
    },
	components:{
	    	'footer-content':FooterContent
 	},
 	methods:{
        $_AnimatReturnTop:function (){

            this.animat=this.scroled = ( window.scrollY > 105) ? true : false;
        },
 		$_ReturnTop:function(){
            var next=parseInt(document.documentElement.scrollTop/100+50);
 			document.body.scrollTop = document.body.scrollTop-next; // For Safari
    		document.documentElement.scrollTop = document.documentElement.scrollTop-next; // For Chrome, Firefox, IE and Opera
           
             if(next<50){
              document.body.scrollTop=0; 
              document.documentElement.scrollTop=0; 
            }
            if(document.body.scrollTop!=0 || document.documentElement.scrollTop!=0){
                setTimeout(this.$_ReturnTop,10);
            }
 		}

 	},
    destroyed:function () {
          window.removeEventListener('scroll', this.$_AnimatReturnTop);
        },
 	
   
});
