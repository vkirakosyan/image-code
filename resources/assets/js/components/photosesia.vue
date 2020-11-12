<template>
	<div>
	 <div v-for="(img,index) in photo" v-bind:key="index" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<img v-bind:src="'/img/uploads/'+img.img"  class=" img-rounded" style="width:100%">
        <h3>{{img.name}}</h3>
        <p>{{img.description}}</p>
        <button v-on:click="destroy(img.id)" class="btn btn-default" >Ջնջել</button>
        <a class="btn btn-default" v-bind:href="edit_photo+img.id+'/edit'">Ուղղել</a>
     </div>
 </div>
</template>
<script>
    export default {

        mounted() {
            console.log('Component photosesia.')
        },
        props:['photo', 'edit_photo'],
         methods:{
           destroy:function(id){
             console.log("delete")
                  axios.delete(edit_photo+id).then((response) => {
                                        var removeIndex=this.photo.map(function(img) { return img.id; }).indexOf(id);
                                        this.photo.splice(removeIndex, 1);
                                        console.log(response)
                                    }, (error) => {
                                        // error callback
                                    })
           }
        }


    }
</script>