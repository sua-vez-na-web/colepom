<div class="form-group  @error('category_id') has-error @enderror">
    <label>Categoria</label>
    {!! Form::select('category_id',$categories,null,['class'=>'form-control','placeholder'=>'Selecione...']) !!}
    @error('category_id')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

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
    <input class="form-control cnpj" name="document" type="text" value="{{ $syndicate->document ?? @old('document') }}">
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

<div class="form-group  @error('site') has-error @enderror">
    <label>Site</label>
    <input class="form-control" name="site" type="text" value="{{ $syndicate->site ?? @old('site') }}">
    @error('site')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group  @error('facebook') has-error @enderror">
    <label>Facebook</label>
    <input class="form-control" name="facebook" type="text" value="{{ $syndicate->facebook ?? @old('facebook') }}">
    @error('facebook')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group  @error('instagram') has-error @enderror">
    <label>Instagram</label>
    <input class="form-control" name="instagram" type="instagram" value="{{ $syndicate->instagram ?? @old('instagram') }}">
    @error('instagram')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group  @error('youtube') has-error @enderror">
    <label>Youtube</label>
    <input class="form-control" name="youtube" type="text" value="{{ $syndicate->youtube ?? @old('youtube') }}">
    @error('youtube')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<a href="{{route('syndicates.index')}}" type="reset" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>