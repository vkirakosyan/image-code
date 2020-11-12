<template>
	<div>
		<div v-for="(training,index) in trainings" v-bind:key="index" class=" col-lg-2 col-md-3 col-sm-6 col-xs-12">
			<h3>{{training.name}}</h3>
			<h4>{{training.specificity}}</h4>
			<img v-bind:src="'/img/uploads/'+training.img" style="width:100%">
			<p>{{training.description}}</p>
			<input type="button" v-on:click="deletetraining(training.id)"  class="btn btn-primary" value="Ջնջել">
            <a v-bind:href="'/training/'+training.id+'/edit'"   class="btn btn-primary" >Ուղղել</a>
		</div>
	</div>
</template>

<script>
    export default {
        mounted() {
            //console.log('Component training.')
        },
        props:['trainings'],
         methods:{
            deletetraining:function(id){
                console.log("delete")
                axios.delete('/training/'+id).then((response) => {
                                        var removeIndex=this.trainings.map(function(training) { return training.id; }).indexOf(id);
                                        this.trainings.splice(removeIndex, 1);
                                        console.log(response.data)
                                    }, (error) => {
                                        // error callback
                                    })
             }
        }


    }
</script>