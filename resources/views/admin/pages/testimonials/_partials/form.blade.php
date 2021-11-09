<div class="form-group col-lg-12 col-sm-12  @error('name') has-error @enderror">
    <label>Parceiro</label>
    {!! Form::select('partner_id',$partners,null,['class'=>'form-control','placeholder'=>'Selecione...']) !!}
        @error('partners')
        <span class="text-danger">{{ $message ?? '' }}</span>
        @enderror
</div>

<div class="form-group col-lg-12 col-sm-12  @error('email') has-error @enderror">
    <label>Nome</label>
    <input class="form-control" name="name" type="text" value="{{ $testimonial->name ?? @old('name') }}">
    @error('description')
    <span class="text-danger">{{ $message ?? '' }}</span>
    @enderror
</div>

<div class="form-group col-lg-12 col-sm-12  @error('email') has-error @enderror">
    <label>Depoimento</label>
    <input class="form-control" name="description" type="text" value="{{ $testimonial->description ?? @old('description') }}">
    @error('description')
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

<a href="{{route('testimonials.index')}}" type="reset" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>