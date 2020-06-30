<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Colepom</title>

	<meta name="description" content="">
	<meta name="author" content="Komotiva">

	<link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}" />

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Roboto:300,400,700|Sunflower:300,500,700" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
	    crossorigin="anonymous">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
	    crossorigin="anonymous">	
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">

</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-colored">
		<div class="container">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="navbar-toggler-icon"></span>
			</button>

			<a class="navbar-brand" href="{{ route('index') }}">
				<img src="{{ asset('img/colepom_logo.png') }}" alt="colepom_logo">
			</a>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

				<ul class="navbar-nav ml-md-auto">
					<li class="nav-item">
						<a class="nav-link" href="{{ route('promocoes') }}">Explorar Cupons
							<span class="sr-only">Promoções</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('parceiros') }}">Parceiros
							<span class="sr-only">Parceiros</span>
						</a>
					</li>
					<li class="nav-item" style="margin-right: 20px;">
						<a class="nav-link" href="{{ route('organizacoes') }}">Sindicatos/Associações
							<span class="sr-only">Sindicatos/Associações</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="btn light-colored" data-toggle="modal" data-target=".modal-account">ENTRAR
							<span class="sr-only">Login</span>
						</a>
					</li>


				</ul>
			</div>
		</div>
	</nav>

    @if (session('sucesso'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-success alert-dismissible show" role="alert">
                {{ session('sucesso') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        </div>
    </div>
    @endif

    @if (session('erro'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger alert-dismissible show" role="alert">
                {{ session('erro') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        </div>
    </div>
    @endif
    @yield('content')
    
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-6 text-center">
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="#">Sobre nós</a>
						</li>
						<li class="list-inline-item">⋅</li>
						<li class="list-inline-item">
							<a href="#">Contato</a>
						</li>
						<li class="list-inline-item">⋅</li>
						<li class="list-inline-item">
							<a href="#">Termo de Uso</a>
						</li>
						<li class="list-inline-item">⋅</li>
						<li class="list-inline-item">
							<a href="#">Politica de Privacidade</a>
						</li>
					</ul>
					<p class="text-muted small">© Colepom 2018. Todos os direitos reservados.</p>
					<p class="text-muted small">Made by
						<a href="www.komotiva.com">Komotiva</a>.</p>
				</div>
				<div class="col-lg-6 text-center text-lg-right my-auto">
					<ul class="list-inline mb-0">
						<li class="list-inline-item mr-3">
							<a href="#">
								<i class="fab fa-facebook-f fa-2x fa-fw"></i>
							</a>
						</li>
						<li class="list-inline-item mr-3">
							<a href="#">
								<i class="fab fa-twitter fa-2x fa-fw"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="#">
								<i class="fab fa-instagram fa-2x fa-fw"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>

	<div id="associado_login" class="modal fade modal-account" tabindex="-1" role="dialog" aria-labelledby="Logar" aria-hidden="true">
		<div class="modal-dialog modal-md">
		  	<div class="modal-content">
				{!! Form::open(['route' => 'ass_logar', 'method'=>'post']) !!}
					<fieldset>
						<h4 class="text-center">Entrar como Associado</h4>
						<div class="form-group">
							<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
						</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
								<a href="{{ route('promocoes') }}">Esqueci minha senha de Associado</a>
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me"> Lembrar-me
								</label>
							</div>
							<!-- Change this to a button or input when using this as a form -->
						<button type="submit" class="btn btn-lg btn-block full_colored ">Entrar como Associado</button>
						
						<div class="modal-account-options">
						<a class="registrar-associado" href="{{ route('ass_registrar') }}">Registrar como Associado</a>
							<br>
							<a class="login-parceiro" href="#">Entrar como Parceiro</a>
							<br>
							<a class="login-sindicato" href="#">Entrar como Sindicato/Associação</a>
						</div>
					</fieldset>
				{!! Form::close() !!}
		  	</div>
		</div>
	</div>

		<div id="sindicato_login" class="modal fade modal-account" tabindex="-1" role="dialog" aria-labelledby="Logar" aria-hidden="true">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					{!! Form::open(['route' => 'parc_logar', 'method'=>'post']) !!}
						<fieldset>
							<h4 class="text-center">Entrar como Sindicato</h4>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
							</div>
								<div class="form-group">
									<input class="form-control" placeholder="Password" name="password" type="password" value="">
									<a href="{{ route('promocoes') }}">Esqueci minha senha de Sindicato</a>
								</div>
								<div class="checkbox">
									<label>
										<input name="remember" type="checkbox" value="Remember Me"> Lembrar-me
									</label>
								</div>
								<!-- Change this to a button or input when using this as a form -->
							<button type="submit" class="btn btn-lg btn-block full_colored ">Entrar como Sindicato</button>
							
							<div class="modal-account-options">
							<a class="registrar-associado" href="{{ route('sind_registrar') }}">Registrar como Sindicato</a>
								<br>
								<a class="login-parceiro" href="#">Entrar como Parceiro</a>
								<br>
								<a class="login-associado" href="#">Entrar como Associado</a>
							</div>
						</fieldset>
					{!! Form::close() !!}
		  		</div>
			</div>
		</div>

		<div id="parceiro_login" class="modal fade modal-account" tabindex="-1" role="dialog" aria-labelledby="Logar" aria-hidden="true">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					{!! Form::open(['route' => 'parc_logar', 'method'=>'post']) !!}
						<fieldset>
							<h4 class="text-center">Entrar como Parceiro</h4>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
							</div>
								<div class="form-group">
									<input class="form-control" placeholder="Password" name="password" type="password" value="">
									<a href="{{ route('promocoes') }}">Esqueci minha senha de Parceiro</a>
								</div>
								<div class="checkbox">
									<label>
										<input name="remember" type="checkbox" value="Remember Me"> Lembrar-me
									</label>
								</div>
								<!-- Change this to a button or input when using this as a form -->
							<button type="submit" class="btn btn-lg btn-block full_colored ">Entrar como Parceiro</button>
							
							<div class="modal-account-options">
							<a class="registrar-associado" href="{{ route('parc_registrar') }}">Registrar como Parceiro</a>
								<br>
								<a class="login-sindicato" href="#">Entrar como Sindicato</a>
								<br>
								<a class="login-associado" href="#">Entrar como Associado</a>
							</div>
						</fieldset>
					{!! Form::close() !!}
		  		</div>
			</div>
		</div>

		<div id="parceiro_login" class="modal fade modal-account" tabindex="-1" role="dialog" aria-labelledby="Logar" aria-hidden="true">
			<div class="modal-dialog modal-md">
					Parceiro Login
			</div>
		</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
	    crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
	    crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
		crossorigin="anonymous"></script>

	@yield('js')
	<script>
		$('.login-associado').click(function() {
			$('.modal').modal('hide');
			$('#associado_login').modal('show');
		});
		$('.login-parceiro').click(function() {
			$('.modal').modal('hide');
			$('#parceiro_login').modal('show');
		});
		$('.login-sindicato').click(function() {
			$('.modal').modal('hide');
			$('#sindicato_login').modal('show');
		});
	</script>
	<script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>