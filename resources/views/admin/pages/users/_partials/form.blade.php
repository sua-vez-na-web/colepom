<div class="form-group col-lg-12 col-sm-12  @error('name') has-error @enderror">
    <label>Nome</label>
    <input class="form-control" name="name" type="text" value="{{ $user->name ?? @old('name') }}">
    @error('name')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group col-lg-12 col-sm-12  @error('email') has-error @enderror">
    <label>Email</label>
    <input class="form-control" name="email" type="text" value="{{ $user->email ?? @old('email') }}">
    @error('email')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group col-md-12 col-sm-12  @error('role_id') has-error @enderror">
    <label>Perfil</label>
    {!! Form::select('role_id',$roles,null,['class'=>'form-control','placeholder'=>'Selecione...']) !!}
    @error('role_id')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group col-lg-12">
    <label for="">Ativo?</label>
    {!! Form::select('is_active',[
    '1' => 'Ativo','0' => 'Inativo'],null,['class'=>'form-control','placeholder'=>'Selecione...']) !!}
    @error('is_active')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group col-md-12 col-sm-12  @error('role_id') has-error @enderror">
    <label>Senha</label>
    <input class="form-control" name="password" type="password">
    <span class="text-danger">Deixe esse campo vazio para manter a senha atual se estiver editando o registro</span>
    @error('password')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>




<a href="{{route('users.index')}}" type="reset" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>