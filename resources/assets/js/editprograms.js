
const editprogram=new Vue({
	el:'#editvideo',
	data:{
		isactiv:false
	},
	methods:{
		loadvideo:function (){
			this.isactiv=!this.isactiv;
		}

	}
})