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
                    <div class="row justify-content-center">
                        <div class="col-md-3 col-sm-4">
                            <div class="black-canvas">
                                <img class="cupom-img-top" alt="Parceiro" src="{{ asset('img/colepom_bg_white.png') }}" width="450" height="600">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <h2>Obrigado pelo seu cadastro</h2>
    <p>Seu cadastro está em processo de aprovação. Enviaremos um email com sua senha provissória quando seu cadastro for aprovado.</p>
</div>

@endsection