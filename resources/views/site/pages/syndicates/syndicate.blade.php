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
                            <img class="cupom-img-top" alt="Parceiro" src="{{$syndicate->image}}" width="450" height="600">
                        </div>
                        <div class="col-md-9 col-sm-8">
                            <h1 class="nav-nome">
                                {{$syndicate->name}}
                            </h1>
                            <div class="card p-3 my-4 d-flex flex-row justify-content-between">
                                <a href="{{$syndicate->facebook}}" class="text-dark" target="_blank">
                                    <i class="fab fa-facebook fa-2x"></i>
                                </a>
                                <a href="{{$syndicate->instagram}}" class="text-dark" target="_blank">
                                    <i class="fab fa-instagram fa-2x"></i>
                                </a>
                                <a href="mailto:{{$syndicate->email}}" class="text-dark">
                                    <i class="far fa-envelope fa-2x"></i>
                                </a>
                                <a href="{{$syndicate->site}}" target="_blank" class="text-dark">
                                    {{$syndicate->site}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container ">
    <div class="row justify-content-center">
        <h2 class="row justify-content-center">Sobre</h2>
        <div class="col-md-12">
            <div class="page-text ">
                <p>{{$syndicate->description ?? 'Não possui detalhes'}}</p>
            </div>
        </div>
    </div>
</div>
</div>
<br>
<div class="container">
    <div class="title">
        <h2 class="text-center">Notícias</h2>
    </div>
    <br>

    <div class="col-md-12">
        <div class="row">
            @forelse ($posts as $post)
            <div class="col-md-6 col-sm-12">
                <div class="card p-2">
                    <div class="white-canvas">
                        <a href="{{$post->link}}" target="_blank">
                            <p class="font-weight-bold">{{$post->title}}</p>
                        </a>
                    </div>

                    <div class="cupom-block">
                        <small>
                            {{$post->body}}
                        </small>
                    </div>
                    <p class="card-text"><small class="text-muted">{{$post->created_at->diffForHumans()}}</small></p>
                </div>
            </div>
            @empty
            <p>Nenhum Registro Encontrado.</p>
            @endforelse
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