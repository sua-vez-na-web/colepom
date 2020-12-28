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
                        </div>
                        <div class="col-md-9 col-sm-8">
                            <h1 class="nav-nome">

                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="page-text mt-5">
        <div class="row d-flex justify-content-between">
            <h3>Bem vindo: {{Auth::user()->name}}</h3>
            <a class="btn btn-dark" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Sair</a>
            <form action="{{ route('logout') }}" id="logout-form" style="display: none" method="post">
                @csrf
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            @include('site.pages.affiliate.partials.side_menu')
        </div>
        <div class="col-md-9">
            <table class="table table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Promoção</th>
                        <th>Validade</th>
                        <th>Data Resgate</th>

                        <th>Data Uso</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($coupons as $coupon)
                    <tr>
                        <th>{{$coupon->coupon->code?? '' }}</th>
                        <td>{{$coupon->coupon->promotion->title ?? ''}}</td>
                        <td>{{ date('d/m/Y',strToTime($coupon->coupon->promotion->redeem_expiration_date)) ?? ''}}</td>
                        <td>{{date('d/m/Y',strToTime($coupon->redeem_at)) ?? ''}}</td>
                        <td>{{date('d/m/Y',strToTime($coupon->used_at)) ?? '--'}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection