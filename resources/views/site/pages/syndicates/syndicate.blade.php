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
								<div class="black-canvas">
									<img class="cupom-img-top " alt="Parceiro" src=" asset($organizacao->SIN_LOGO) }}" width="450" height="600
								</div>
							</div>
							<div class="col-md-9 col-sm-8 ">
								<h1 class="nav-nome ">
								$organizacao->SIN_FANTASIA
								</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container ">
		<div class="row justify-content-center ">
			<div class="col-md-12">
				<div class="page-text ">
					<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris quis sapien sed eros dictum molestie. In vel velit eget
						lacus ultricies pulvinar sit amet in lectus. Sed pharetra nibh et sem mattis facilisis. Cras consequat nisl et ultricies
						luctus. Vestibulum eget interdum nunc, vel lobortis orci. Curabitur tempus lorem quis feugiat laoreet. Nulla porttitor,
						est nec finibus tempor, lacus erat placerat dolor, at tempor ligula tortor id dolor. Proin at venenatis felis, sit
						amet pellentesque augue.</p>

					<p> Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur feugiat ut libero et
						finibus. Maecenas dolor turpis, vulputate at fermentum sit amet, feugiat finibus diam. Donec condimentum arcu quis
						nisi luctus, a commodo nibh faucibus. Ut a nunc luctus, congue justo sed, porttitor neque. Donec lorem neque, accumsan
						eu velit id, scelerisque laoreet risus. Suspendisse ornare, ligula eget finibus auctor, nibh lorem commodo est, id
						volutpat nulla sem aliquet ante. Aenean sed bibendum felis, eu vehicula neque. Pellentesque habitant morbi tristique
						senectus et netus et malesuada fames ac turpis egestas. Morbi et tortor lacus. Sed et laoreet turpis, et iaculis lectus.
						Aliquam gravida, sem nec tincidunt tempor, augue libero hendrerit lorem, eu pellentesque nisi ipsum eget ante.</p>

					<p> Curabitur euismod velit non feugiat porttitor. Maecenas commodo urna at mattis tristique. Sed diam urna, auctor at tincidunt
						ut, facilisis a augue. Suspendisse vulputate, augue vitae tempus tempus, diam eros porta leo, at elementum felis nulla
						ac velit. Vivamus iaculis odio aliquet ipsum lobortis, ac sollicitudin urna finibus. Praesent magna nisl, iaculis at
						nulla vitae, lacinia luctus neque. Aliquam cursus urna nec erat vestibulum scelerisque. Cras condimentum ligula sed
						aliquet condimentum. Nam congue porta maximus. Interdum et malesuada fames ac ante ipsum primis in faucibus. In hac
						habitasse platea dictumst. Ut vitae sapien sed metus vulputate condimentum id vehicula orci. </p>
				</div>

				<div class="carousel carousel-content slide" id="carousel-868212">
					<ol class="carousel-indicators">
						<li data-slide-to="0" data-target="#carousel-868212">
						</li>
						<li data-slide-to="1" data-target="#carousel-868212" class="active">
						</li>
						<li data-slide-to="2" data-target="#carousel-868212">
						</li>
					</ol>

					<div class="carousel-inner">
						<div class="carousel-item">
							<img class="d-block w-100" alt="Carousel Bootstrap First" src="https://images.unsplash.com/photo-1510130315046-1e47cc196aa0?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=42549827c6ab513e2e0d86208749e05e&auto=format&fit=crop&w=1050&q=80">
						</div>
						<div class="carousel-item active">
							<img class="d-block w-100" alt="Carousel Bootstrap Second" src="https://images.unsplash.com/photo-1464979681340-bdd28a61699e?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=9962230a1213bfd754ed20ae96114c04&auto=format&fit=crop&w=1050&q=80">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" alt="Carousel Bootstrap Third" src="https://images.unsplash.com/photo-1511733897353-5b04f82435a8?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=00f1f8fe0951b340878a85747b68b9c1&auto=format&fit=crop&w=1050&q=80">
						</div>
					</div>

					<a class="carousel-control-prev" href="#carousel-868212" data-slide="prev">
						<span class="carousel-control-prev-icon"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carousel-868212" data-slide="next">
						<span class="carousel-control-next-icon"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
		<div class="row justify-content-center ">
			<div class="col-md-8 contacts ">
				<h2>
					Contatos
				</h2>

				<div>
					<a href="# ">
						<i class="fab fa-facebook "></i> $organizacao->SIN_FACEBOOK
					</a>
				</div>
				<div>
					<a href="# ">
						<i class="fab fa-instagram "></i> $organizacao->SIN_INSTAGRAM
					</a>
				</div>
				<div>
					<i class="fas fa-phone "></i> TA FALTANDO
				</div>
				<div>
					<i class="fas fa-phone "></i> TA FALTANDO
				</div>
				<div>
					<a href="# ">
						<i class="far fa-envelope "></i> $organizacao->SIN_EMAIL
					</a>
				</div>
				<div>
					<a href="# ">
						$organizacao->SIN_SITE
					</a>
				</div>

			</div>
		</div>

	</div>
	<div class="container-fluid ">
		<div class="row ">
			<div id="map"></div>
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
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmo4CfcMoOKVWs05svsO2ksL3zt4MaDZM&callback=initMap ">
	</script>
@endsection