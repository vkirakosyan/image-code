import PortfolioData from './components/UserTeamsSlider.vue';

const Portfolio = new Vue({
	el: '#portfolio',
	data:{
		team:[],
		lang:[]
	},
	 components:{
    	'portfolio-img':PortfolioData
    },
	created:function(){
		this.team=Window.teamdata;
		this.lang=Window.lang;
	}
});