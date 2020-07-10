<div class="form-group  @error('category_id') has-error @enderror">
    <label>Categoria</label>    
    {!! Form::select('category_id',$categories,null,['class'=>'form-control']) !!}
    @error('category_id')
        <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group  @error('syndicate_id') has-error @enderror">
    <label>Sindicato ID</label>
    <input class="form-control" name="syndicate_id" type="text" value="{{ $partner->syndicate_id ?? @old('syndicate_id') }}">
    @error('syndicate_id')
        <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group  @error('partner_id') has-error @enderror">
    <label>Parceiro ID</label>
    <input class="form-control" name="partner_id" type="text" value="{{ $partner->partner_id ?? @old('partner_id') }}">
    @error('partner_id')
        <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group  @error('name') has-error @enderror">
    <label>Nome</label>
    <input class="form-control" name="name" type="text" value="{{ $partner->name ?? @old('name') }}">
    @error('name')
        <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group  @error('phone') has-error @enderror">
    <label>Cep / Codigo Postal</label>
    <input class="form-control" name="zip_code" type="zip_code" value="{{ $partner->zip_code ?? @old('zip_code') }}">
    @error('zip_code')
        <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group  @error('phone') has-error @enderror">
    <label>Telfone</label>
    <input class="form-control" name="phone" type="phone" value="{{ $partner->phone ?? @old('phone') }}">
    @error('phone')
        <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>


<a href="{{route('stores.index')}}" type="reset" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>

               