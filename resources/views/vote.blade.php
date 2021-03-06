
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
			loadPlayers();
		});
        
        function loadDataInApp(value){
			if(value.id!=1)//trocar para a session ID
			{
				value.img = "{{asset('imagens/profile_pictures')}}/"+value.img;
            
				var lines = '';
				lines+='<tr style="border-spacing: 5em;" >';
					lines+='<td onclick="goto_player_card('+value.id+')">';
						lines+='<img style="max-width:100px;max-heigth:100px;" src="'+value.img+'")}}">';
					lines+='</td>';
					lines+='<td>';
						lines+=value.nome;
					lines+='</td>';
					if(!value.has_been_rated)
					{
						lines+='<td>';
							lines+='<select onchange="set_rating(this.value,'+value.id+')">';
								lines+='<option value="1">1</option>';
								lines+='<option value="2">2</option>';
								lines+='<option value="3">3</option>';
								lines+='<option value="4">4</option>';
								lines+='<option value="5">5</option>';
							lines+='</select>';
						lines+='</td>';
					}
					else
					{
						lines+='<td>';
						lines+=parseInt(value.has_been_rated);
						lines+='</td>';
					}
				lines+='</tr>'; 
				
				return lines;
			}
        }

		function loadPlayers(){
            $('#players_table tbody').html('');
            $('#players_table tbody').append('<td colspan="3"><center><div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></center></td>');
			$.ajax({
				url: "{{ route('ajax_get_players') }}",
				dataType:"json",
				type:"get",
				cache:false,
				success:function(data){
                    var lines = '';
                    $.each(data,function(index,value){
                        lines+= loadDataInApp(value);
                    });
                    
                    if (lines) {
                        $("#players_table tbody").html('');
                        $("#players_table tbody").append(lines);
                    }else{
                        alert('não há jogadores cadastrados');
                    }
				},error:function(e){
					alert('erro');
				}
			})
		}
		function set_rating(rating,voted_player){
			let voting_player = 1;//temporario enquanto n tem a session
			$.ajax({
				url: "{{ route('ajax_rate_player') }}",
				dataType:"json",
				data: {rating:rating,voting_player:voting_player,voted_player:voted_player },
				type:"get",
				cache:false,
				success:function(data){
                   loadPlayers();
				},error:function(e){
					alert('erro');
				}
			})
		}

		function goto_player_card(player_id)
		{
			window.location.href = './card/'+player_id; 
			
		}
	</script>

	<style type="text/css">


body{
	/* Apply univerasl font to the body and a BG colour */
	font-family:arial;
    color:ivory;

}






</style>
</head>
<body>
    
	<div id=Container> <!-- Container to hold everything -->
        <table style="width:100%;" id="players_table">
            <thead>
                <th>Ver profile</th>
                <th>Nome</th>
                <th>Nota</th>
            </thead>
            <tbody>
              <td colspan="3"><center><div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></center></td>
            </tbody>
        </table>
      
	</div>

</body>
</html>