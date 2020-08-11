<div class="form-group  @error('category_id') has-error @enderror">
    <label>Categoria</label>
    {!! Form::select('category_id',$categories,null,['class'=>'form-control','placeholder'=>"Selecione..."]) !!}
    @error('category_id')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group  @error('name') has-error @enderror">
    <label>Nome</label>
    <input class="form-control" name="name" type="text" value="{{ $store->name ?? @old('name') }}">
    @error('name')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="row">
    <div class="form-group col-md-1">
        <label for="cep">Cep</label>
        <input type="text" id="cep" name="zip_code" class="form-control" value="{{ $store->zip_code ?? @old('zip_code') }}">
    </div>
    <div class="form-group col-md-3">
        <label for="ru">Rua/Logradouro</label>
        <input type="text" id="rua" name="address" class="form-control" value="{{ $store->address ?? @old('address') }}">
    </div>
    <div class="form-group col-md-2">
        <label for="cep">Cidade</label>
        <input type="text" id="cidade" name="city" class="form-control" value="{{ $store->city ?? @old('city') }}">
    </div>
    <div class="form-group col-md-2">
        <label for="cep">Bairro</label>
        <input type="text" id="bairro" name="neighborhood" class="form-control" value="{{ $store->neighborhood ?? @old('neighborhood') }}">
    </div>
    <div class="form-group col-md-1">
        <label for="cep">UF</label>
        <input type="text" id="uf" name="state" class="form-control" value="{{ $store->state ?? @old('state') }}">
    </div>
</div>

<div class="form-group  @error('phone') has-error @enderror">
    <label>Telefone</label>
    <input class="form-control phone" name="phone" type="text" value="{{ $store->phone ?? @old('phone') }}">
    @error('phone')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group  @error('alt_phone') has-error @enderror">
    <label>Telefone Alternativo</label>
    <input class="form-control phone" name="alt_phone" type="text" value="{{ $store->alt_phone ?? @old('alt_phone') }}">
    @error('alt_phone')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="row">
    <div class="form-group col-md-4">
        <label for="cep">Latitude</label>
        <input type="text" name="lat" class="form-control" value="{{ $store->lat ?? @old('lat') }}">
    </div>
    <div class="form-group col-md-4">
        <label for="ru">Longitude</label>
        <input type="text" name="lng" class="form-control" value="{{ $store->lng ?? @old('lng') }}">
    </div>
</div>

<a href="{{route('stores.index')}}" type="reset" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>