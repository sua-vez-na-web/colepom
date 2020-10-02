@extends('site.layouts.template')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="promotion-image p-2 my-2">
                    <div class="card p-1 shadow">
                        <img src="{{$promotion->image}}" alt="{{$promotion->title}}" height="300px">
                    </div>
                </div>

                <div class="store-informations">
                    <div class="card p-2 my-4 d-flex flex-column">
                        <div class="small">Estabelecimento</div>
                        <div class="partner-link">{{$promotion->store->name}}</div>
                        <div class="small">Parceiro</div>
                        <div class="">{{ $promotion->store->partner->name }}</div>
                    </div>
                    <div class="card p-2 my-2">
                        <div class="small">Categoria</div>
                        <div>{{$promotion->store->category->name}}</div>
                    </div>
                    <div class="card p-2 my-2 location d-flex flex-column">
                        <div class="small">Localização</div>
                        <div class="partner-link">
                            Rua: {{$promotion->store->address}},{{$promotion->store->address_number}}
                            - {{$promotion->store->city}}
                        </div>
                        <div class="icons d-flex flex-row justify-content-between p-3">
                            <i class="fa fa-map-marker fa-2x"></i>
                            <i class="fa fa-phone fa-2x"></i>
                            <i class="fa fa-envelope fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="title p-2 my-4">
                    <h3>{{ $promotion->title }}</h3>
                    <p>{{ $promotion->description}}</p>
                </div>

                <div class="card p-2 d-flex">
                    <div class="values">
                        <h5>Valor Original: R$ {{ number_format($promotion->original_value,2,',','.')}}</h5>
                        <h2 class="btn-light-colored">Desconto: -{{$promotion->discount}}%</h2>
                    </div>
                </div>
                <div class="expiration py-4">
                    <div class="row d-flex justify-content-around">
                        @guest
                            <a href="{{route('login')}}" type="button" class="btn btn-lg full_colored ">Faça login para restagar</a>
                        @endguest
                        @auth
                            <button type="button" class="btn btn-lg full_colored ">Resgatar</button>
                        @endauth
                        <button type="button" class="btn btn-lg btn-outline-default">Cupom: *******</button>
                    </div>
                </div>
                <div class="rules">
                    <div class="card p-4">
                        <div class="small">Regras</div>
                        <p>
                            {{$promotion->redemption_rules}}
                        </p>
                    </div>
                </div>
                <div class="obs">
                    <p class="small">Termina em: {{ $promotion->expiration_date }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection