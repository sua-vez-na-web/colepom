<div class="form-group  @error('fantasy_name') has-error @enderror">
    <label>Nome Fantasia</label>
    <input class="form-control" name="fantasy_name" type="text" value="{{ $syndicate->fantasy_name ?? @old('fantasy_name') }}">
    @error('fantasy_name')
        <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group  @error('social_reason') has-error @enderror">
    <label>Razão Social</label>
    <input class="form-control" name="social_reason" type="text" value="{{ $syndicate->social_reason ?? @old('social_reason') }}">
    @error('social_reason')
        <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group  @error('document') has-error @enderror">
    <label>CNPJ</label>
    <input class="form-control" name="document" type="text" value="{{ $syndicate->document ?? @old('document') }}">
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

               