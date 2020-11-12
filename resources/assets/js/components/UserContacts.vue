<template>
	<div class="container">
		<div v-for="(contact,index) in contacts" class="row" :class="$style.contents">
			<div v-if="(index+2)%2==0 " class="col-lg-6 col-md-6 col-sm-6 col-xs-12" :class="$style.mapsstyle">
				 <iframe v-bind:src="contact.maps" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" :class="$style.description">
				<div >
					<address>
						<span class="glyphicon glyphicon-map-marker"></span><span class="pipe"></span><span class="mapsadress">{{contact.address}}</span><br>
						<span class="glyphicon glyphicon-earphone"></span><span class="pipe"></span><span class="phonyaddress">{{contact.phony}}</span><br>
						<span class="glyphicon glyphicon-phone-alt"></span><span class="pipe"></span><span class="phonyaddress">{{contact.phony_city}}</span><br>
						<span class="glyphicon vider"></span><span class="pipe"></span><span class="phonyaddress">{{contact.viber}}</span><br>
						<span class="glyphicon whatsapp"></span><span class="pipe"></span><span class="phonyaddress">{{contact.whatsapp}}</span><br>
						<span class="glyphicon glyphicon-envelope"></span><span class="pipe"></span><span class="emailaddress">{{contact.email}}</span><br>
						<span class="glyphicon glyphicon-envelope"></span><span class="pipe"></span><span class="emailaddress"><a :href="contact.facebook">Facebook</a></span><br>
						<span class="glyphicon glyphicon-envelope"></span><span class="pipe"></span><span class="emailaddress"><a :href="contact.instagram">Instagram</a></span><br>
						<span class="glyphicon glyphicon-envelope"></span><span class="pipe"></span><span class="emailaddress"><a :href="contact.telegram">Telegram</a></span><br>
					</address>
					
				</div>
			</div>
			<div v-if="(index+2)%2!=0" class="col-lg-6 col-md-6 col-sm-6 col-xs-12" :class="$style.mapsstyle" >
				 <iframe v-bind:src="contact.maps" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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

        	}
        },
        props:{
        	contacts:Array
        },
        methods:{
        	
        }


    }
</script>

<style module>
	.contents{
		margin-top: 40px;
	}

	@media only screen and (max-width: 767px) {
	    .contents{
	    	 display: flex; 
	    	 flex-direction: column;
	    }
	    .description{
	    	order:1;
	    }
	    .mapsstyle{
	    	order:2;
	    }
	}

</style>
<style type="text/css">
	span.vider,span.whatsapp{
		background-size: 15px 15px;
		width:15px;
     	height: 15px;
     	display: inline-block;
	}
	span.vider{
		background-image: url("/img/viber-icon.png");

    }
    span.whatsapp{
     	
		background-image: url("/img/Whatsapp.png");
    }
</style>

