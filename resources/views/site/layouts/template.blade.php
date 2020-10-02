<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Colepom</title>

    <meta name="description" content="">
    <meta name="author" content="MatthausNawan">
    <meta name="_token" content="{{csrf_token()}}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}"/>

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Roboto:300,400,700|Sunflower:300,500,700"
          rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-colored">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand" href="{{ route('site.index') }}">
                <img src="{{ asset('img/colepom_logo.png') }}" alt="colepom_logo">
            </a>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="navbar-nav ml-md-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('site.promotions') }}">Explorar Cupons
                            <span class="sr-only">Promoções</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('site.partners')}}">Parceiros
                            <span class="sr-only">Parceiros</span>
                        </a>
                    </li>
                    <li class="nav-item" style="margin-right: 20px;">
                        <a class="nav-link" href="{{ route('site.syndicates') }}">Sindicatos/Associações
                            <span class="sr-only">Sindicatos/Associações</span>
                        </a>
                    </li>
                    @Guest
                        <li class="nav-item">
                            <a class="btn light-colored" data-toggle="modal" data-target=".modal-login">ENTRAR
                                <span class="sr-only">Login</span>
                            </a>
                        </li>
                    @endGuest
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('affiliates.dashboard') }}">Minha Conta
                                <span class="sr-only">Minha Conta</span>
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
<main>
    @yield('content')
</main>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-center">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="#">Sobre nós</a>
                    </li>
                    <li class="list-inline-item">⋅</li>
                    <li class="list-inline-item">
                        <a href="#">Contato</a>
                    </li>
                    <li class="list-inline-item">⋅</li>
                    <li class="list-inline-item">
                        <a href="#">Termo de Uso</a>
                    </li>
                    <li class="list-inline-item">⋅</li>
                    <li class="list-inline-item">
                        <a href="#">Politica de Privacidade</a>
                    </li>
                </ul>
                <p class="text-muted small">© Colepom 2020. Todos os direitos reservados.</p>
                <p class="text-muted small">Made by
                    <a href="https://suaveznaweb.com.br">SuaVezNaWeb</a>.</p>
            </div>
            <div class="col-lg-6 text-center text-lg-right my-auto">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item mr-3">
                        <a href="#">
                            <i class="fab fa-facebook-f fa-2x fa-fw"></i>
                        </a>
                    </li>
                    <li class="list-inline-item mr-3">
                        <a href="#">
                            <i class="fab fa-twitter fa-2x fa-fw"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="fab fa-instagram fa-2x fa-fw"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
@include('site.layouts._partials._modal-login')


<script src="{{asset('js/app.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
<!-- <script src="{{ asset('js/scripts.js') }}"></script> -->
@yield('js')
</body>

</html>