@extends('site.layouts.template')
@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h3 class="mb-2 border-bottom">Conheça nossas soluções:</h3>
            <p class="text-justify m-3">
                Temos todas as funcionalidades para que o seu sindicato ou associação fideliza e atraia novos associados, engaje seu público de maneira eficaz:

            </p>
            <h3 class="mb-2 border-bottom">Você no controle:</h3>
            <p class="text-justify m-3">
                Inclua e bloqueie usuários e parceiros na sua área administrativa.
            </p>
            <h3 class="mb-2 border-bottom">Novidade todo mês:</h3>
            <p class="text-justify m-3">
                Todos os meses novas parcerias e benefícios exclusivos com foco total no consumidor.
            </p>
            <h3 class="mb-2 border-bottom">Campanhas personalizadas:</h3>
            <p class="text-justify m-3">
                Website, mobile, e-mail, notificações push, SMS e mais.
            </p>
            <h3 class="mb-2 border-bottom">Integração com suas parcerias:</h3>
            <p class="text-justify m-3">
                Os principais estabelecimentos da sua cidade ou estado em nossa plataforma.
                Transforme a comunicação da seu sindicato ou associação com uma nova maneira de se relacionar com seu público.
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-3">
            <div class="card d-flex flex-column text-center p-1">
                <div class="header">
                    <h2>Plano Incial</h2>
                    <p>Gratuito</p>
                    <small>Indicado para clubes em implementação</small>
                </div>
                <div class="body">
                    <a href="{{ route('syndicates.register',['p'=>'plano-inicial']) }}" class="btn btn-lg my-2 btn-outline-dark">Contratar</a>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;Até 100 associados</li>
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;+250 parcerias nacionais</li>
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;Suas próprias parcerias</li>
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;Novas parcerias todo mês</li>
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;Campanhas promocionais</li>
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;Notificações via push</li>
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;Plataforma responsiva</li>
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;Validação de usuários</li>
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;Suporte com Amor e Cuidado</li>
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;Sistemas e atualizações</li>
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;Manutenção e infraestrutura</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card d-flex flex-column text-center p-1">
                <div class="">
                    <h2>Plano Padrão</h2>
                    <div class="d-flex flex-row justify-content-center">
                        <div class="real">R$</div>
                        <div class="money">499/</div>
                        <div class="month">por mes</div>
                    </div>
                    <small>Indicado para clubes em fase de expansão</small>
                </div>
                <div class="body">
                    <a href="{{ route('syndicates.register',['p'=>'plano-padrao']) }}" class="btn btn-lg my-2 full_colored">Contratar</a>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;Além de todas as funcionalidades do plano inicial:</li>
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;Até 1.000 associados</li>
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;Executivo de Conta</li>
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;Remetente de e-mail customizado</li>
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;Peças Promocionais Personalizadas</li>
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;Campanhas de adesão</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card d-flex flex-column text-center p-1">
                <div class="header">
                    <h2>Plano Avançado</h2>
                    <div class="d-flex flex-row justify-content-center">
                        <div class="real">R$</div>
                        <div class="money">987/</div>
                        <div class="month">por mes</div>
                    </div>
                    <small>Indicado para clubes já consolidados</small>
                </div>
                <div class="body">
                    <a href="{{ route('syndicates.register',['p'=>'plano-avancado']) }}" class="btn btn-lg my-2 btn-outline-dark">Contratar</a>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;Além de todas as funcionalidades do plano Padrão:</li>
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;Até 2.500 associados</li>
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;Aplicativo</li>
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;Parcerias Exclusivas</li>
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;Campanhas e peças exclusivas</li>
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;Envio de E-mail marketing</li>
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;Gestão dos contratos com parceiros locais</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card d-flex flex-column text-center p-1">
                <div class="header">
                    <h2>ColepomPro</h2>
                    <small>QUER IR ALÉM? MAIS ASSOCIADOS? MAIS CUSTOMIZAÇÃO? OUTRAS INTEGRAÇÕES?</small>
                </div>
                <div class="body">
                    <a href="{{ route('syndicates.register',['p'=>'colepom-pro']) }}" class="btn btn-lg my-2 btn-outline-primary">Fale Conosco</a>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;Muito mais beneficiários</li>
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;Maior personalização da plataforma</li>
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;Desenvolvimento de integração e outros recursos</li>
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;Clubes personalizados por temas ou clusters</li>
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;Estratégias especiais de comunicação</li>
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;Vouchers para campanhas de incentivo</li>
                        <li class="list-group-item"><i class="fa fa-check"></i> &nbsp;Prospecção dedicada de parcerias</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection