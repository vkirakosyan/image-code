<template>
	<div>
	    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 mt-4" v-for="(team, index) in teams" :key="index">
	        <div class="card card-inverse card-info" :class="$style.teamsstyle">
	            <div class="card-block">
	                <figure class="profile profile-inline">
	                    <img :src="'/img/uploads/'+team.img" class="profile-avatar" :class="$style.avatar" :alt="team.name">
	                </figure>
	                <h4 class="card-title" :class="$style.cardname">{{team.name}}</h4>
	                <div class="card-text" :class="$style.cardtext">
	                	<span :class="$style.profesional">{{team.profession}}</span><br>
	                    
	                </div>
	            </div>
	            <div class="card-footer" :class="$style.footer">
	                <a  :href="'/portfolio_team/'+team.id"
	                	:class="$style.portfolio">{{lang.portfolio}}</a>
	            </div>
	        </div>
	    </div>
	</div>
</template>
<script>
    export default {

        mounted() {
        	console.log(this.lang);
        },
        props:{
        	teams:Array,
        	lang:Object
        },
        methods:{

        }


    }
</script>

<style module>
.teamsstyle{
	background-color: #fff;
	color:#737d80;
	font-size: 14px;
    font-weight: 400;
    line-height: 1.4;
    margin-top: 12px;
    transition: all .9s;
    

}.cardname{
	 padding: 15px;
	 font-family: 'TrajanPro3';
    font-size: 18px;
    font-weight: 700;
    line-height: 1.2;
	margin-top: 0px;
    margin-bottom: 0px;

}
.cardtext{
   /* height: 260px; */
    overflow: hidden;
    text-overflow:ellipsis;
    padding: 15px;
}
.teamsstyle:hover{
	background-color: #bf834f;
	color:#fff;
}
.avatar{
	width:100%;
}
.portfolio{
	text-decoration: none;
	font-size: 26px;
	color:#bf834f;
	border: 1px #737d80 solid;
    padding: 5px 10px;
    border-radius: 8px;
	
}
.teamsstyle:hover .portfolio{
	color:#fff;
} 
.portfolio:hover{
	color:#fff;
	text-decoration: none;
	border: 1px #fff solid;
	 box-shadow: 2px 2px 1px #737d80

}
.portfolio:visited:hover{
	background-color: #bf834f;
	color:#fff;
	border: 1px #fff solid;
}
.portfolio:visited{
	text-decoration: none;
	color:#737d80;
}
.footer{
	padding: 20px;
}
.profesional{
	display: block;
}
</style>