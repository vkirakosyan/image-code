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
	      <tr v-for="(cotegory, index) in cotegorydata" >
	        <td>{{index+1}}</td>
	        <td><a v-bind:href="'/lookbook_category/'+cotegory.id">{{cotegory.name}}</a></td>
	        <td><a v-bind:href="'/lookbook/'+cotegory.id+'/edit'" class="btn btn-default">Ուղղել</a></td>
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
        props:['cotegorydata'],
         methods:{
           destroy:function(id){
             //console.log("delete")
                  axios.delete('/lookbook/'+id).then((response) => {
                                        var removeIndex=this.cotegorydata.map(function(event) { return event.id; }).indexOf(id);
                                        this.cotegorydata.splice(removeIndex, 1);
                                        console.log(response)
                                    }, (error) => {
                                        // error callback
                                    })
           }
        }


    }
</script>