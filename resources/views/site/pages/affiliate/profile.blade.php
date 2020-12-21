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
        <div class="col-md-4">
            @include('site.pages.affiliate.partials.side_menu')
        </div>
        <div class="col-md-8">
            {!! Form::open(['route'=>'affiliates.update-profile']) !!}

            <div class="form-group">
                <label>Email</label>
                {{form::email('email',$profile->email,['class'=>'form-control','readonly'=>'true']) }}
                @error('email')
                <span class="text-danger">{{ $message ?? '' }}</span>
                @enderror
            </div>

            <div class="row">
                <div class="form-group col-sm-12 col-md-6">
                    <label>Nome</label>
                    {{form::text('first_name',$profile->first_name,['class'=>'form-control']) }}
                    @error('first_name')
                    <span class="text-danger">{{ $message ?? '' }}</span>
                    @enderror
                </div>

                <div class="form-group col-sm-12 col-md-6">
                    <label>Sobrenome</label>
                    {{form::text('last_name',$profile->last_name,['class'=>'form-control']) }}
                    @error('last_name')
                    <span class="text-danger">{{ $message ?? '' }}</span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-12 col-md-6">
                    <label>Nascimento</label>
                    {{form::date('birth_of_date',$profile->birth_of_date,['class'=>'form-control']) }}
                    @error('birth_of_date')
                    <span class="text-danger">{{ $message ?? '' }}</span>
                    @enderror
                </div>

                <div class="form-group col-sm-12 col-md-6">
                    <label>Genero</label>
                    <div class="input-group">
                        <label class="radio-inline">
                            <input name="genre" type="radio" value="M" {{$profile->genre == 'M' ? 'checked' : ''}}> Masculino
                        </label>

                        <label class="radio-inline mx-4">
                            <input name="genre" type="radio" value="F" {{$profile->genre == 'F' ? 'checked' : ''}}> Feminino
                        </label>
                    </div>
                    @error('genre')
                    <span class="text-danger">{{ $message ?? '' }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label>Empresa</label>
                {{form::text('company',$profile->company,['class'=>'form-control']) }}
                @error('company')
                <span class="text-danger">{{ $message ?? '' }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Função</label>
                {{form::text('job_post',$profile->job_post,['class'=>'form-control']) }}
                @error('job_post')
                <span class="text-danger">{{ $message ?? '' }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>CPF</label>
                {{form::text('document',$profile->document,['class'=>'form-control']) }}
                @error('document')
                <span class="text-danger">{{ $message ?? '' }}</span>
                @enderror
            </div>

            <div class="row">
                <div class="form-group col-sm-12 col-md-2">
                    <label>CEP</label>
                    {{form::text('zipcode',$profile->zipcode,['class'=>'form-control','id'=>"cep"]) }}
                    @error('zipcode')
                    <span class="text-danger">{{ $message ?? '' }}</span>
                    @enderror
                </div>

                <div class="form-group col-sm-12 col-md-8">
                    <label>Rua</label>
                    {{form::text('address',$profile->address,['class'=>'form-control','id'=>"rua"]) }}
                    @error('address')
                    <span class="text-danger">{{ $message ?? '' }}</span>
                    @enderror
                </div>
                <div class="form-group col-sm-12 col-md-2">
                    <label>Número</label>
                    {{form::text('address_number',$profile->address_number,['class'=>'form-control','id'=>"rua"]) }}
                    @error('address_number')
                    <span class="text-danger">{{ $message ?? '' }}</span>
                    @enderror
                </div>
            </div>


            <div class="row">
                <div class="form-group col-md-4 col-sm-12">
                    <label>UF</label>
                    {{form::text('state',$profile->state,['class'=>'form-control','id'=>"uf"]) }}
                </div>


                <div class="form-group col-md-4 col-sm-12">
                    <label>Cidade</label>
                    {{form::text('city',$profile->city,['class'=>'form-control','id'=>'cidade']) }}
                    @error('city')
                    <span class="text-danger">{{ $message ?? '' }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-4 col-sm-12">
                    <label>Bairro</label>
                    {{form::text('province',$profile->province,['class'=>'form-control','id'=>'bairro']) }}
                    @error('province')
                    <span class="text-danger">{{ $message ?? '' }}</span>
                    @enderror
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn full_colored">
                    Atualizar
                </button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection