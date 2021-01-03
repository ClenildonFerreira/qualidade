<!DOCTYPE html>

<html lang="pt-br">	
    <head>
        <meta charset="utf-8">
		<meta name="author" content="Clenildon Ferreira">
		<meta http-equiv="X-UA-Compatible" content="IE-edge">
		<meta name="viewport" content="initial-scale=1">
		<title>Portal Lunelli Nordeste</title>
        <!--CSS-->
        <link href="{{ URL::asset('css/login.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <style>body {font-family: 'Roboto', sans-serif;}</style>

    </head>
	<!-- Pagina Login Systema Controle-->
	<body class="text-center" >
		<div class="container-fluid">
			<!--Formulario de Login -->
			<form method="POST" action="{{route('usuarios.login')}}" autocomplete="off" id="formularioLogin">
			@csrf
				<!-- Imagem top formulario -->
				<div class="form-group">
					<div class="col-md-6 offset-md-3">
						<img src="{{ URL::asset('img/lgp.png') }}" class="img-login">
					</div>
				</div>
				<!-- fim imagem top formulario login-->
				<!-- Titulo do formulario login-->
                <div class="form-group">
					<div class="col-md-6 offset-md-3">
						<h2 class="titulo-login">Acesso Restrito</h2>
					</div>
				</div><!-- Fim titulo -->
				<!-- campo matrícula do formulario login-->
				<div class="form-group">
					<div class="card-group  col-md-6 offset-md-3" >
						<input class="form-control form-control-lg" type="text" name="matricula" placeholder="Matrícula" maxlength="10" id="matricula" required>
					</div>
				</div>
				<!-- fim campo matrícula -->

				<!-- campo de seleção da função-->
				<div class="form-group">
					<div class="card-group col-md-6 offset-md-3" >
						<select class="form-control form-control-lg main" name="funcao" id="funcao" text-center required>
							<option value="">Função</option>
	  						<option value="revisora">Revisor(a)</option>
	  						<option value="inspetora">Inspetor(a)</option>
                            <option value="admin">Administrador(a)</option>
                            <option value="gestao">Gestão de Pessoas</option>
						</select>
					</div>
				</div>
				<!-- fim campo seleção função-->

				<!-- botão de enter -->
				<div class="form-group">
					<div class="card-group col-md-6 offset-md-3">	
						<button id="btnEntrar" class="btn btn-lg btn-danger btn-block form-control" type="submit">Enter</button>
					</div>
				</div>
				<!-- fim botão de enter -->

				<!-- rodapé do formulario -->
				<div class="card-group">
					<p class="mt-5 mb-3 text-muted text-center">©Lunelli Nordeste - 2020</p>
				</div>
				<!-- fim rodapé -->

			</form> <!-- fim formulario -->
		</div>

        <footer>
            <!-- JS -->
            <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
            <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
        </footer>
	</body><!-- fim da pagina login -->
</html>

