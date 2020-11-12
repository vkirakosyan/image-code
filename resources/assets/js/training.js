
import alltraining from './components/training.vue';
import cotegorytrainings from './components/CategoryTraining.vue';


const training = new Vue({
    el: '#training_content',
    components:{
    	'alltraining':alltraining,
      'category-training':cotegorytrainings
    },
    data:{
    	trainings:[],
        cotegorytraining:[]
    },
    created:function(){
    	this.trainings=Window.training;
        this.cotegorytraining=window.cotegorytraining
    }
});