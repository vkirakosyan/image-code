<template>
	<div class="row">
		<div v-for="(videoone, index) in video" v-bind:key="index" class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
			<h3>{{videoone.name}}</h3>
			<iframe width="100%" height="auto"
				v-bind:src="'https://www.youtube.com/embed/'+videoone.url">
			</iframe>
			<p>{{videoone.description}}</p>
			<a v-bind:href="'/programs/'+videoone.id+'/edit'" class="btn btn-default">Ուղղել</a>
			<a v-on:click="destroy(videoone.id)" class="btn btn-default">Ջնջել</a>
		</div>
	</div>
</template>

<script>
    export default {

        mounted() {
            //console.log(this.imgdata)
        },
        props:['video'],
         methods:{
           destroy:function(id){
             console.log("delete")
                  axios.delete('/programs/'+id).then((response) => {
                                        var removeIndex=this.video.map(function(videoone) { return videoone.id; }).indexOf(id);
                                        this.video.splice(removeIndex, 1);
                                        console.log(response)
                                    }, (error) => {
                                        // error callback
                                    })
           }
        }


    }
</script>