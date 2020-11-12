<template>
    <div class="row">
        <div class="card  " >
          <img class="card-img-top team_portfolio" v-bind:src="'/img/uploads/'+team.img" >
          <div class="card-body">
            <h5 class="card-title">{{team.name_en}}</h5>
            <h5 class="card-title">{{team.name_ru}}</h5>
            <h5 class="card-title">{{team.name_am}}</h5>
            <p class="card-text">{{team.characteristics_en}}</p>
            <p class="card-text">{{team.characteristics_ru}}</p>
            <p class="card-text">{{team.characteristics_am}}</p>
          </div>
        </div>
        <div >
         <portfolioimg class="container-fluid" v-bind:team="team"></portfolioimg>
       </div>
    </div>
</template>

<script>
    import portfolioimg from './portfolio_img.vue';
    export default {
        mounted() {
        },
        components:{
            portfolioimg
        },
        props:['team'],
         methods:{
           destroy:function(id){
             console.log("delete")
                  axios.delete('/portfolio/'+id).then((response) => {
                                        var removeIndex=this.team.map(function(team) { return team.id; }).indexOf(id);
                                        this.team.splice(removeIndex, 1);
                                        console.log(response)
                                    }, (error) => {
                                        // error callback
                                    })
           }
        }


    }
</script>
