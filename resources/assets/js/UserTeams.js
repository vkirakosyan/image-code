import UserTeams from './components/TeamView.vue';

const UserTeam=new Vue({
	 mounted() {
	 	//console.log(this.images)
        },
	el:'#teams',
	data:{
    	teams:[],
    	lang:Array
	},
	components:{
	    'teams-block':UserTeams
	},
	created:function(){
    	this.teams=Window.teamsData;
    	this.lang=Window.lang;
	},
	methods:{
		
	}
	
})