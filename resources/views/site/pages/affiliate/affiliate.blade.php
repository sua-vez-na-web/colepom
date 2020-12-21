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
	<div class="page-text mt-5">
		<div class="row d-flex justify-content-between">
			<h3>Bem vindo: {{Auth::user()->name}}</h3>
			<a class="btn btn-dark" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Sair</a>
			<form action="{{ route('logout') }}" id="logout-form" style="display: none" method="post">
				@csrf
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="list-group">
				<a href="#" class="list-group-item list-group-item-action">
					<i class="fa fa-user"></i>
					Minha Conta</a>
				<a href="{{route('affiliates.coupons') }}" class="list-group-item list-group-item-action">
					<i class="fas fa-ticket-alt"></i>
					Meus Cupons</a>
			</div>
		</div>
		<div class="col-md-8">

		</div>
	</div>
</div>
@endsection