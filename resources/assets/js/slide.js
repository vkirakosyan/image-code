
const slide=new Vue({
	el:'#imagesdiv',
	methods:{
        destroy:function(imageId){
            axios.delete('/slide/'+imageId)
            .then((response) => {
                   location.reload();
                }, (error) => {
                    // error callback
                })
        },

        deletetImage:function(id){

            axios.delete('/training/'+id)
                .then((response) => {
                        var removeIndex=this.trainings.map(function(training) { return training.id; }).indexOf(id);
                        this.trainings.splice(removeIndex, 1);
                    }, (error) => {
                        // error callback
                    })
         }
    }
})