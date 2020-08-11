<div class="form-group  @error('first_name') has-error @enderror">
    <label>Nome</label>
    <input class="form-control" name="first_name" type="text" value="{{ $syndicate->first_name ?? @old('first_name') }}">
    @error('first_name')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group  @error('last_name') has-error @enderror">
    <label>Sobre Nome</label>
    <input class="form-control" name="last_name" type="text" value="{{ $syndicate->last_name ?? @old('last_name') }}">
    @error('last_name')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group  @error('birth_of_date') has-error @enderror">
    <label>Data de Nasc.</label>
    <input class="form-control" name="birth_of_date" type="date" value="{{ $syndicate->birth_of_date ?? @old('birth_of_date') }}">
    @error('birth_of_date')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="row">
    <div class="form-group col-md-1">
        <label for="cep">Cep</label>
        <input type="text" id="cep" name="zip_code" class="form-control">
    </div>
    <div class="form-group col-md-3">
        <label for="ru">Rua/Logradouro</label>
        <input type="text" id="rua" name="address" class="form-control">
    </div>
    <div class="form-group col-md-2">
        <label for="cep">Cidade</label>
        <input type="text" id="cidade" name="city" class="form-control">
    </div>
    <div class="form-group col-md-2">
        <label for="cep">Bairro</label>
        <input type="text" id="bairro" name="neighborhood" class="form-control">
    </div>
    <div class="form-group col-md-1">
        <label for="cep">UF</label>
        <input type="text" id="uf" name="state" class="form-control">
    </div>
</div>

<div class="form-group  @error('genre') has-error @enderror">
    <label>Genero</label>
    <!-- <input class="form-control" name="genre" type="text" value="{{ $syndicate->genre ?? @old('genre') }}"> -->
    {!! Form::select('genre',[
    'M' => 'Masculino',
    'F' => 'Feminino'],null,['class'=>'form-control']) !!}
    @error('genre')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group  @error('company') has-error @enderror">
    <label>Empresa</label>
    <input class="form-control" name="company" type="text" value="{{ $syndicate->company ?? @old('company') }}">
    @error('company')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group  @error('job_post') has-error @enderror">
    <label>Cargo</label>
    <input class="form-control" name="job_post" type="text" value="{{ $syndicate->job_post ?? @old('job_post') }}">
    @error('job_post')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group  @error('document') has-error @enderror">
    <label>CPF</label>
    <input class="form-control cpf" name="document" type="text" value="{{ $syndicate->document ?? @old('document') }}">
    @error('document')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group  @error('email') has-error @enderror">
    <label>Email</label>
    <input class="form-control" name="email" type="email" value="{{ $syndicate->email ?? @old('email') }}">
    @error('email')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>


<a href="{{route('syndicates.index')}}" type="reset" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>