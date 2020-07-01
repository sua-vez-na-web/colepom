<div class="form-group  @error('name') has-error @enderror">
    <label>Nome da Categoria</label>
    <input class="form-control" name="name" type="text" value="{{ $category->name ?? @old('name') }}">
    @error('name')
        <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group  @error('description') has-error @enderror">
    <label>Descricao</label>
    <input class="form-control" name="description" type="text" value="{{ $category->description ?? @old('description') }}">
    @error('description')
        <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group  @error('role_id') has-error @enderror">
    <label>Perfil ID</label>
    <input class="form-control" name="role_id" type="text" value="{{ $category->role_id ?? @old('role_id') }}">
    @error('role_id')
        <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>



<a href="{{route('categories.index')}}" type="reset" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>

               