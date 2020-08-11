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

<div class="form-group  @error('code') has-error @enderror">
    <label>Codigo</label>
    <div class="input-group">
        <input class="form-control" name="code" type="text" value="{{ $promotion->code ?? @old('code') }}">
        <span class="input-group-btn">
            <button class="btn btn-primary" type="button" id="btnGerarCodigo">Gerar Codigo!</button>
        </span>
    </div>
    @error('code')
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

<div class="form-group  @error('due_date') has-error @enderror">
    <label>Data Expiração:</label>
    <input class="form-control" name="due_date" type="date" value="{{ $promotion->due_date ?? @old('due_date') }}">
    @error('due_date')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group  @error('amount') has-error @enderror">
    <label>Desconto (%)</label>
    <input class="form-control" name="amount" type="text" value="{{ $promotion->amount ?? @old('amount') }}">
    @error('amount')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<a href="{{route('promotions.index')}}" type="reset" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>

@section('js')
<script>
    $('#btnGerarCodigo').on('click', function(e) {
        e.preventDefault();

        $.ajax({
            type: "GET",
            url: "{{route('promotion.generate-code')}}",
            success: (response) => {
                $("input[name='code']").val(response);
            },
            error: (error) => {
                console.log(error)
            }
        })
    })
</script>

@endsection