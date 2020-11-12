<template>
	<div class="container">
		<div v-for="(service,index) in programsAll" class="row" :class="$style.servicebody">
			<div v-if="(index+2)%2==0" class="col-lg-6 col-md-6 col-sm-6 col-xs-12" :class="$style.images">  
				<img :src="'/img/uploads/'+service.img"
					 :alt="service.name" class="img-rounded" > 
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
				<div :style="{'text-align':((index)%2==0)? 'left':'right',
								left:	((index)%2==0)? ((service.status )? '0px':'400px') : ((service.status )? '0px':'-400px'),
								opacity:(service.status)? '1':'0'}" 
						:class="$style.description ">
					<h2>{{service.name}}</h2>
					<span>{{service.price}}</span>
					<span>{{service.valiut}}</span>
					<p>
						{{service.description}}
					</p>
					
				</div>
			</div>
			<div v-if="(index+2)%2!=0" class="col-lg-6 col-md-6 col-sm-6 col-xs-12" :class="$style.images"  > 
				<img :src="'/img/uploads/'+service.img"
					 :alt="service.name" class="img-rounded"  >
					 
			</div>
		</div>
	</div>
</template>
<script>
    export default {

        mounted() {
        	this.ScrolingPage;
        },
        data:function(){
        	return {
        		programsAll:[]
        	}
        },
        props:{
        	servicedata:Array
        },
        methods:{
        ScrolingPage: function() {
					var scroll=window.scrollY;
					var scrollElementSize=this.programsAll.length;
					var scrollElementSizeNext=100/this.programsAll.length;
		            var heightsize =(scroll/(document.documentElement.scrollHeight-window.innerHeight+100))*100;
		            if(this.programsAll[parseInt(heightsize/scrollElementSizeNext,10)]!=undefined){
		            	this.programsAll[parseInt(heightsize/scrollElementSizeNext,10)].status=true;
		            	for (var i=heightsize/scrollElementSizeNext+1;i<scrollElementSize;i++) {
		            		this.programsAll[parseInt(i,10)].status=false;
		            	}
		            }
	            },

        	},
        created:function(){
        	this.programsAll=this.servicedata.map(element=>{ return Object.assign({}, element, { status: false });});
        	document.addEventListener('scroll', this.ScrolingPage);
        },
        destroyed:function () {
			document.removeEventListener('scroll', this.ScrolingPage);
		},


    }
</script>

<style module>
	.images img{
		width:100%;
		height: auto;
		margin:0 auto;
	}
	.description{
		position: relative;
		opacity: 0;
		transition: all 0.5s ;
	}
	.servicebody{
		margin-top:40px;
		overflow: hidden;
	}
	@media only screen and (max-width: 767px) {
	    .servicebody{
	    	 display: flex; 
	    	 flex-direction: column;
	    }
	    .description{
	    	order:1;

	    }
	    .images{
	    	order:2;
	    }
	    .description h2,.description  span,.description p{
	    	text-align: center;
	    	display: block;
	    	width: 100%;
	    }
	    
	}

</style>

