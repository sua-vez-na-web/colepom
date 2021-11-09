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
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent magna velit, dignissim et bibendum et, ultrices sed orci. Curabitur eu tortor est. Phasellus augue leo, porttitor sit amet metus nec, congue luctus dolor. Maecenas dignissim ut nisl ac finibus. Cras ornare purus ut diam elementum elementum. Suspendisse potenti. Vestibulum ut mattis justo. Integer non aliquet libero. Proin suscipit varius mattis. Vivamus eleifend lectus rutrum, vestibulum metus ut, semper diam. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

Aenean orci justo, tempor semper urna sed, scelerisque dapibus tellus. Proin tincidunt dolor ac fringilla fermentum. Ut dictum mi eu lectus aliquet tristique. Etiam egestas lacus ut risus fringilla finibus. Suspendisse at risus eros. Suspendisse molestie velit eget condimentum tristique. Curabitur vehicula mollis risus sed varius. In sollicitudin nunc ante. Curabitur iaculis quam eu nulla volutpat, eu aliquet ante convallis. Nullam fermentum tincidunt arcu nec sodales. Donec viverra, ex sed facilisis accumsan, metus magna ultrices sem, a fringilla enim ante quis libero. Vestibulum iaculis diam consectetur lacinia fringilla. Vestibulum feugiat erat ac nisi dapibus tincidunt. Suspendisse pretium, magna vel ultricies iaculis, nisi augue egestas nunc, ac ultrices diam mi ac lacus. </p>
            </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <h2 class="row justify-content-center">Notícias</h2>    
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