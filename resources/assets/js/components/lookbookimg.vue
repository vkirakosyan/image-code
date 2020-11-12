<template>
	<div class="row">
		<div v-for="(img,index) in imgdata" v-bind:key="index" class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
			<img v-bind:src="'/img/uploads/'+img.img" width="100%">
			<h4>{{img.name}}</h4>
			<p>{{img.description}}</p>
			<button v-on:click="destroy(img.id)" class="btn btn-default" >Ջնջել</button>
       		<a class="btn btn-default" v-bind:href="'/lookbook_img/'+img.id+'/edit'">Ուղղել</a>
		</div>
	</div>
</template>

<script>
    export default {

        mounted() {
            //console.log(this.imgdata)
        },
        props:['imgdata'],
         methods:{
           destroy:function(id){
            // console.log("delete")
                  axios.delete('/lookbook_img/'+id).then((response) => {
                                        var removeIndex=this.imgdata.map(function(img) { return img.id; }).indexOf(id);
                                        this.imgdata.splice(removeIndex, 1);
                                        console.log(response)
                                    }, (error) => {
                                        // error callback
                                    })
           }
        }


    }
</script>