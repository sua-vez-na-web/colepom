<div class="form-group  @error('image') has-error @enderror">
    <label>Imagem</label>
    <input type="file" name="image" id="" class="dropify">
    @error('image')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<h4>Dados Gerais</h4>
<hr>

<div class="form-group @error('partner_id') has-error @enderror">
    <label for="partner_id">Parceiro</label>
    {!! Form::select('partner_id',$partners,null,['class'=>'form-control','placeholder'=>'Selecione...']) !!}
</div>

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

<div class="form-group  @error('phone') has-error @enderror">
    <label>Telefone</label>
    <input class="form-control phone" name="phone" type="text" value="{{ $store->phone ?? @old('phone') }}">
    @error('phone')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>
<div class="form-group  @error('mobile_phone') has-error @enderror">
    <label>Celular</label>
    <input class="form-control mobile-phone" name="mobile_phone" type="text" value="{{ $store->mobile_phone ?? @old('mobile_phone') }}">
    @error('mobile_phone')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>



<div class="form-group">
    <label for="cep">Latitude</label>
    <input type="text" name="lat" class="form-control" value="{{ $store->lat ?? @old('lat') }}">
</div>
<div class="form-group">
    <label for="ru">Longitude</label>
    <input type="text" name="lng" class="form-control" value="{{ $store->lng ?? @old('lng') }}">
</div>


<h4>Localização</h4>
<hr>
<div class="row">
    <div class="form-group col-md-2 col-sm-12  @error('zipcode') has-error @enderror">
        <label>Cep</label>
        <input class="form-control zip-code" name="zipcode" type="text" value="{{ $store->zipcode ?? @old('zipcode') }}" id="cep">
        @error('zipcode')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
    <div class="form-group col-md-8 col-sm-12  @error('address') has-error @enderror">
        <label>Endereco</label>
        <input class="form-control" name="address" type="text" value="{{ $store->address ?? @old('address') }}" id="rua">
        @error('address')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
    <div class="form-group col-md-2 col-sm-12  @error('address_number') has-error @enderror">
        <label>Numero</label>
        <input class="form-control" name="address_number" type="text" value="{{ $store->address_number ?? @old('address_number') }}">
        @error('address_number')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="form-group col-md-4 col-sm-12  @error('city') has-error @enderror">
        <label>Cidade</label>
        <input class="form-control" name="city" type="text" value="{{ $store->city ?? @old('city') }}" id="cidade">
        @error('city')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
    <div class="form-group col-md-4 col-sm-12  @error('province') has-error @enderror">
        <label>Estado</label>
        <input class="form-control" name="province" type="text" value="{{ $store->province ?? @old('province') }}" id="uf">
        @error('province')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
    <div class="form-group col-md-4 col-sm-12  @error('address_complement') has-error @enderror">
        <label>Complemento</label>
        <input class="form-control" name="address_complement" type="text" value="{{ $store->address_complement ?? @old('address_complement') }}">
        @error('address_complement')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
</div>

<input type="hidden" name="ibge" value="" id="ibge">
<a href="{{route('stores.index')}}" type="reset" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>