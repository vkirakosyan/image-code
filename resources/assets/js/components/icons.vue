<template>
	<div class="href_class row container" :class="$style.iconsstyle">
		<a :href="address[0] && address[0].facebook" ><img src="/img/fb-art.png" ></a>
		<a :href="address[0] && address[0].vk"  ><img src="/img/vk-icon-png-18.png" ></a>
		<a :href="address[0] && address[0].instagram" ><img src="/img/ig-logo-email.png" ></a>
		<a :href="address[0] && address[0].twiter" ><img src="/img/twitter.png" ></a>
		<a :href="address[0] && address[0].telegram" ><img src="/img/telegram.png" ></a>
	</div>
</template>

<script>
	
	export default {
	        mounted() {
	           //console.log(this.address)
	        },
	       props:{
	       	address:Array
	       },
		     data:function (){
		     	return{
		     		
		     	}
		     }
		}
</script>
<style module>
.iconsstyle img{
	width: 1.5vw;
	height: auto;
	border-radius: 3px;
	box-shadow: 0 3px 3px rgba(28, 26, 47, 1);
	transition: border-radius 0.3s,box-shadow 0.3s;
}

.iconsstyle{
	margin-top: 0.4vw;
}
.iconsstyle a{
	overflow: hidden;
	width:1vw;
	height: 1vw;

}
.iconsstyle img:hover{
	border-radius: 10px;
	box-shadow: 0 0px 3px rgba(28, 26, 47, 1);
	cursor: pointer;

}
@media only screen and (max-width: 767px) {
	.iconsstyle{
		margin-top: 2px;
		height: auto;
	}
	.iconsstyle img{
		width: 2.5vw;
	}
	.iconsstyle a{
		width:2vw;
		height: 2vw;
	}
	.iconsstyle img{
		width:2.5vw;
	}
}

</style>