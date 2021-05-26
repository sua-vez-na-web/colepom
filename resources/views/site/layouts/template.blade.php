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
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}" />

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Roboto:300,400,700|Sunflower:300,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '315489766905520');
        fbq('track', 'PageView');
        </script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=315489766905520&ev=PageView&noscript=1"
/>
</noscript>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-colored">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
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
                        <a class="nav-link" href="{{ route('affiliates.register') }}">Associado
                            <span class="sr-only">Associado</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('site.partners')}}">Parceiros
                            <span class="sr-only">Parceiros</span>
                        </a>
                    </li>
                    <li class="nav-item">
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
        <div class="container">

            @include('site.layouts._partials.messages')

        </div>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->

        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 text-center">
                    <img src="{{ asset('img/colepom_logo.png') }}" alt="" height="100px">
                </div>
                <div class="col-lg-3 text-center text-lg-right my-auto">
                    <ul class="list list-group">
                        <a href="{{route('partners.register')}}" class="list-group text-white">Seja um Parceiro</a>
                        <a href="{{route('syndicates.register')}}" class="list-group text-white">Cadastre seu Sindicato</a>
                        <a href="{{route('syndicates.register')}}" class="list-group text-white">Cadastre sua Associação</a>
                        <a href="{{ route('page.faq') }}" class="list-group text-white">Perguntas Frequentes</a>
                    </ul>
                </div>
                <div class="col-lg-3 text-center text-lg-right my-auto">
                    <ul class="list list-group">
                        <a href="{{route('page.sobre') }}" class="list-group text-white">Sobre nós</a>
                        <a href="{{route('page.contato')}}" class="list-group text-white">Contato</a>
                        <a href="{{ route('page.termos-de-uso') }}" class="list-group text-white">Termo de Uso</a>
                        <a href="{{ route('page.politica') }}" class="list-group text-white">Politicas de Privacidade</a>
                    </ul>
                </div>
                <div class="col-lg-3 text-center text-lg-right my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item mr-3">
                            <a href="#">
                                <i class="fab fa-facebook-f fa-2x fa-fw"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/colepomoficial/?hl=pt-br" target="_blank">
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
    <script src="{{ asset('js/scripts.js') }}"></script>
    @yield('js')
</body>

</html>