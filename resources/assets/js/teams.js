
import TeamCotegory from './components/TeamCotegory.vue';

const teams = new Vue({
    el: '#teambody',
    data:{
    	teams_c:[],
        teamscotegorydata:[]
    },
    components:{
        'team-cotegory':TeamCotegory
    },
    created:function(){
        this.teams_c=Window.teamscotegorydata;
    	this.teamscotegorydata=Window.teamscotegory;
    },
    methods:{
            deleteteam:function(id){
                console.log("delete")
                axios.delete('/team/'+id).then((response) => {
                                        var removeIndex=this.teams.map(function(team) { return team.id; }).indexOf(id);
                                        this.teams.splice(removeIndex, 1);
                                        console.log(response)
                                    }, (error) => {
                                        // error callback
                                    })
             }
        }
});
