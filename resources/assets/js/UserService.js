import ServiceView  from './components/ServiceView.vue';




const Service = new Vue({
    el: '#servises',
    data:{
    	servicedata:[]
    },
    created:function(){
    	this.servicedata=Window.categorydata;
    	// console.log(this.servicedata)
    },
	components:{
	    	'service-view':ServiceView
 	},
 	methods:{
 	},
 	
   
});