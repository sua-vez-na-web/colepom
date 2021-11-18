<div class="form-group col-lg-12 col-sm-12  @error('name') has-error @enderror">
    <input class="form-control" name="syndicate_id" type="hidden" value="{{Request::get('syndicates') ?? @old('syndicates_id')}}"> 
        @error('syndicates')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
</div>

<div class="form-group col-lg-12 col-sm-12  @error('title') has-error @enderror">
    <label>Título:</label>
    <input class="form-control" name="title" type="text" value="{{ $post->title ?? @old('title') }}">
    @error('title')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group col-lg-12 col-sm-12  @error('body') has-error @enderror">
    <label>Texto da Notícia:</label>
    <textarea class="form-control" name="body"  type="text" >{{ $post->body ?? @old('body') }}</textarea>
    @error('body')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group col-lg-12 col-sm-12  @error('link') has-error @enderror">
    <label>Link:</label>
    <input class="form-control" name="link" type="text" value="{{ $post->link ?? @old('link') }}">
    @error('title')
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

<a href="{{route('posts.index')}}" type="reset" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>