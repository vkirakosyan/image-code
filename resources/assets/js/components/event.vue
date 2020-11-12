<template>

	<div class="row">
		<div v-for="(event , index) in eventsdata" v-bind:key="index"  class="col-lg-3 col-md-4 col-sm-6 events">
			<h3>{{event.name}}</h3>
			<img v-bind:src="'/img/uploads/'+event.img" v-if="event.previous=='show'"  style="width: 100%;">
			<iframe width="100%" height="315"
				v-bind:src="'https://www.youtube.com/embed/'+event.url"
				v-else >
			</iframe>
			<p>{{event.description}}</p>
			<a v-bind:href="'/events/'+event.id+'/edit'" class="btn btn-default" >Ուղղել</a>
			<a v-on:click="destroy(event.id)" class="btn btn-default" >Ջնջել</a>
		</div>
	</div>
</template>

<script>
    export default {

        mounted() {
        },
        props:['eventsdata'],
         methods:{
           destroy:function(id){
             console.log("delete "+id)
                  axios.delete('/events/'+id).then((response) => {
                                        var removeIndex=this.eventsdata.map(function(event) { return event.id; }).indexOf(id);
                                        this.eventsdata.splice(removeIndex, 1);
                                        console.log(response)
                                    }, (error) => {
                                        // error callback
                                    })
           }
        }


    }
</script>