  
import TeamInCotegory from './components/team.vue';

const trainingcategory = new Vue({
    el: '#teamcotegory',
    components:{
    	'team-in-cotegory':TeamInCotegory
    },
    data:{
        teamscotegorydata:[]
    },
    created:function(){
    	this.teamscotegorydata=Window.teamcotegory; 
    },

});