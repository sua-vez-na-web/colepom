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
					<div class="row justify-content-center">
						<div class="col-md-3 col-sm-4">
							<div class="black-canvas">
								<img class="cupom-img-top" alt="Parceiro" src="{{ asset('img/colepom_bg_white.png') }}" width="450" height="600">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container mt-5">


	<h5 class="text-center"> Para finalizar seu processo de ativação na plataforma, selecione um dos planos abaixo:</h5>


	<div class="row justify-content-center">
		<div class="col-md-3 oferta bg-white">
			<div class="oferta-title text-dark">Mensal</div>
			<div class="oferta-price text-dark">R$ 499,99</div>
		</div>
		<div class="col-md-3 oferta">
			<div class="oferta-title">Semestral</div>
			<div class="oferta-price">20% Off</div>
			<div class="oferta-period"> R$2.399,96</div>
		</div>
		<div class="col-md-3 oferta bg-dark">
			<div class="oferta-title">Anual</div>
			<div class="oferta-price">30% Off</div>
			<div class="oferta-period">R$4.199,89.</div>
		</div>

	</div>
	<div class="col-md-6 col-sm-12 offset-md-3 mt-3">
		<form action="{{ route('syndicate.subscribe') }}" method="POST">
			@csrf
			<div class="form-group">
				<label for="plans">Plano Escolhido</label>
				<select name="plan_id" id="" class="form-control">
					@foreach($plans as $plan)
					<option value="{{$plan->id}}">{{ $plan->name }} - {{ $plan->description }}</option>
					@endforeach
				</select>

				<input type="hidden" name="syndicate_id" value="{{$syndicate->id ?? ''}}">
			</div>
			<button type="submit" class="btn btn-dark btn-block">Finalizar</button>
		</form>
	</div>
</div>
@endsection