@extends('site.layouts.template')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="nav-title">
				<div class="black-canvas">
					<img class="d-block w-100" alt="Carousel Bootstrap First" src="https://images.unsplash.com/photo-1510130315046-1e47cc196aa0?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=42549827c6ab513e2e0d86208749e05e&auto=format&fit=crop&w=1050&q=80">
					<div class="carousel-shadow"></div>

				</div>

				<div class="container nav-container">
					<div class="header-perfil">
						<div class="row">
							<div class="col-md-3 col-sm-4">
							</div>
							<div class="col-md-9 col-sm-8">
								<h1 class="nav-nome">
								
								</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-5 mb-5">

				<div class="page-text">
					<div class="row">
						<div class="col-10"><h1>Bem vindo  $associado->ASS_NOME </h1></div>
						<div class="col-2"><a class="btn btn-danger" href=" route('associado_logout') ">Sair</a></div>
					</div>
				</div>

				<div class="page-text">
					@if (session('status_associado'))
				    <div class="alert alert-success">
				       session('status_associado') 
				    </div>
					@endif
					<form method="post" action=" route('associado_atualizar') ">
						@csrf
						<input type="hidden" name="id" value=" $associado->ASS_ID ">
            <div class="form-group">
              <label>Nome</label>
              <input class="form-control" name="nome" type="text" value=" $associado->ASS_NOME " required>
            </div>

            <div class="form-group">
              <label>Email</label>
              <input class="form-control" name="email" type="email" value=" $associado->ASS_EMAIL " required>
            </div>

            <div class="form-group">
              <label>Senha</label>
              <input class="form-control" name="senha" type="password" value="">
            </div>
            <button class="btn btn secondary">Atualizar</button>
					</form>
				</div>

			</div>
		</div>
	</div>

@endsection

@section('js')
@endsection