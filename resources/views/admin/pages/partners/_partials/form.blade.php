<div class="row">
    <div class="form-group col-md-6 col-sm-12  @error('category_id') has-error @enderror">
        <label>Categoria</label>
        {!! Form::select('category_id',$categories,null,['class'=>'form-control','placeholder'=>'Selecione...']) !!}
        @error('category_id')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
</div>


<h4>Dados Gerais</h4>
<hr>
<div class="row">
    <div class="form-group col-md-6 col-sm-12  @error('name') has-error @enderror">
        <label>Nome</label>
        <input class="form-control" name="name" type="text" value="{{ $partner->name ?? @old('name') }}">
        @error('name')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>

    <div class="form-group col-md-6 col-sm-12  @error('social_reason') has-error @enderror">
        <label>Razão Social</label>
        <input class="form-control" name="social_reason" type="text" value="{{ $partner->social_reason ?? @old('social_reason') }}">
        @error('social_reason')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="form-group col-md-3 col-sm-12  @error('cpf_cnpj') has-error @enderror">
        <label>CNPJ</label>
        <input class="form-control cnpj" name="cpf_cnpj" type="text" value="{{ $partner->cpf_cnpj ?? @old('cpf_cnpj') }}">
        @error('cpf_cnpj')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>

    <div class="form-group col-md-6 col-sm-12  @error('email') has-error @enderror">
        <label>Email</label>
        <input class="form-control" name="email" type="email" value="{{ $partner->email ?? @old('email') }}">
        @error('email')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="form-group col-md-3 col-sm-12  @error('phone') has-error @enderror">
        <label>Telefone</label>
        <input class="form-control cnpj" name="phone" type="text" value="{{ $partner->phone ?? @old('phone') }}">
        @error('phone')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
    <div class="form-group col-md-3 col-sm-12  @error('mobile_phone') has-error @enderror">
        <label>Celular</label>
        <input class="form-control cnpj" name="mobile_phone" type="text" value="{{ $partner->mobile_phone ?? @old('mobile_phone') }}">
        @error('mobile_phone')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
</div>

<h4>Localização</h4>
<hr>
<div class="row">
    <div class="form-group col-md-2 col-sm-12  @error('zipcode') has-error @enderror">
        <label>Cep</label>
        <input class="form-control" name="zipcode" type="text" value="{{ $partner->zipcode ?? @old('zipcode') }}">
        @error('zipcode')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
    <div class="form-group col-md-8 col-sm-12  @error('address') has-error @enderror">
        <label>Endereco</label>
        <input class="form-control" name="address" type="text" value="{{ $partner->address ?? @old('address') }}">
        @error('address')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
    <div class="form-group col-md-2 col-sm-12  @error('address_number') has-error @enderror">
        <label>Numero</label>
        <input class="form-control" name="address_number" type="text" value="{{ $partner->address_number ?? @old('address_number') }}">
        @error('address_number')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="form-group col-md-4 col-sm-12  @error('city') has-error @enderror">
        <label>Cidade</label>
        <input class="form-control" name="city" type="text" value="{{ $partner->city ?? @old('city') }}">
        @error('city')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
    <div class="form-group col-md-4 col-sm-12  @error('province') has-error @enderror">
        <label>Estado</label>
        <input class="form-control" name="province" type="text" value="{{ $partner->province ?? @old('province') }}">
        @error('province')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
    <div class="form-group col-md-4 col-sm-12  @error('address_complement') has-error @enderror">
        <label>Complemento</label>
        <input class="form-control" name="address_complement" type="text" value="{{ $partner->address_complement ?? @old('address_complement') }}">
        @error('address_complement')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
</div>

<h4>Redes Sociais</h4>
<hr>
<div class="row">
    <div class="form-group col-md-3 col-sm-12  @error('site') has-error @enderror">
        <label>Site</label>
        <input class="form-control" name="site" type="text" value="{{ $partner->site ?? @old('site') }}">
        @error('site')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>

    <div class="form-group col-md-3 col-sm-12  @error('facebook') has-error @enderror">
        <label>Facebook</label>
        <input class="form-control" name="facebook" type="text" value="{{ $partner->facebook ?? @old('facebook') }}">
        @error('facebook')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>

    <div class="form-group col-md-3 col-sm-12  @error('instagram') has-error @enderror">
        <label>Instagram</label>
        <input class="form-control" name="instagram" type="instagram" value="{{ $partner->instagram ?? @old('instagram') }}">
        @error('instagram')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>

    <div class="form-group col-md-3 col-sm-12  @error('youtube') has-error @enderror">
        <label>Youtube</label>
        <input class="form-control" name="youtube" type="text" value="{{ $partner->youtube ?? @old('youtube') }}">
        @error('youtube')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
</div>

@if(!Request::segment(4) == 'edit')
<h4>Acesso</h4>
<hr>
<div class="row">
    <div class="form-group col-md-3 col-sm-12  @error('username') has-error @enderror">
        <label>Nome do Usuário</label>
        <input class="form-control" name="username" type="username" value="{{ $partner->username ?? @old('username') }}">
        @error('username')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
</div>
@endif
<a href="{{route('partners.index')}}" type="reset" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>