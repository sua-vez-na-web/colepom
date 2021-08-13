@extends('site.layouts.template')
@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h3 class="m-4 border-bottom">Seja um Parceiro</h3>
            <p class="text-justify m-5">
            Junte-se a centenas de empresas e atinja milhares de brasileiros via email marketing, SMS, notificações push e muito mais.
Para participar das nossas redes de parceiros, você só precisa oferecer um benefício relevante aos usuários  <span class="text-bold"><b>(mas, olha! Tem que ser um benefício especial mesmo, hein? Nossa equipe está sempre se certificando de que o benefício oferecido é o melhor possível)</b></span>.

            </p>
            <p class="text-justify m-5">
            Aqui, o usuário é mais importante
Por isso, não cobramos taxas nem comissionamento. Assim, sua empresa pode focar no benefício total ao consumidor.
            </p>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-6 offset-3">
            <a href="{{ route('partners.register') }}" class="btn btn-lg btn-block full_colored ">Quero Ser Parceiro</a>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="m-4 border-bottom">VANTAGENS</h3>
            
            <h4 class="mb-3">Confira todas as vantagensem ter sua empresa na Colepom:</h4>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"> <i class="fa fa-check"></i> &nbsp; Sem taxa de divulgação ou comissionamentos.</li>
                <li class="list-group-item">  <i class="fa fa-clock"></i> &nbsp; Campanhas regulares de divulgação.</li>
                <li class="list-group-item">  <i class="fa fa-envelope"></i> &nbsp; Disparos de email marketing, notificações push, sms e redes sociais.</li>
                <li class="list-group-item">  <i class="fa fa-users"></i> &nbsp; Público heterogêneo em todas as regiões do país.</li>
                <li class="list-group-item">  <i class="fa fa-check"></i> &nbsp; Credibilidade ao estar perto de grandes marcas nacionais.</li>                
            </ul>
        </div>
    </div>
</div>
@endsection