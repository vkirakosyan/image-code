<template>
	<div class="container-fluid" > 
		<nav class="navbar navbar-default" :class="{fixetbar: scroled,dinamic: !scroled}">
			<div class="container-fluid" >

			    <div class="navbar-header">
					 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		              <span class="sr-only">Toggle navigation</span>
		              <span class="icon-bar"></span>
		              <span class="icon-bar"></span>
		              <span class="icon-bar"></span>
		            </button>
			      	<a class="navbar-brand" href="/"><span  style="float: left;"></span></a>
			     </div>
			      <div id="navbar" class="navbar-collapse collapse">
				     <ul class="nav navbar-nav text-center">
					    <li  v-for="(value, key) in urls[0]" style="z-index: 100" 
					   			 >
					    	<a v-if="!Array.isArray(value)" :href="value">{{key}}</a>
					    	<a v-if="Array.isArray(value)" class="dropdown-toggle" :data-toggle="(value[value.length-1]=='teams')?'':'dropdown'" :href="'/'+value[value.length-1]">{{key}}</a>
					        <ul class="dropdown-menu" v-if="Array.isArray(value)" >
					          <li><a :href="'/'+value[value.length-1]+'/'+menu.id" v-for="(menu, keys) in value" :key="keys">{{menu.name}}</a></li>
					        </ul>
					    </li>
				    </ul>
				    <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="getlocal" :class="getlocal"></span>{{lang}}<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a :href="'/lang/en'+page" class="language" rel="en"><span /></span>English</a></li>
                            <li><a :href="'/lang/ru'+page" class="language" rel="ru"><span /></span>Русский</a></li>
                            <li><a :href="'/lang/am'+page" class="language" rel="am"><span /></span>Հայերեն</a></li>
                        </ul>
                    </li>
                </ul>
				</div>
			</div>
		</nav>
	</div>
</template>
<script>
    export default {

        mounted() {
        	this.AnimatNavBar;
        },
        data:function(){
        		return {
        			scroled:false,
        			submenu:[],
        			page:""
        		}
        },
        props:['urls','sitname','view','lang','getlocal'],
        methods:{
        	AnimatNavBar: function(e) {
                this.scroled = ( window.scrollY > 105) ? true : false;
            },
            $_MenuOpen:function(){
      					var li = event.target.parentElement;
					  if(!li.classList.contains("open")){
					  	//console.log(!li.classList.contains("open"))
					  	li.classList.add("open");// @mouseover="$_MenuOpen"		    		
					  }
					  
            },
            $_MenuClose:function(){
					var li = event.target.parentElement;
					if(li.classList.contains("open")){
					  	li.classList.remove("open");//@mouseout="$_MenuClose"
					}
            }
        },
      
        created:function(){
        	this.page=window.location.pathname;
        	//console.log(this.page);
        	window.addEventListener('scroll', this.AnimatNavBar);
        },
        destroyed:function () {
		  window.removeEventListener('scroll', this.AnimatNavBar);
		},
		


    }
</script>

<style module>

.dropdown-toggle:hover .dropdown-menu{
    display: block;
}
.navbar-inverse{
	background-color: unset; 
    border-color: unset;

}
 a{
	color:#fff;
	font-family: 'TrajanPro3';
    font-size: 14px;
    line-height: 1;
    font-weight: 400;
    text-decoration: none;
}
 a:hover{
	color:#bf834f;
	transition: all 0.3s cubic-bezier(0.0, 0.0, 0.3, 1.0);
}
ul.dropdown-menu{
	background-color: unset; 
}



</style>