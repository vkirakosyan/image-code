<template>
    <div>
        <div class="card  col-lg-2 col-md-2 col-sm-3" v-for="(team, index) in teams" v-bind:key="index">
          <img class="card-img-top" v-bind:src="'/img/uploads/'+team.img" >
          <div class="card-body">
            <h5 class="card-title">{{team.name}}</h5>
            <h6 class="card-title">{{team.profession}}</h6>
            <p class="card-text">{{team.characteristics}}</p>
            <a v-bind:href="'/portfolio/'+team.id" class="btn btn-primary">Portfolio</a>
            <a v-bind:href="'/team/'+team.id+'/edit'" class="btn btn-primary">Ուղել</a>
            <input type="button" v-on:click="deleteteam(team.id)"  class="btn btn-primary" value="Ջնջել">
          </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
           // console.log(this.teams)
        },
        props:['teams'],
         methods:{
            deleteteam:function(id){
                console.log("delete")
                axios.delete('/team/'+id).then((response) => {
                                        var removeIndex=this.teams.map(function(team) { return team.id; }).indexOf(id);
                                        this.teams.splice(removeIndex, 1);
                                        console.log(response.data)
                                    }, (error) => {
                                        // error callback
                                    })
             }
        }


    }
</script>
<style modul>
    
</style>
