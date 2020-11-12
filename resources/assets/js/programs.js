import programs from './components/programs.vue';


const program=new Vue({
	el:'#programs',
	data:{
		video:[]
	},
	components:{
		programs
	},
	created:function (){
		this.video=Window.video;
	}
})