<template>
	<div class="container">
		<div v-for="(training,index) in trainingsAll" class="row" :class="$style.servicebody">
			<div  v-if="(index+2)%2==0" class="col-lg-6 col-md-6 col-sm-6 col-xs-12" :class="$style.imgstyle" >
				<img :src="'/img/uploads/'+training.img" style="width:100%">
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div :style="{'text-align':((index)%2==0)? 'left':'right',
								left:	((index)%2==0)? ((training.status )? '0px':'400px') : ((training.status )? '0px':'-400px'),
								opacity:(training.status)? '1':'0'}" 
						:class="$style.description " >
					<h2>{{training.name}}</h2>
					<h4>{{training.specificity}}</h4>
					<p>
						{{training.description}}
					</p>
					
				</div>
			</div>
			<div v-if="(index+2)%2!=0  " class="col-lg-6 col-md-6 col-sm-6 col-xs-12" :class="$style.imgstyle" >
				<img :src="'/img/uploads/'+training.img">
			</div>
		</div>
	</div>
</template>
<script>
    export default {

        mounted() {
        	//console.log(this.trainingsAll)
        },
        data:function (){
        	return {
        		trainingsAll:[]
        	}
        },
        props:['trainings']
        ,
        methods:{
        ScrolingPage: function() {
					var scroll=window.scrollY;
					var scrollElementSize=this.trainingsAll.length;
					var scrollElementSizeNext=100/this.trainingsAll.length;
		            var heightsize =(scroll/(document.documentElement.scrollHeight-window.innerHeight+100))*100;
		            if(this.trainingsAll[parseInt(heightsize/scrollElementSizeNext,10)]!=undefined){
		            	this.trainingsAll[parseInt(heightsize/scrollElementSizeNext,10)].status=true;
		            	for (var i=heightsize/scrollElementSizeNext+1;i<scrollElementSize;i++) {
		            		this.trainingsAll[parseInt(i,10)].status=false;
		            	}
		            }
	            },

        	},
        created:function(){
        	this.trainingsAll=this.trainings.map(element=>{ return Object.assign({}, element, { status: false });});
        	document.addEventListener('scroll', this.ScrolingPage);
        },
        destroyed:function () {
			document.removeEventListener('scroll', this.ScrolingPage);
		},


    }
</script>

<style module>

	.servicebody{
			margin-top:40px;
			overflow: hidden;
		}
	.servicebody img{
		width:100%;
	}
	.description{
		position: relative;
		opacity: 0;
		transition: all 0.5s ;
	}
	@media only screen and (max-width: 767px) {
	    .servicebody{
	    	margin-top:5px;
	    	 display: flex; 
	    	 flex-direction: column;
	    }
	    .description{
	    	order:1;

	    }
	    .imgstyle{
	    	order:2;
	    }
	    .description h2,.description h4,.description p{
	    	text-align: center;
	    }
	    
	}
</style>