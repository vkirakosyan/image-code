
import services from './components/services.vue';
import editservices from './components/editservices.vue';

const cotegory_navbar = new Vue({
	el: '#cotegorydiv',
	data:{
		cotegorydata:[]
	},
	 components:{
    	services,
    	editservices
    },
	created:function(){
		this.cotegorydata=Window.category_obj;
		//console.log(this.cotegory_data);
	}
});