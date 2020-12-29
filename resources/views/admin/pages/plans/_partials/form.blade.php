<div class="form-group  @error('name') has-error @enderror">
    <label>Nome</label>
    <input class="form-control" name="name" type="text" value="{{ $category->name ?? @old('name') }}">
    @error('name')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group  @error('description') has-error @enderror">
    <label>Descrição</label>
    <input class="form-control" name="description" type="text" value="{{ $category->description ?? @old('description') }}">
    @error('description')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group  @error('amount') has-error @enderror">
    <label>Preço</label>
    <input class="form-control" name="amount" type="number" value="{{ $category->amount ?? @old('amount') }}" step="0.01">
    @error('amount')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="cicly">Ciclo</label>
    <select name="cycle" id="" class="form-control">
        <option value disabled {{ old('cycle', null) === null ? 'selected' : '' }}>Selecione</option>
        @foreach(App\Models\Plan::CYCLE as $key => $label)
        <option value="{{ $key }}" {{ old('cycle', '') === (string) $key ? 'selected' : '' }}>{{$label}}</option>
        @endforeach
    </select>
</div>

<a href="{{route('categories.index')}}" type="reset" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>