<div class="form-group  @error('category_id') has-error @enderror">
    <label>Categoria</label>    
    {!! Form::select('category_id',$categories,null,['class'=>'form-control']) !!}
    @error('category_id')
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

<div class="form-group  @error('code') has-error @enderror">
    <label>Codigo</label>
    <input class="form-control" name="code" type="text" value="{{ $partner->code ?? @old('code') }}">
    @error('code')
        <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group  @error('title') has-error @enderror">
    <label>Titulo</label>
    <input class="form-control" name="title" type="text" value="{{ $partner->title ?? @old('title') }}">
    @error('title')
        <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group  @error('description') has-error @enderror">
    <label>Descricao</label>
    <input class="form-control" name="description" type="text" value="{{ $partner->description ?? @old('description') }}">
    @error('description')
        <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group  @error('due_date') has-error @enderror">
    <label>Validade</label>
    <input class="form-control" name="due_date" type="date" value="{{ $partner->due_date ?? @old('due_date') }}">
    @error('due_date')
        <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group  @error('amount') has-error @enderror">
    <label>Desconto (%)</label>
    <input class="form-control" name="amount" type="text" value="{{ $partner->amount ?? @old('amount') }}">
    @error('amount')
        <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<a href="{{route('promotions.index')}}" type="reset" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>

               