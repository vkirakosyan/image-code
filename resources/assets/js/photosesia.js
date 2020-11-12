import Albomedata from './components/Alboms.vue';

const photosesiadiv = new Vue({
    el: '#photos',
    data:{
    	albomes:[],
        editAlbom:false
    },
    components:{
    	'albomes-data':Albomedata
    },
    created:function(){
    	this.albomes=Window.photos;
    }
});