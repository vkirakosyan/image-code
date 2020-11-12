import UserPrograms from './components/UserPrograms.vue';


const program=new Vue({
	el:'#programs',
	data:{
		programs:[],
		scroled:false
	},
	components:{
		'programs-view':UserPrograms
	},
	methods:{
		
	    
	    },
	created:function(){
		this.programs=Window.programs;
    },
   
})