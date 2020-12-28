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


    <div class="col-md-8 offset-md-2 col-sm-12">
        <h3>Registre-se como Parceiro</h3>

        {!! Form::open(['route'=>'store.partners']) !!}

        <div class="form-group">
            <label>Nome</label>
            {{form::text('first_name',null,['class'=>'form-control']) }}
            @error('first_name')
            <span class="text-danger">{{ $message ?? '' }}</span>
            @enderror
        </div>

        <div class="form-group">
            <div class="form-group">
                <label>Categoria</label>
                {!! Form::select('category_id',$categories,null,['class'=>'form-control','placeholder'=>'Escolha uma Categoria']) !!}
                @error('category_id')
                <span class="text-danger">{{ $message ?? '' }}</span>
                @enderror
            </div>
        </div>


        <div class="form-group">
            <label>Nome da Sua Empresa</label>
            {{form::text('name',null,['class'=>'form-control']) }}
            @error('name')
            <span class="text-danger">{{ $message ?? '' }}</span>
            @enderror
        </div>

        <div class="row">
            <div class="form-group col-sm-12 col-md-6">
                <label>CNPJ</label>
                {{form::text('cpf_cnpj',null,['class'=>'form-control']) }}
                @error('cpf_cnpj')
                <span class="text-danger">{{ $message ?? '' }}</span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6">
                <label>Site</label>
                {{form::text('site',null,['class'=>'form-control']) }}
                @error('site')
                <span class="text-danger">{{ $message ?? '' }}</span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-12 col-md-6">
                <label>Telefone</label>
                {{form::text('phone',null,['class'=>'form-control']) }}
                @error('phone')
                <span class="text-danger">{{ $message ?? '' }}</span>
                @enderror
            </div>
            <div class="form-group col-sm-12 col-md-6">
                <label>Celular</label>
                {{form::text('mobile_phone',null,['class'=>'form-control']) }}
                @error('mobile_phone')
                <span class="text-danger">{{ $message ?? '' }}</span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-12 col-md-2">
                <label>CEP</label>
                {{form::text('zipcode',null,['class'=>'form-control','id'=>"cep"]) }}
                @error('zipcode')
                <span class="text-danger">{{ $message ?? '' }}</span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-8">
                <label>Rua</label>
                {{form::text('address',null,['class'=>'form-control','id'=>"rua"]) }}
                @error('address')
                <span class="text-danger">{{ $message ?? '' }}</span>
                @enderror
            </div>
            <div class="form-group col-sm-12 col-md-2">
                <label>Número</label>
                {{form::text('address_number',null,['class'=>'form-control','id'=>"rua"]) }}
                @error('address_number')
                <span class="text-danger">{{ $message ?? '' }}</span>
                @enderror
            </div>
        </div>


        <div class="row">
            <div class="form-group col-md-4 col-sm-12">
                <label>UF</label>
                {{form::text('state',null,['class'=>'form-control','readonly'=>"true",'id'=>"uf"]) }}
            </div>


            <div class="form-group col-md-4 col-sm-12">
                <label>Cidade</label>
                {{form::text('city',null,['class'=>'form-control','id'=>'cidade']) }}
                @error('city')
                <span class="text-danger">{{ $message ?? '' }}</span>
                @enderror
            </div>

            <div class="form-group col-md-4 col-sm-12">
                <label>Bairro</label>
                {{form::text('province',null,['class'=>'form-control','id'=>'bairro']) }}
                @error('province')
                <span class="text-danger">{{ $message ?? '' }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label>Email</label>
            {{form::email('email',null,['class'=>'form-control']) }}
            @error('email')
            <span class="text-danger">{{ $message ?? '' }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label>Senha</label>
            <input type="password" name="password" class="form-control">
            @error('password')
            <span class="text-danger">{{ $message ?? '' }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label>Repetir Senha</label>
            <input type="password" name="password_confirmation" class="form-control">
            @error('password_confirmation')
            <span class="text-danger">{{ $message ?? '' }}</span>
            @enderror
        </div>
        <input type="hidden" name="ibge" value="" id="ibge">
        <div class="text-center">
            <button type="submit" class="btn full_colored">
                Registrar
            </button>
        </div>
        {!! Form::close() !!}

    </div>
</div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/viaCep.js') }}"></script>
@endsection