import UserTrainings from './components/UserTraining.vue';

const UserPhotosesia = new Vue({
    el: '#training',
    data:{
    	trainings:[]
    },
    created:function(){
    	this.trainings=Window.trainingdata
    },
	components:{
	    'training-user':UserTrainings	
 	},
 	methods:{
 	},
 	
   
});