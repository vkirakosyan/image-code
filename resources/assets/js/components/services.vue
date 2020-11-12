<template>
	<div id="" class="row" >
		<div v-for="(service,index) in servisesdata" v-bind:key="index" class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
			<h3>{{service.name}}</h3>
			<span>գինը {{service.price}}</span>
            <span>{{service.valiut}}</span>
			<!-- <p>{{service.description}}</p> -->
			<!-- <img v-bind:src="'/img/uploads/'+service.img" :class="$style.images"> -->
			<a href="#" v-on:click="destroy(service.id)" class="btn btn-default" >Ջնջել</a>
			<a v-bind:href="'/servises/'+service.id+'/edit'" class="btn btn-default" >Ուղղել</a>
		</div>
	</div>
</template>
<script>
    export default {

        mounted() {
            //console.log('Component services.')
        },
        props:['servisesdata'],
         methods:{
           destroy:function(id){
             console.log("delete")
                  axios.delete('/servises/'+id).then((response) => {
                                        var removeIndex=this.servisesdata.map(function(service) { return service.id; }).indexOf(id);
                                        this.servisesdata.splice(removeIndex, 1);
                                        console.log(response)
                                    }, (error) => {
                                        // error callback
                                    })
           }
        }


    }
</script>

<style module>

.images{
    width:100%;
}
</style>