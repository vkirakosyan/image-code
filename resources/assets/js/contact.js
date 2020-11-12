const contakt = new Vue({
    el: '#contactsdiv',
    data:{
    	contacts:[]
    },
    created:function(){
    	this.contacts=Window.contacts;
    },
     methods:{
           destroy:function(id){
             console.log("delete")
                  axios.delete('/contact/'+id).then((response) => {
                                        var removeIndex=this.contacts.map(function(contact) { return contact.id; }).indexOf(id);
                                        this.contacts.splice(removeIndex, 1);
                                        console.log(response)
                                    }, (error) => {
                                        // error callback
                                    })
           }
        }
});