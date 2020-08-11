@extends('template')
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
								<img class="cupom-img-top" alt="Parceiro" src="{{ asset($parceiro->PAR_LOGO) }}" width="450" height="600">
							</div>
							<div class="col-md-9 col-sm-8">
								<h1 class="nav-nome">
								{{$parceiro->PAR_FANTASIA}}
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
			<div class="col-md-9">
		

	
		</div>
		<div class="row">
			<div class="col-md-8 contacts">
				<h2>
					Contatos
				</h2>

				<div>
					<a href="#">
						<i class="fab fa-facebook"></i> {{ $parceiro->PAR_FACEBOOK }}
					</a>
				</div>
				<div>
					<a href="#">
						<i class="fab fa-instagram"></i> {{ $parceiro->PAR_INSTAGRAM }}
					</a>
				</div>
				<div>
					<a href="#">
						<i class="far fa-envelope"></i> {{ $parceiro->PAR_EMAIL }}
					</a>
				</div>
				<div>
					<a href="#">
					{{$parceiro->PAR_SITE}}
					</a>
				</div>

			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div id="map"></div>
		</div>
	</div>

	<div class="container">
		<div class="section row">
			<div class="col-md-12">
				<div class="title">
					<h2 class="text-center">
						Promoções
					</h2>
					<h4 class="text-center">
						Veja as melhores ofertas
					</h4>
				</div>
				<div class="row">	
				@foreach ($promocoes as $promocao_parceiro)				
					<div class="col-lg-3 col-md-4 col-sm-6">
						<a class="cupom-click" href="{{route('promocao',['id' =>$promocao_parceiro->PRO_ID])}}">
							<div class="cupom">
								<div class="tesoura"></div>
								<div class="black-canvas">
									<img class="cupom-img-top" alt="Parceiro" src="{{ asset($promocao_parceiro->PRO_FOTO) }}" width="450" height="600">
								</div>
								<div class="cupom-desconto">{{ $promocao_parceiro->PRO_PORCENTAGEM }}%</div>
								<div class="cupom-block">
									<h5 class="cupom-title" data-toggle="tooltip" title="{{ $promocao_parceiro->PRO_NOME }}">
										{{ $promocao_parceiro->PRO_NOME }}
									</h5>
									<div class="cupom-place">
										<div class="map-marker">
										</div>
										<div class="cupom-place-text">
											<span class="cupom-parceiro" data-toggle="tooltip" title="Pizzaria Andreon">{{ $parceiro->PAR_FANTASIA }}</span>
											<br>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
					@endforeach					
				</div>
				<div class="text-center">
					<a href="#" class="btn colored">Ver mais</a>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<script>
		// Initialize and add the map
		function initMap() {
			// The location of Uluru
			var uluru = {
				lat: -25.344,
				lng: 131.036
			};
			// The map, centered at Uluru
			var map = new google.maps.Map(
				document.getElementById('map'), {
					zoom: 4,
					center: uluru
				});
			// The marker, positioned at Uluru
			var marker = new google.maps.Marker({
				position: uluru,
				map: map
			});
		}
	</script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmo4CfcMoOKVWs05svsO2ksL3zt4MaDZM&callback=initMap">
	</script>
@endsection