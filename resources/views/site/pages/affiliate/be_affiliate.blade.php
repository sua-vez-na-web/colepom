@extends('site.layouts.template')
@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h3 class="m-4 border-bottom">Clube de Vantagens</h3>
            <p class="text-justify m-5">

O Clube de Vantagens Colepom é o conjunto de parceiros formado por empresas renomadas que proporcionam descontos garantidos para o associado dos Sindicatos cadastrado em nossa plataforma. No Clube, o associado encontra serviços, produtos, viagens e cursos, pois acreditamos que, muito além de economizar, a vantagem de participar é, também, investir no futuro, na diversão e nos momentos em família. Nossa meta é ter você, associado, continuamente satisfeito com nossos serviços e oferecer vantagens que tornem sua vida cada dia mais tranquila. Bem-vindo ao Clube de Vantagens Colepom! Aproveite todos nossos benefícios, economize e invista em você e em quem você ama.
            </p>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-6 offset-3">
            <a href="{{ route('affiliates.register') }}" class="btn btn-lg btn-block full_colored ">Quero me Affiliar</a>
        </div>
    </div>    
</div>
@endsection