import lookbookimg from './components/lookbookimg.vue';
import EditLookbookCotegory from './components/EditLookbookCotegory.vue'; 


const lookbook = new Vue({
    el: '#lookbookdiv',
    data:{
    	lookbookdata:[],
    	lookbookimg:[],
    	isactive:false,
        lookbook_category:[],
        lookbook_category_data:[]
    },
    components:{
    	lookbookimg,
        'edit-lookbook-cotegory':EditLookbookCotegory
    },
    created:function(){
        this.lookbookdata=Window.lookbookdata;
        this.lookbook_category_data = Window.lookbook_category;
    	this.lookbookimg=Window.lookbookimgdata;
    	//console.log(this.lookbookimg);
    },
    methods:{
    	editimg:function(){
    		this.isactive=!this.isactive;
    		//console.log(this.isactive)
    	},
        selectCategory: function(e) {
            let cotegory = this.lookbookdata.filter(item=>{
               return item.id = e.target.value 
            })
            this.lookbook_category = cotegory.lookbook_category;
        }
    }
});
