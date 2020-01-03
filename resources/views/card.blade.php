
<!DOCTYPE html>
<html>
<head>
	<title>noStamiNa</title>
	<!-- Meta tags Obrigatórias -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css')}} ?>">
	<!-- JavaScript (Opcional) -->
	<!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
	<script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/popper.js') }}"></script>
	<script src="{{ asset('js/bootstrap.js') }}"></script>
	<script src="https://kit.fontawesome.com/8d24bc018e.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			loadPlayer($('#myList').val());
			
		});
		

		function loadPlayer(player_id){
			$.ajax({
				url: "{{ route('ajax_get_profile') }}",
				dataType:"json",
				type:"get",
				data:{player_id:player_id},
				cache:false,
				success:function(data){
					
					$('#Container').css({"background-image": "url(/imagens/profile_pictures/"+data[0].img+")", "background-repeat": "no-repeat","background-size": "100% 50%"});
					$('#name').html(data[0].nome);
					$('#goals').html(data[0].gols);
					$('#assists').html(data[0].assistencias);
					$('#appearances').html(data[0].partidas);
					//$('#overall').html(data.ratings+' / 5');
					$('#overall').html('<div class="star-ratings-sprite"><span style="width:50%" class="star-ratings-sprite-rating"></span></div>');
					$('#mvp').html(data[0].mvp);
					data[0].mensal=='T'?$('#member').html('Mensalista'):$('#member').html('Sem Vínculo');

				},error:function(e){
					alert('erro');
				}
			})
		}
	</script>

	<style type="text/css">

		.star-ratings-sprite {
			background: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/2605/star-rating-sprite.png") repeat-x;
			font-size: 0;
			height: 21px;
			line-height: 0;
			overflow: hidden;
			text-indent: -999em;
			width: 110px;
			margin: 0 auto;

			&-rating {
				background: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/2605/star-rating-sprite.png") repeat-x;
				background-position: 0 100%;
				float: left;
				height: 21px;
				display:block;
			}

		}

		/* HTML5 display-role reset for older browsers */
		article, aside, details, figcaption, figure, 
		footer, header, hgroup, menu, nav, section {
			display: block;
		}
		body {
			line-height: 1;
		}
		ol, ul {
			list-style: none;
		}
		blockquote, q {
			quotes: none;
		} 
		blockquote:before, blockquote:after,
		q:before, q:after {
			content: '';
			content: none;
		}
		table {
			border-collapse: collapse;
			border-spacing: 0;
		}

		/*-----------------------------------------------*/
/* CSS RESET SHEET TO FACILIATE CROSS BROWSER COMPATIBILITY
/*-----------------------------------------------*/

body{
	/* Apply univerasl font to the body and a BG colour */
	font-family:arial;
	background-color: black;

}


#Container{
	position:relative; /*position the container relative so its child elements can have absolute positioning */
	/*Specifiy dimensions of the app */
	height:700px;
	width:100%;
    max-width: 500px;
	top:20px;
	box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23); /*apply showdow with RGBA values to the whole app */
	margin: 0 auto; /*center entire app */ 
}


#myList {
	position:absolute;
	top:12px;
	height:7%;
	width: 90%;
	left: 0;  right: 0; /*player dropdown list is centered*/
	margin: auto; /*player dropdown list is centered*/
	background-color:rgba(234, 234, 234, 1);  
}

/*------*/
/* BADGE 
/*------*/
.Badge{
	position:absolute;
	width:70px;
	height:70px;
	right:13px;
	top:43%;
	background-image:  url(https://upload.wikimedia.org/wikipedia/pt/thumb/b/bb/Ibis_Sport_Club.svg/1200px-Ibis_Sport_Club.svg.png);
	background-repeat: no-repeat;
	background-size: 100% 100% ;
	border-radius:50px;
}



/*------*/
/* BADGE 
/*------*/


/*dimenstions and positioning for the players info and stats section at the bottom */
#bottomSection{
	position:absolute;
	top:50%;
	width:100%; /*100% of containers width*/ 
	height:50%; /*50% of containers height*/ 
	z-index:-1000 !important;
	background-color:rgba(236, 0, 79, 1);

}

/*Style players name and position text */
.name_position{
	position:absolute;
	left: 10px; 
	top:15px;
	color:rgba(251, 219, 227, 1);

}

/*Style just players merbership status text */
#member{
	top:40px;
	font-size:12px;
}

/*Style the players data */
.box{
	position:absolute;
	padding:9px;
	left: 10px;  right: 10px;
	margin-top:15%;
	background-color:rgba(234, 234, 234, 1);
	color:rgba(92, 57, 96, 1);  
	font-size:12px;
}

/*Style the players data on right side of the app */ 
.data{
	position:absolute;
	right:4%;
	top:10px;
	font-weight:bold;
	color:rgba(57, 0, 61, 1);
}

</style>
</head>
<body>
    
	<div id=Container> <!-- Container to hold everything -->

        <select id="myList" onchange="loadPlayer(this.value)"> <!-- Players option list -->
            @foreach ($players as $player)      
                <option  value="{{$player->id}}">{{$player->nome}}</option>
            @endforeach
		</select> 

		<div class="Badge" id="badgeElement" > </div> <!--element to hold players team badge -->


		<section id="bottomSection"> <!-- section for players info and stats -->
			<!-- Toby's stats are default -->

			<header>
				<span><span id="name" class="name_position"></span> 

				<br>

				<span id="member" class="name_position"><h1></h1></span> </span>
			</header>

			<br>

			<span class="box"><span><p>Partidas Jogadas</p></span> <span id="appearances" class="data"></span> </span> 

			<br><br>
			<!-- data elements -->
			<span class="box"><span><p>Gols Marcados</p></span> <span id="goals" class="data"> <p> </p></span></span> <br><br>
			<span class="box"><span><p>Assistências</p></span> <span id="assists" class="data"><p>  </p></span></span> <br><br>
			<span class="box"><span><p>Nota</p></span> <span id="overall" class="data"><p>  </p></span></span><br> <br>
			<span class="box"><span><p>MVP's</p></span> <span id="mvp" class="data"><p></p> </span> </span>


		</section>

	</div>




</body>
</html>