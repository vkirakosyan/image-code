<template>
	<div class="wrapper row">
		<div 	:class="$style.parent" 
				class="col-lg-3 col-md-3 col-sm-6 col-xs-12" 
				v-for="(url, index ) in images"
				:key="index">

		 	<div :class="$style.child" >
                  <img :src="'/img/uploads/'+url.img" 
                        :class="$style.childimg" 
                        class="img-thumbnail">
		 	</div>
		 	<div :class="$style.textdiv">
			 	<h2 :class="$style.textimages" >{{url.name}}</h2>
			 	<span :class="$style.textimages" >{{url.description}}</span>
			</div>
		</div>
	</div>
</template>
<script>
    export default {

        mounted() {
        },
        props:{
        	images:Array
        },
        methods:{
        }


    }
</script>

<style module>



.wrapper {
    text-align: center;
    margin-left: auto;
    margin-right: auto;
}


/* Image zoom on hover + Overlay colour */
.parent {
    height: 450px;
    overflow: hidden;
    position: relative;
    float: left;
    display: inline-block;
    cursor: pointer;
    

}

.child {
    height: 100%;
    width: 100%;
    background-size: cover;
    background-repeat: no-repeat;
    -webkit-transition: all .5s;
    -moz-transition: all .5s;
    -o-transition: all .5s;
    transition: all .5s;
}



.parent:hover .child, .parent:focus .child {
    -ms-transform: scale(1.2);
    -moz-transform: scale(1.2);
    -webkit-transform: scale(1.2);
    -o-transform: scale(1.2);
    transform: scale(1.2);
      
}
@keyframes textanimation {
    from {bottom: -40px;opacity: 0;}
    to {bottom: 40px;opacity: 1;}
}
.parent:hover .child:before, .parent:focus .child:before {
    display: block;
    
}

.parent:hover .textdiv, .parent:focus .textdiv {
    display: block;
	animation-name: textanimation;
    animation-duration: .5s;
    bottom: 40px;
    opacity: 1;
}
@keyframes childanimat {
    from {opacity: 0;}
    to {opacity: 1;}
}
.child:before {
    content: "";
    display: none;
    height: 100%;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    background-color: #bf834f;
   animation-name: childanimat;
    animation-duration: .5s;

}

 /*Media Queries */
/*@media screen and (max-width: 960px) {
    
}*/
.childimg{
    width:100%;
}
.textdiv{
	display: none;
    position: absolute;
    bottom: -30px;
    color:#fff;

}
.textdiv span{
	font-family: 'Tunga-Bold'!important;
    text-transform: uppercase;
}
.textdiv h2{
	font-family: 'TrajanPro3';
    font-weight: 400;
    line-height: 1.2;
    margin:0px;
}

</style>