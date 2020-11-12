

import portfolioimg from './components/portfolio_img.vue';


const portfolioimgs = new Vue({
    el: '#portfolioimgs',
    components:{
    	portfolioimg
    },
    data:{
        team:[]
    },
    created:function(){
    	this.team=Window.teams;
    },

});