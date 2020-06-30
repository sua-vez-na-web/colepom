@extends('adm.inside')


@section('inside')

    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        @if(isset($parceiro->PAR_ID)) 
                            Parceiro #{{ $parceiro->PAR_ID }}
                        @else
                            Criar Parceiro
                        @endif
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            @if(isset($parceiro->PAR_ID)) 
                                Atualizar Parceiro
                            @else
                                Criar Parceiro
                            @endif
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">

                                {!! Form::open(['route'=>'admin_par_submit', 'method'=>'post', 'files'=>true]) !!}

                                        <input type="hidden" name="id" value="{{$parceiro->PAR_ID}}"/>

                                        <div class="form-group">
                                                <label>Nome Fantasia</label>
                                            <input class="form-control" name="fantasia" type="text" value="{{ $parceiro->PAR_FANTASIA }}" required>
                                        </div>

                                        <div class="form-group">
                                                <label>Razão Social</label>
                                            <input class="form-control" name="razao" type="text" value="{{ $parceiro->PAR_RAZAO_SOCIAL }}" required>
                                        </div>

                                        <div class="form-group">
                                                <label>CNPJ</label>
                                            <input class="form-control" name="CNPJ" type="text" value="{{ $parceiro->PAR_CNPJ }}" required>
                                        </div>

                                        <div class="form-group">
                                                <label>Atividade</label>
                                            <input class="form-control" name="atividade" type="text" value="{{ $parceiro->PAR_ATIVIDADE }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                        <input class="form-control" name="email" type="email" value="{{ $parceiro->PAR_EMAIL }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Logo</label>
                                            <input name="logo" type="file" accept="image/*" value="{{ $parceiro->PAR_LOGO }}">

                                            <img style="max-width: 300px; max-height: 300px;" src="{{ asset($parceiro->PAR_LOGO) }}">
                                        </div>

                                        <div class="form-group">
                                                <label>Responsável Nome</label>
                                            <input class="form-control" name="responsavel" type="text" value="{{ $parceiro->PAR_RESPONSAVEL_NOME }}" required>
                                        </div>

                                        <div class="form-group">
                                                <label>Responsável CPF</label>
                                            <input class="form-control" name="responsavel_CPF" type="text" value="{{ $parceiro->PAR_RESPONSAVEL_CPF }}" required>
                                        </div>

                                        <div class="form-group">
                                                <label>Responsável Email</label>
                                            <input class="form-control" name="responsavel_email" type="email" value="{{ $parceiro->PAR_RESPONSAVEL_EMAIL }}" required>
                                        </div>

                                        <div class="form-group">
                                                <label>Site</label>
                                            <input class="form-control" name="site" type="text" value="{{ $parceiro->PAR_SITE }}">
                                        </div>

                                        <div class="form-group">
                                                <label>Facebook</label>
                                            <input class="form-control" name="facebook" type="text" value="{{ $parceiro->PAR_FACEBOOK }}">
                                        </div>

                                        <div class="form-group">
                                                <label>Instagram</label>
                                            <input class="form-control" name="instagram" type="text" value="{{ $parceiro->PAR_INSTAGRAM }}">
                                        </div>

                                        <div class="form-group">
                                                <label>Youtube</label>
                                            <input class="form-control" name="youtube" type="text" value="{{ $parceiro->PAR_YOUTUBE }}">
                                        </div>
                                        @foreach ($parceiro->getCategorias() as $categoria)						
                                            <div class="form-group">
                                                <label for="checkbox" class="control-label">{{$categoria->PAC_NOME}}</label>
                                                
                                                @foreach ($categoria->getSubcategorias() as $subcategoria)
                                                    <div class="checkbox">
                                                        <label>
                                                        @if($parceiro->getSubcategorias()->contains('SPA_ID',$subcategoria->SPA_ID))
                                                            <input type="checkbox" name="subcategorias[]" checked value="{{$subcategoria->SPA_ID}}">
                                                        @else
                                                            <input type="checkbox" name="subcategorias[]" value="{{$subcategoria->SPA_ID}}">
                                                        @endif
                                                        {{$subcategoria->SPA_NOME}}</label>
                                                    </div>
                                                @endforeach	
                                                
                                            </div>
                                        @endforeach

                                        <button type="submit" class="btn btn-success">
                                            @if(isset($parceiro->PAR_ID)) 
                                                Atualizar
                                            @else
                                                Criar
                                            @endif</button>
                                        <a href="{{route('admin_par_list')}}" type="reset" class="btn btn-danger">Voltar</a>
                                {!! Form::close() !!}
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->


    <!-- /#wrapper -->

@endsection
