<template>
	<div class="container-fluid " :class="$style.iconsData">
		<div class="col-lg-6 col-md-6 col-sm-5 col-xs-5">
			<all-icons :address="addresslink"></all-icons>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-7 col-xs-7 " :class="$style.address_pony">
			<span>{{addresslink[0] && addresslink[0].phony}}</span>
			<span>{{addresslink[0] && addresslink[0].address}}</span>
		</div>
	</div>
</template>

<script>
	import IconsData from './icons.vue';

	export default {
	        mounted() {
	           //console.log(this.addresslink)
	        },
	        components:{
	        	'all-icons':IconsData
	        },
	       
		     data:function (){
		     	return{
		     		
		     	}
		     },
		     props:{
		     	phone:"",
		     	address:"",
		     	addresslink:Array
		     }
		}
</script>
<style module>
.iconsData span{
	color:#fff;
	font-size: 1.2vw;
	display: block;
}
.address_pony{
	text-align: right;
	padding-right: 40px;
}
.iconsData{
	padding-top: 1vw;

}
@media only screen and (max-width: 767px) {
	.iconsData{
		padding-top: 2px;
		height:80px;
	}
	.iconsData span{
	    font-size: 12px;
	}
}

</style>
<style>
@media only screen and (max-width: 767px) {
	footer{
		height:80px;
	}
}
</style>