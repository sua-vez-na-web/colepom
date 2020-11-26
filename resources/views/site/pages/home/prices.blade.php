@extends('site.layouts.template')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="nav-title">
                <div class="black-canvas">
                    <img class="d-block w-100" alt="Carousel Bootstrap First"
                         src="https://images.unsplash.com/photo-1510130315046-1e47cc196aa0?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=42549827c6ab513e2e0d86208749e05e&auto=format&fit=crop&w=1050&q=80">
                    <div class="carousel-shadow"></div>
                </div>

                <div class="container nav-container">
                    <div class="header-perfil">
                        <div class="row justify-content-center">
                            <div class="col-md-3 col-sm-4">
                                <div class="black-canvas">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8 mt-5">
                <div class="page-title mt-5">
                    <h1>Cadastre seu Sindicato</h1>
                </div>
                <div class="page-text">

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3 oferta bg-white">
                <div class="oferta-title text-dark">Mensal</div>
                <div class="oferta-price text-dark">R$ 499,99</div>
            </div>
            <div class="col-md-3 oferta">
                <div class="oferta-title">Semestral</div>
                <div class="oferta-price">20% off</div>
                <div class="oferta-period"> R$2.399,96</div>
            </div>
            <div class="col-md-3 oferta bg-dark">
                <div class="oferta-title">Anual</div>
                <div class="oferta-price">30% off</div>
                <div class="oferta-period">R$4.199,89.</div>
            </div>

        </div>

        <div class="chamada-box">
            <a href="#" class="btn colored">CADASTRE-SE AGORA</a>
        </div>
    </div>


@endsection