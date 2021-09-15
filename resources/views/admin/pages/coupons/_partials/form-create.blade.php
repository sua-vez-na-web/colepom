
<div class="row">
    <div class="form-group col-md-6 col-sm-12  @error('code') has-error @enderror">
        <label>Código do cupom</label>
        <input class="form-control" name="code" type="text" value="{{ @old('code') }}">
        @error('code')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
    <div class="form-group col-md-6 col-sm-12  @error('discount') has-error @enderror">
        <label>Valor de desconto</label>
        <input class="form-control" name="discount" type="text"  value="{{ @old('discount') }}">
        @error('discount')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6 col-sm-12   @if($errors->count() > 0) has-error @endif">
        <label>Promoção aplicada</label>
        <select class="form-control" name="promotion_id">
            @foreach ($promotions as $promotion)
                <option value="{{ $promotion->id }}">{{ $promotion->id }}: {{ $promotion->title }}</option>
            @endforeach
        </select>
        @if($errors->count() > 0)
        <span class="text-danger">{{ 'Selecione a promoção novamente' }}</span>
        @endif
    </div>
</div>
<a href="{{route('coupons.index')}}" type="reset" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>