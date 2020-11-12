
import SiteNavBare from './components/NavBarSlide.vue';

const NavBarContent=new Vue({
	 mounted() {
	 	//console.log(this.urls);
        },
	el:'#navbarcontent',
	data:{
    	urls:[],
	},
	components:{
	    "site-nav-bar":SiteNavBare,
	},
	created:function(){
    	this.urls=Window.urls;
	}
})