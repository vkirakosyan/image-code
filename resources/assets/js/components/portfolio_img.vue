<template>
	<div>
    	 <div v-for="(img,index) in team.portfolio" v-bind:key="index" class="col-lg-2 col-md-3 col-sm-6">
    		<img :src="'/img/uploads/'+img.img"  :class="$style.imgrounded"  >
            <button v-on:click="destroy(img.id)">Ջնջել</button>
         </div>
     </div>
</template>
<script>
    export default {

        mounted() {
            //console.log('Component partfolio.')
        },
        props:['team'],
         methods:{
           destroy:function(id){
             console.log("delete")
                  axios.delete('/portfolio/'+id).then((response) => {
                                        var removeIndex=this.team.portfolio.map(function(team) { return team.id; }).indexOf(id);
                                        this.team.portfolio.splice(removeIndex, 1);
                                        console.log(response)
                                    }, (error) => {
                                        // error callback
                                    })
           }
        }


    }
</script>

<style module>
.imgrounded{
    width:100%;
}
</style>
