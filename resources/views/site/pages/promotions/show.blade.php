@extends('site.layouts.template')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="promotion-image p-2">
                <div class="card p-1 shadow">
                    <img src="{{Storage::url($promotion->image)}}" alt="{{$promotion->title}}" height="300px">
                </div>
            </div>

            <div class="store-informations">
                <div class="card p-2 d-flex flex-column">
                    <div class="small font-weight-bold">Estabelecimento</div>
                    <div class="partner-link">{{$promotion->store->name}}</div>

                </div>
                <div class="card p-2 my-2 d-flex flex-column">
                    <div class="small font-weight-bold">Parceiro</div>
                    <div class="">{{ $promotion->store->partner->name }}</div>
                </div>
                <div class="card p-2 my-2">
                    <div class="small font-weight-bold">Categoria</div>
                    <div>{{$promotion->store->category->name}}</div>
                </div>
                <div class="card p-2 my-2 location d-flex flex-column">
                    <div class="small font-weight-bold">Localização</div>
                    <div class="partner-link">
                        Rua: {{$promotion->store->address}},{{$promotion->store->address_number}}
                        - {{$promotion->store->city}}
                    </div>
                    <!-- <div class="icons d-flex flex-row justify-content-between p-3">
                        <i class="fa fa-map-marker fa-2x"></i>
                        <i class="fa fa-phone fa-2x"></i>
                        <i class="fa fa-envelope fa-2x"></i>
                    </div> -->
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
                    <button type="button" class="btn btn-lg full_colored" id="btnRedeemCoupon">
                        <span id="loading-text">Clique para resgatar</span>
                    </button>
                    <button type="button" class="btn btn-lg btn-outline-default"><span class="code-text" id="code">*******</span></button>
                    @endauth
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <p class="instructions d-none text-dark">
                            <i> Seu Cupom foi Revelado, salve o código ou tire um print para aprasentar na loja participante.
                            </i>
                        </p>
                    </div>
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
                <p class="small">Termina em: {{ date('d/m/Y',strtotime($promotion->expiration_date)) }} | Cupons Disponiveis {{$promotion->coupons()->count() ?? '0'}}</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $("#btnRedeemCoupon").on('click', function() {
        event.preventDefault()

        var loadingBtn = $(this);

        loadingBtn.prop('disabled', true)
        loadingBtn.html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span class="sr-only"></span> Obtendo Cupom...`);


        $.get("{{ route('coupon.redeem',$promotion->id) }}", {

        }, function(res) {

            loadingBtn.prop('disabled', false);
            loadingBtn.html(`${res.message}`);
            $('#code').html(`${res.code}`);
            if (res.success)
                $('.instructions').toggleClass('d-none');
        });


    })
</script>

@endsection