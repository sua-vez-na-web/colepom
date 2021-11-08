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
                            <img class="cupom-img-top" alt="Parceiro" src="{{$partner->image}}" width="450" height="600">
                        </div>
                        <div class="col-md-9 col-sm-8">
                            <h1 class="nav-nome">
                                {{$partner->name}}
                            </h1>
                            <a href="" class="btn btn-sm btn-outline-dark mt-2">{{$partner->category->name}}</a>
                            <div class="card p-3 my-4 d-flex flex-row justify-content-between">

                                <a href="{{$partner->facebook}}" class="text-dark" target="_blank">
                                    <i class="fab fa-facebook fa-2x"></i>
                                </a>

                                <a href="{{$partner->instagram}}" class="text-dark" target="_blank">
                                    <i class="fab fa-instagram fa-2x"></i>
                                </a>

                                <a href="mailto:{{$partner->email}}" class="text-dark">
                                    <i class="far fa-envelope fa-2x"></i>
                                </a>

                                <a href="{{$partner->site}}" target="_blank" class="text-dark">
                                    {{$partner->site}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">

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
                    @forelse ($promotions as $promotion)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a class="cupom-click" href="{{route('promotions.redeem',$promotion->id)}}">
                            <div class="cupom">
                                <div class="tesoura"></div>
                                <div class="black-canvas">
                                    <img class="cupom-img-top" alt="Parceiro" src="{{$promotion->image ?? asset('img/colepom_logo.png')}}" width="450" height="600">
                                </div>
                                <div class="cupom-desconto">{{$promotion->discount}}%</div>
                                <div class="cupom-block">
                                    <h5 class="cupom-title" data-toggle="tooltip" title="promoao nome">
                                        {{$promotion->name}}
                                    </h5>
                                    <div class="cupom-place">
                                        <div class="map-marker">
                                        </div>
                                        <div class="cupom-place-text">
                                            <span class="cupom-parceiro" data-toggle="tooltip" title="Pizzaria Andreon">{{$promotion->store->name}}</span>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @empty
                    <p>Nenhuma promocão cadastrada por esse parceiro</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="title">
            <h2 class="text-center">Depoimentos</h2>
        </div>
        <br>
   
    <div class="col-md-12">
			<div class="row">
            @forelse ($testimonials as $testimonial)
				<div class="col-md-4 col-sm-12">
					
						<div class="card p-2">
							<div class="tasfa"></div>
							<div class="white-canvas">
								<p>{{$testimonial->name}}</p>
							</div>
							<!-- <div class="cupom-desconto">{{$partner->discount}}%</div> -->
							<div class="cupom-block">
								<h5 class="cupom-title" data-toggle="tooltip" title="{{ $partner->title }}">
									"{{$testimonial->description}}"
								</h5>
							</div>
                            <p class="card-text"><small class="text-muted">{{$testimonial->created_at->diffForHumans()}}</small></p>
						</div>
					
				</div>
				@empty
				<p>Nenhum Registro Encontrado.</p>
				@endforelse
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
            var coordinates = {
                lat: -22.9732303,
                lng: -43.2032649
            };
            // The map, centered at Uluru
            var map = new google.maps.Map(
                document.getElementById('map'), {
                    zoom: 19,
                    center: coordinates
                });
            // The marker, positioned at Uluru
            var marker = new google.maps.Marker({
                position: coordinates,
                map: map
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmo4CfcMoOKVWs05svsO2ksL3zt4MaDZM&callback=initMap">
    </script>
    @endsection