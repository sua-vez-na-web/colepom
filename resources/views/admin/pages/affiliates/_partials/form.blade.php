<div class="form-group @error('first_name') has-error @enderror">
    <label for="syndicate_id">Sindicato</label>
    {!! Form::select('syndicate_id',$syndicates,null,['class'=>'form-control','placeholder'=>'Selecione...']) !!}
</div>

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

<div class="form-group  @error('mobile_phone') has-error @enderror">
    <label>Telefone</label>
    <input class="form-control" name="mobile_phone" type="mobile_phone" value="{{ $syndicate->mobile_phone ?? @old('mobile_phone') }}">
    @error('mobile_phone')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>


<h4>Localização</h4>
<hr>
<div class="row">
    <div class="form-group col-md-2 col-sm-12  @error('zipcode') has-error @enderror">
        <label>Cep</label>
        <input class="form-control" name="zipcode" type="text" value="{{ $syndicate->zipcode ?? @old('zipcode') }}">
        @error('zipcode')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
    <div class="form-group col-md-8 col-sm-12  @error('address') has-error @enderror">
        <label>Endereco</label>
        <input class="form-control" name="address" type="text" value="{{ $syndicate->address ?? @old('address') }}">
        @error('address')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
    <div class="form-group col-md-2 col-sm-12  @error('address_number') has-error @enderror">
        <label>Numero</label>
        <input class="form-control" name="address_number" type="text" value="{{ $syndicate->address_number ?? @old('address_number') }}">
        @error('address_number')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="form-group col-md-4 col-sm-12  @error('city') has-error @enderror">
        <label>Cidade</label>
        <input class="form-control" name="city" type="text" value="{{ $syndicate->city ?? @old('city') }}">
        @error('city')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
    <div class="form-group col-md-4 col-sm-12  @error('province') has-error @enderror">
        <label>Estado</label>
        <input class="form-control" name="province" type="text" value="{{ $syndicate->province ?? @old('province') }}">
        @error('province')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
    <div class="form-group col-md-4 col-sm-12  @error('address_complement') has-error @enderror">
        <label>Complemento</label>
        <input class="form-control" name="address_complement" type="text" value="{{ $syndicate->address_complement ?? @old('address_complement') }}">
        @error('address_complement')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
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