@extends('admin.layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Editar Promocao</h3>
                </div>
                <div class="panel-body">
                    {!! Form::model($promotion,['route'=>['promotions.update',$promotion->id],'enctype'=>"multipart/form-data"]) !!}
                    <!-- <form action="{{ route('promotions.update',$promotion->id) }}" method="post"> -->
                    @method('PUT')
                    @csrf
                    {{--@include('admin.pages.promotions._partials.form')--}}
                    <div class="form-group  @error('image') has-error @enderror">
                        <label>Imagem</label>
                        <input type="file" name="image" id="" class="dropify">
                        @error('image')
                        <span class="text-danger">{{ $message ?? '' }}</span>
                        @enderror
                    </div>


                    <div class="form-group  @error('category_id') has-error @enderror">
                        <label>Categoria</label>
                        {!! Form::select('category_id',$categories,null,['class'=>'form-control','placeholder'=>"Selecione..."]) !!}
                        @error('category_id')
                        <span class="text-danger">{{ $message ?? '' }}</span>
                        @enderror
                    </div>

                    <div class="form-group  @error('store_id') has-error @enderror">
                        <label>Estabelecimento</label>
                        {!! Form::select('store_id',$stores,null,['class'=>'form-control','placeholder'=>"Selecione"]) !!}
                        @error('store_id')
                        <span class="text-danger">{{ $message ?? '' }}</span>
                        @enderror
                    </div>

                    <div class="form-group  @error('title') has-error @enderror">
                        <label>Titulo</label>
                        <input class="form-control" name="title" type="text" value="{{ $promotion->title ?? @old('title') }}">
                        @error('title')
                        <span class="text-danger">{{ $message ?? '' }}</span>
                        @enderror
                    </div>

                    <div class="form-group  @error('description') has-error @enderror">
                        <label>Descrição</label>
                        <input class="form-control" name="description" type="text" value="{{ $promotion->description ?? @old('description') }}">
                        @error('description')
                        <span class="text-danger">{{ $message ?? '' }}</span>
                        @enderror
                    </div>

                    <div class="form-group  @error('expiration_date') has-error @enderror">
                        <label>Data Expiração:</label>
                        <input class="form-control" name="expiration_date" type="date" value="{{ $promotion->expiration_date->format('Y-m-d') ?? @old('expiration_date') }}">
                        <p class="help-block">Data limite que a promoção estará disponível.</p>
                        @error('expiration_date')
                        <span class="text-danger">{{ $message ?? '' }}</span>
                        @enderror
                    </div>

                    <div class="form-group  @error('redeem_expiration_date') has-error @enderror">
                        <label>Data Limite para Resgate:</label>
                        <input class="form-control" name="redeem_expiration_date" type="date" value="{{ $promotion->redeem_expiration_date->format('Y-m-d') ?? @old('redeem_expiration_date') }}">
                        <p class="help-block">Data Limite que o Associado poderá resgatar.</p>
                        @error('redeem_expiration_date')
                        <span class="text-danger">{{ $message ?? '' }}</span>
                        @enderror
                    </div>

                    <div class="form-group  @error('original_value') has-error @enderror">
                        <label>Valor Original (R$)</label>
                        <input class="form-control" name="original_value" type="text" value="{{ $promotion->original_value ?? @old('original_value') }}">
                        @error('original_value')
                        <span class="text-danger">{{ $message ?? '' }}</span>
                        @enderror
                    </div>

                    <div class="form-group  @error('discount') has-error @enderror">
                        <label>Desconto (%)</label>
                        <input class="form-control" name="discount" type="text" value="{{ $promotion->discount ?? @old('discount') }}">
                        @error('discount')
                        <span class="text-danger">{{ $message ?? '' }}</span>
                        @enderror
                    </div>


                    <div class="form-group  @error('quantity') has-error @enderror">
                        <label>Quantidade</label>
                        <input class="form-control" name="quantity" type="text" value="{{ $promotion->quantity ?? @old('quantity') }}">
                        @error('quantity')
                        <span class="text-danger">{{ $message ?? '' }}</span>
                        @enderror
                    </div>

                    <div class="form-group  @error('rules') has-error @enderror">
                        <label>Regras de Resgate</label>
                        <textarea name="rules" id="" cols="30" rows="10" class="form-control">
                        {{$promotion->rules ?? @old('rules')}}
                        </textarea>
                        @error('rules')
                        <span class="text-danger">{{ $message ?? '' }}</span>
                        @enderror
                    </div>

                    <a href="{{route('promotions.index')}}" type="reset" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection