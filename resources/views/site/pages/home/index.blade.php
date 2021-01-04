@extends('site.layouts.template')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="carousel slide" id="carousel-868212">
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
                    <div class="carousel-shadow index"></div>
                    <div class="carousel-caption">
                        <h4>
                            First Thumbnail label
                        </h4>
                        <p>
                            Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id
                            dolor id nibh ultricies vehicula ut id elit.
                        </p>
                    </div>
                </div>
                <div class="carousel-item active">
                    <img class="d-block w-100" alt="Carousel Bootstrap Second" src="https://images.unsplash.com/photo-1464979681340-bdd28a61699e?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=9962230a1213bfd754ed20ae96114c04&auto=format&fit=crop&w=1050&q=80">
                    <div class="carousel-shadow index"></div>
                    <div class="carousel-caption">
                        <h4>
                            Second Thumbnail label
                        </h4>
                        <p>
                            Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id
                            dolor id nibh ultricies vehicula ut id elit.
                        </p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" alt="Carousel Bootstrap Third" src="https://images.unsplash.com/photo-1511733897353-5b04f82435a8?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=00f1f8fe0951b340878a85747b68b9c1&auto=format&fit=crop&w=1050&q=80">
                    <div class="carousel-shadow index"></div>
                    <div class="carousel-caption">
                        <h4>
                            Third Thumbnail label
                        </h4>
                        <p>
                            Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id
                            dolor id nibh ultricies vehicula ut id elit.
                        </p>
                    </div>
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

<div class="container">
    <div class="section row">
        <div class="col-md-12">
            <div class="title">
                <h2 class="text-center">
                    Como funciona?
                </h2>
                <h4 class="text-center">
                    Entenda como ganhar descontos em lojas parceiras
                </h4>
            </div>
            <div class="row">
                <div class="col-md-4 card-box">
                    <img src="{{ asset('img/icone1.png') }}" alt="" height="130px">
                    <div class="card-block">
                        <h5 class="card-title">
                            Cadastre-se
                        </h5>
                        <p class="card-text">
                            Escolha o sindicato/associação a qual é associado e cadastre-se
                        </p>
                    </div>
                </div>
                <div class="col-md-4 card-box">
                    <img src="{{ asset('img/icone2.png') }}" alt="" height="130px">
                    <div class="card-block">
                        <h5 class="card-title">
                            Escolha
                        </h5>
                        <p class="card-text">
                            Escolha uma promoção ou desconto na loja na qual mais lhe agradou.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 card-box">
                    <img src="{{ asset('img/icone3.png') }}" alt="" height="130px">
                    <div class="card-block">
                        <h5 class="card-title">
                            Resgate
                        </h5>
                        <p class="card-text">
                            Pronto é so imprimir o cupom ou tirar um printscreen em seu celular em seguida apresente na loja parceira
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="aside colored">
    <div class="col-md-12">
        <div class="mention">
            Não tem como ser mais fácil, simples e rápido
        </div>
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
                @foreach ($promotions as $promotion)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a class="cupom-click" href="{{route('promotions.show',$promotion->id)}}">
                        <div class="cupom">
                            <div class="tesoura"></div>
                            <div class="black-canvas">
                                <img class="cupom-img-top" alt="Parceiro" src="{{$promotion->image}}" width="450" height="600">
                            </div>
                            <div class="cupom-desconto">{{ $promotion->discount }}%</div>
                            <div class="cupom-block">
                                <h5 class="cupom-title" data-toggle="tooltip" title="{{ $promotion->title }}">
                                    {{ $promotion->title }}
                                </h5>
                                <div class="cupom-place">
                                    <div class="map-marker">
                                    </div>
                                    <div class="cupom-place-text">
                                        <span class="cupom-parceiro" data-toggle="tooltip" title="{{ $promotion->partner->name }}"> {{ $promotion->partner->name }} </span>
                                        <br>
                                        <span class="cupom-local" data-toggle="tooltip" title="#">{{$promotion->store->city}},{{$promotion->store->province}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="text-center">
                <a href="{{route('site.promotions')}}" class="btn colored">Ver mais</a>
            </div>
        </div>
    </div>
</div>

@endsection