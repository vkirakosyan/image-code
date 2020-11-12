<template>
	<div>
	  <table class="table table-hover">
	    <thead>
	      <tr>
	        <th>N</th>
	        <th>Անուն</th>
	        <th></th>
	        <th></th>
	      </tr>
	    </thead>
	    <tbody>
	      <tr v-for="(cotegory, index) in cotegorytraining" >
	        <td>{{index+1}}</td>
	        <td><a :href="'/training_category/'+cotegory.id">{{cotegory.name}}</a></td>
	        <td><a v-bind:href="'/training_category/'+cotegory.id+'/edit'" class="btn btn-default">Ուղղել</a></td>
	        <td><a v-on:click="destroy(cotegory.id)" class="btn btn-default">Ջնջել</a></td>
	      </tr>
	  </tbody>
	</table>
	</div>
</template>
<script>
    export default {

        mounted() {
        },
        props:['cotegorytraining'],
         methods:{
           destroy:function(id){
             console.log("delete")
                  axios.delete('/cotegory/'+id).then((response) => {
                                        var removeIndex=this.cotegorytraining.map(function(event) { return event.id; }).indexOf(id);
                                        this.cotegorytraining.splice(removeIndex, 1);
                                        console.log(response)
                                    }, (error) => {
                                        // error callback
                                    })
           }
        }


    }
</script>