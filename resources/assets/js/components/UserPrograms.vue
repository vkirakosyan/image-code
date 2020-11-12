<template>
	<div class="container">
		<div v-for="(program,index) in programsAll" :key="index" class="row"  :class="$style.servicestyle" >
			<div v-if="(index+2)%2==0" :class="$style.videostile" style="height:400px"  class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  >
				<div v-if="program.url=='no'" >
					<img :src="'/img/uploads/'+program.img">
				</div>
				<iframe v-else width="100%" height="100%"
					:src="'https://www.youtube.com/embed/'+program.url" >
				</iframe>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div 	:style="{'text-align':((index)%2==0)? 'left':'right',
								left:	((index)%2==0)? ((program.status )? '0px':'400px') : ((program.status )? '0px':'-400px'),
								opacity:(program.status)? '1':'0'}" 
						:class="$style.description " >
					<h2>{{program.name}}</h2>
					<p>
						{{program.description}}
					</p>
					
				</div>
			</div>
			<div v-if="(index+2)%2!=0"  :class="$style.videostile" style="height:400px" class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  >
				<div v-if="program.url=='no'"  >
					<img :src="'/img/uploads/'+program.img">
				</div>
				<iframe v-else width="100%" height="100%"
						:src="'https://www.youtube.com/embed/'+program.url" >
				</iframe>
			</div>
		</div>
	</div>
</template>
<script>
    export default {
        mounted() {
        },
        data:function (){
        	return{
        		programsAll:[]
        	}
        },
        props:{
        	programs:Array
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
        	this.programsAll=this.programs.map(element=>{ return Object.assign({}, element, { status: false });});
        	document.addEventListener('scroll', this.ScrolingPage);
        },
        destroyed:function () {
			document.removeEventListener('scroll', this.ScrolingPage);
		},


    }
</script>

<style module>
	.videostile img{
		width:100%;
		height: auto;
		margin:0 auto;
		height: 400px;
	}
	
	.servicestyle{
		margin-top:40px;
		overflow: hidden;
	}
	.description{
		position: relative;
		opacity: 0;
		transition: all 0.5s ;
	}
	
	
	
	@media only screen and (max-width: 767px) {
	    .servicestyle{
	    	 display: flex; 
	    	 flex-direction: column;
	    }
	    .description{
	    	order:1;
	    }
	    .videostile{
		    order:2;
			height: 200px;
	    }
	    .description h2,.description p{
	    	text-align: center;
	    }
	    
	}
</style>
<style>
.showanimate{
		display: block;
		opacity: 1;
		left: 0px;
	}
	
	
</style>
