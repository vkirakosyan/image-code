
import UserEvents from './components/UserPrograms.vue';

const NavBarContent=new Vue({
	 mounted() {
	 	
        },
	el:'#userevents',
	data:{
    	event:[],
	},
	components:{
	    "user-events":UserEvents,
	},
	methods:{

	},
    created:function(){
    	this.event=Window.eventsdata;
    	
	}
	
})