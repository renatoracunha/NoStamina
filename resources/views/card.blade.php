
<!DOCTYPE html>
<html>
<head>
	<title>noStamiNa</title>
	<!-- Meta tags Obrigatórias -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{ asset('css/app_styles.css')}}">
	<!-- JavaScript (Opcional) -->
	<!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
	<script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/popper.js') }}"></script>
	<script src="{{ asset('js/bootstrap.js') }}"></script>
	<script src="https://kit.fontawesome.com/8d24bc018e.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			loadPlayer($('#myList').val());
			if ("<?php echo $player_id?>">0) {
				loadPlayer("<?php echo $player_id?>");
			}
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
					$('#overall').html('<div id="outer">  <div id="overlay" style="width:'+(100-(data[0].media_votos*20))+'%"></div>  <div id="inner"></div></div>');
					$('#mvp').html(data[0].mvp);
					data[0].mensal=='T'?$('#member').html('Mensalista'):$('#member').html('Sem Vínculo');

				},error:function(e){
					alert('erro');
				}
			})
		}
	</script>

	
</head>
<body>
    
	<div id=Container> <!-- Container to hold everything -->

        <select id="myList" onchange="loadPlayer(this.value)"> <!-- Players option list -->
            @foreach ($players as $player)      
                <option @if ($player_id==$player->id) selected  @endif value="{{$player->id}}">{{$player->nome}}</option>
            @endforeach
		</select> 

		<div class="Badge" id="badgeElement" > </div> <!--element to hold players team badge -->


		<section id="bottomSection"> <!-- section for players info and stats -->
			

			<header>
				<span><span id="name" class="name_position"></span> 

				<br>

				<span id="member" class="name_position"><h1></h1></span> </span>
			</header>

			<br>
			<div style="background-image:{{asset('imagens/campo.png')}};">
				<span class="box"><span><p>Partidas Jogadas</p></span> <span id="appearances" class="data"></span> </span> 

				<br><br>
				<!-- data elements -->
				<span class="box"><span><p>Gols Marcados</p></span> <span id="goals" class="data"> <p> </p></span></span> <br><br>
				<span class="box"><span><p>Assistências</p></span> <span id="assists" class="data"><p>  </p></span></span> <br><br>
				<span class="box"><span><p>Nota</p></span> <span id="overall" class="data"><p>  </p></span></span><br> <br>
				<span class="box"><span><p>MVP's</p></span> <span id="mvp" class="data"><p></p> </span> </span>
			</div>

		</section>

	</div>




</body>
</html>