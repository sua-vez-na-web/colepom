
<div class="row">
    @if ($cupom->is_used === 1)

    <div class="form-group col-md-6 col-sm-12  @error('code') has-error @enderror">
        <label>Código do cupom</label>
        <input class="form-control" name="code" type="text" value="{{ $cupom->code ?? @old('code') }}" disabled>
        @error('code')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>

    @else

    <div class="form-group col-md-6 col-sm-12  @error('code') has-error @enderror">
        <label>Código do cupom</label>
        <input class="form-control" name="code" type="text" value="{{ $cupom->code ?? @old('code') }}">
        @error('code')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>

    @endif
    <div class="form-group col-md-6 col-sm-12  @error('discount') has-error @enderror">
        <label>Valor de desconto</label>
        <input class="form-control" name="discount" type="text" value="{{ $cupom->discount ?? @old('discount') }}" disabled>
        @error('discount')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6 col-sm-12  @error('promotion_id') has-error @enderror">
        <label>Promoção aplicada</label>
        <input class="form-control" name="promotion_id" type="text" value="{{ $promotion->title ?? @old('discount') }}" disabled>
        @error('promotion_id')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
    <div class="form-group col-md-3 col-sm-12  @error('is_used') has-error @enderror">
        <label>Usado</label>
        <input class="form-control" name="is_used" type="text" value="@if ($cupom->is_used === 1) Sim @else Nao @endif" disabled>
        @error('created_at')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
    <div class="form-group col-md-3 col-sm-12  @error('created_at') has-error @enderror">
        <label>Data do cupom</label>
        <input class="form-control" name="created_at" type="text" value="{{ $cupom->created_at->format('d/m/Y h:m') ?? @old('created_at') }}" disabled>
        @error('created_at')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
</div>
<a href="{{route('coupons.index')}}" type="reset" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>
