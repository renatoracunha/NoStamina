

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>noStamiNa</title>

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-color:black">
			<div class="wrap-login100 ">
				<div class="login100-form validate-form p-l-55 p-r-55 p-t-178" style="background-color:black">
					<span class="login100-form-title" style="color:black">
						Cadastro
					</span>

                    <div class="flex-col-c  p-b-20">
						<span class="txt1 p-b-9">
							já tem uma conta?
						</span>

                    <a href="../" class="txt3">
							Fazer login
						</a>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Nome">
						<input class="input100" type="text" id="nome" placeholder="Nome">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Cadastrar senha">
						<input class="input100" type="password" id="senha" placeholder="Senha">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Confirmar senha">
						<input class="input100" type="password" id="confirmar_senha" placeholder="Confirmar senha">
						<span class="focus-input100"></span>
                    </div>
                    <form method="post" action="{{ route('upload_imagem') }}" id="upload_file" enctype="multipart/form-data">
						<div class="wrap-input100 validate-input m-b-16" data-validate = "Upload de foto do perfil">
                            <input style="bottom:-5px" class="input100" type="file" name="imagem_player" id="imagem" >
                            <span class="focus-input100"></span>
                        </div>
					</form>
                    <br>
                    <br>
					

					<div class="container-login100-form-btn">
						<button type="button" onclick="register()" class="login100-form-btn" style="color:black">
							cadastrar
						</button>
					</div>

					
				</div>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{ asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('js/main.js')}}"></script>
<!--===============================================================================================-->
<script>
    function register() {
        document.getElementById("upload_file").submit();
        let nome = $('#nome').val();
        let senha = $('#senha').val();
        let confirmar_senha = $('#confirmar_senha').val();
        let imagem = $('#imagem').val();
        
        
        if(nome==''){
            $('#nome').addClass('is-invalid');
            $('#nome').focus();
            $('#nome').attr('placeholder','Informe um nome');
            $('#nome').css("background-color", "#FFD6D6");
            return;
        }
        if(senha==''){
            $('#senha').addClass('is-invalid');
            $('#senha').focus();
            $('#senha').attr('placeholder','Informe um nome');
            $('#senha').css("background-color", "#FFD6D6");
            return;
        }
        
        if(confirmar_senha==''){
            $('#confirmar_senha').addClass('is-invalid');
            $('#confirmar_senha').focus();
            $('#confirmar_senha').attr('placeholder','Informe um nome');
            $('#confirmar_senha').css("background-color", "#FFD6D6");
            return;
        }
        if(imagem==''){
            $('#imagem').addClass('is-invalid');
            $('#imagem').focus();
            $('#imagem').attr('placeholder','Informe um nome');
            $('#imagem').css("background-color", "#FFD6D6");
            return;
        }
       
        $('#body').html('');
        $('#body').append('<td colspan="3"><center><div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></center></td>');
        $.ajax({
            url: "{{ route('ajax_register_player') }}",
            dataType:"json",
            data:{nome:nome,senha:senha,imagem:imagem},
            type:"get",
            cache:false,
            success:function(data){
                document.getElementById("upload_file").submit();
                console.log(data);
                // window.location.href = './card/'+data;
            },error:function(e){
                alert('erro');
            }
        })
		
    }
</script>
</body>
</html>