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
	      <tr v-for="(cotegory, index) in cotegoryteam" >
	        <td>{{index+1}}</td>
	        <td><a :href="'/team_category/'+cotegory.id">{{cotegory.name}}</a></td>
	        <td><a :href="'/team_category/'+cotegory.id+'/edit'" class="btn btn-default">Ուղղել</a></td>
	        <td><a v-on:click="destroy(cotegory.id)" class="btn btn-default">Ջնջել</a></td>
	      </tr>
	  </tbody>
	</table>
	</div>
</template>
<script>
    export default {

        mounted() {
        	//console.log(this.cotegoryteam);
        },
        props:['cotegoryteam'],
         methods:{
           destroy:function(id){
             console.log("delete")
                  axios.delete('/team_category/'+id).then((response) => {
                                        var removeIndex=this.cotegoryteam.map(function(event) { return event.id; }).indexOf(id);
                                        this.cotegoryteam.splice(removeIndex, 1);
                                        console.log(response)
                                    }, (error) => {
                                        // error callback
                                    })
           }
        }


    }
</script>