import UserContacts from './components/UserContacts.vue';

const Contacts=new Vue({
	 mounted() {
	 	//console.log(this.contacts);
        },
	el:'#usercontacts',
	data:{
    	contacts:[],
	},
	components:{
	    "user-contact":UserContacts,
	},
	created:function(){
    	this.contacts=Window.contactdata;
	}
})