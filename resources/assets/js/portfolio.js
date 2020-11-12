

Vue.component('teamsone', require('./components/teamone.vue'));

const teams = new Vue({
    el: '#team',
    data:{
    	team:[]
    },
     methods:{
          
        },
    created:function(){
    	this.team=Window.portfolio;
    }
});

const forms = new Vue({
    el: '#addportfolio',
    data:{
    	team:[]
    },
    created:function(){
    	this.team=Window.portfolio;
    }
});
 


 