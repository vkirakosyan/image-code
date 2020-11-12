
import events from './components/event.vue';

const allevents= new Vue({
	el:'#events',
	data:{
		isprevious:false,
		eventsdata:[],
		eventsprevious:[],
		previousevents:false
	},
	components:{
		events
	},
	created:function(){
		this.eventsdata=Window.eventsdata;
		this.eventsprevious=Window.eventsprevious;
	},
	methods:{
		previouschenge:function(){

		}
	},
})