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
    <label>Descricao</label>
    <input class="form-control" name="description" type="text" value="{{ $promotion->description ?? @old('description') }}">
    @error('description')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group  @error('expiration_date') has-error @enderror">
    <label>Data Expiração:</label>
    <input class="form-control" name="expiration_date" type="date" value="{{ $promotion->expiration_date ?? @old('expiration_date') }}">
    @error('expiration_date')
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


<div class="form-group  @error('qty_available') has-error @enderror">
    <label>Quantidades</label>
    <input class="form-control" name="qty_available" type="text" value="{{ $promotion->qty_available ?? @old('qty_available') }}">
    @error('qty_available')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group  @error('redemption_rules') has-error @enderror">
    <label>Regras de Resgate</label>
    <textarea name="redemption_rules" id="" cols="30" rows="10" class="form-control">

    </textarea>
    @error('redemption_rules')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<a href="{{route('promotions.index')}}" type="reset" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>