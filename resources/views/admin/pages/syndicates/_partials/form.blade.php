<h4>Dados Gerais</h4>
<hr>
<div class="row">
    <div class="form-group col-md-6 col-sm-12">
        <div class="form-group">
            <label for="brand">Logo</label>
            <input type="file" class="form-control" name="brand">
        </div>

    </div>
    @if(isset($syndicate))
        <div class="form-group col-md-6">
            <div class="col-md-6 col-sm-12">
                <img src="{{ $syndicate->image }}" alt="" class="img-thumbnail">
            </div>
        </div>
    @endif
</div>
<div class="row">
    <div class="form-group col-md-6 col-sm-12  @error('name') has-error @enderror">
        <label>Nome</label>
        <input class="form-control" name="name" type="text" value="{{ $syndicate->name ?? @old('name') }}">
        @error('name')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>

    <div class="form-group col-md-6 col-sm-12  @error('president_name') has-error @enderror">
        <label>Presidente</label>
        <input class="form-control" name="president_name" type="text"
               value="{{ $syndicate->president_name ?? @old('president_name') }}">
        @error('president_name')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="form-group col-md-3 col-sm-12  @error('cpf_cnpj') has-error @enderror">
        <label>CNPJ</label>
        <input class="form-control cnpj" name="cpf_cnpj" type="text"
               value="{{ $syndicate->cpf_cnpj ?? @old('cpf_cnpj') }}">
        @error('cpf_cnpj')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>

    <div class="form-group col-md-4 col-sm-12  @error('email') has-error @enderror">
        <label>Email</label>
        <input class="form-control" name="email" type="email" value="{{ $syndicate->email ?? @old('email') }}">
        @error('email')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>

    <div class="form-group col-md-2">
        <label class="form-check-label" for="exampleCheck2"> </label>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Nofitificar Asaas</label>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-3 col-sm-12  @error('phone') has-error @enderror">
        <label>Telefone</label>
        <input class="form-control cnpj" name="phone" type="text" value="{{ $syndicate->phone ?? @old('phone') }}">
        @error('phone')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
    <div class="form-group col-md-3 col-sm-12  @error('mobile_phone') has-error @enderror">
        <label>Celular</label>
        <input class="form-control cnpj" name="mobile_phone" type="text"
               value="{{ $syndicate->mobile_phone ?? @old('mobile_phone') }}">
        @error('mobile_phone')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
    <div class="form-group col-md-3 col-sm-12  @error('municipal_inscription') has-error @enderror">
        <label>Inscrição Municipal</label>
        <input class="form-control cnpj" name="municipal_inscription" type="text"
               value="{{ $syndicate->municipal_inscription ?? @old('municipal_inscription') }}">
        @error('municipal_inscription')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
    <div class="form-group col-md-3 col-sm-12  @error('state_inscription') has-error @enderror">
        <label>Inscrição Estadual</label>
        <input class="form-control cnpj" name="state_inscription" type="text"
               value="{{ $syndicate->state_inscription ?? @old('state_inscription') }}">
        @error('state_inscription')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
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
        <input class="form-control" name="address_number" type="text"
               value="{{ $syndicate->address_number ?? @old('address_number') }}">
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
        <input class="form-control" name="address_complement" type="text"
               value="{{ $syndicate->address_complement ?? @old('address_complement') }}">
        @error('address_complement')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>
</div>

<h4>Redes Sociais</h4>
<hr>

    <div class="form-group col-sm-6  @error('site') has-error @enderror">
        <label>Site</label>
        <input class="form-control" name="site" type="text" value="{{ $syndicate->site ?? @old('site') }}">
        @error('site')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>

    <div class="form-group col-sm-6  @error('facebook') has-error @enderror">
        <label>Facebook</label>
        <input class="form-control" name="facebook" type="text" value="{{ $syndicate->facebook ?? @old('facebook') }}">
        @error('facebook')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>

    <div class="form-group col-sm-6  @error('instagram') has-error @enderror">
        <label>Instagram</label>
        <input class="form-control" name="instagram" type="instagram"
               value="{{ $syndicate->instagram ?? @old('instagram') }}">
        @error('instagram')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>

    <div class="form-group col-sm-6  @error('youtube') has-error @enderror">
        <label>Youtube</label>
        <input class="form-control" name="youtube" type="text" value="{{ $syndicate->youtube ?? @old('youtube') }}">
        @error('youtube')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
    </div>




<a href="{{route('syndicates.index')}}" type="reset" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>