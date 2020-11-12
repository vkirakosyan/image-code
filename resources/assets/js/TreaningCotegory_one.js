
import TreaningInCotegory from './components/training.vue';


const trainingcategory = new Vue({
    el: '#treaningcotegory',
    components:{
    	'treaning-in-cotegory':TreaningInCotegory
    },
    data:{
        treanings:[]
    },
    created:function(){
    	this.treanings=Window.trainingcategorydata;
    },

});