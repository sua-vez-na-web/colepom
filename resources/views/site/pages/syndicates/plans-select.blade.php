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
	<div class="row justify-content-center">
		<div class="page-title">
			<h3>Selecão de Plano</h3>
		</div>
		<div class="col-md-12">
			<form action="{{ route('syndicate.subscribe') }}" method="POST">
				@csrf
				<div class="form-group">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="plan" id="month-plan" value="montlhy">
						<label class="form-check-label" for="month-plan">
							Plano Mensal R$ 499,00
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="plan" id="semiannually" value="semiannually">
						<label class="form-check-label" for="semiannually">
							Plano Semestral R$ 2.399,96
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="plan" id="yearly" value="yearly">
						<label class="form-check-label" for="yearly">
							Plano Anual R$4.199,89.
						</label>
					</div>
					<input type="hidden" name="syndicate_id" value="{{$syndicate_id ?? ''}}">
				</div>
			</form>
		</div>
	</div>
</div>
@endsection