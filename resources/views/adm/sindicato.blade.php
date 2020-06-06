@extends('adm.inside')


@section('inside')

    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        @if(isset($sindicato->SIN_ID)) 
                            Sindicato #{{ $sindicato->SIN_ID }}
                        @else
                            Criar Sindicato
                        @endif
                        
                        </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            @if(isset($sindicato->SIN_ID)) 
                                Atualizar Sindicato
                            @else
                                Criar Sindicato
                            @endif
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">

                                {!! Form::open(['route'=>'admin_sin_submit', 'method'=>'post', 'files'=>true]) !!}

                                        <input type="hidden" name="id" value="{{$sindicato->SIN_ID}}"/>

                                        <div class="form-group">
                                                <label>Nome Fantasia</label>
                                            <input class="form-control" name="fantasia" type="text" value="{{ $sindicato->SIN_FANTASIA }}" required>
                                        </div>

                                        <div class="form-group">
                                                <label>Razão Social</label>
                                            <input class="form-control" name="razao" type="text" value="{{ $sindicato->SIN_RAZAO_SOCIAL }}" required>
                                        </div>

                                        <div class="form-group">
                                                <label>CNPJ</label>
                                            <input class="form-control" name="CNPJ" type="text" value="{{ $sindicato->SIN_CNPJ }}" required>
                                        </div>

                                        <div class="form-group">
                                                <label>Atividade</label>
                                            <input class="form-control" name="atividade" type="text" value="{{ $sindicato->SIN_ATIVIDADE }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                        <input class="form-control" name="email" type="email" value="{{ $sindicato->SIN_EMAIL }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Logo</label>
                                            <input name="logo" type="file" accept="image/*" value="{{ $sindicato->SIN_LOGO }}">

                                            <img style="max-width: 300px; max-height: 300px;" src="{{ asset($sindicato->SIN_LOGO) }}">
                                        </div>

                                        <div class="form-group">
                                                <label>Responsável Nome</label>
                                            <input class="form-control" name="responsavel" type="text" value="{{ $sindicato->SIN_RESPONSAVEL_NOME }}" required>
                                        </div>

                                        <div class="form-group">
                                                <label>Responsável CPF</label>
                                            <input class="form-control" name="responsavel_CPF" type="text" value="{{ $sindicato->SIN_RESPONSAVEL_CPF }}" required>
                                        </div>

                                        <div class="form-group">
                                                <label>Responsável Email</label>
                                            <input class="form-control" name="responsavel_email" type="email" value="{{ $sindicato->SIN_RESPONSAVEL_EMAIL }}" required>
                                        </div>

                                        <div class="form-group">
                                                <label>Site</label>
                                            <input class="form-control" name="site" type="text" value="{{ $sindicato->SIN_SITE }}">
                                        </div>

                                        <div class="form-group">
                                                <label>Facebook</label>
                                            <input class="form-control" name="facebook" type="text" value="{{ $sindicato->SIN_FACEBOOK }}">
                                        </div>

                                        <div class="form-group">
                                                <label>Instagram</label>
                                            <input class="form-control" name="instagram" type="text" value="{{ $sindicato->SIN_INSTAGRAM }}">
                                        </div>

                                        <div class="form-group">
                                                <label>Youtube</label>
                                            <input class="form-control" name="youtube" type="text" value="{{ $sindicato->SIN_YOUTUBE }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Categoria</label>
                                            <select name="categorias" class="form-control" required>                     
                                            <option value="">Escolha</option>
                                            @foreach ($sindicato->getCategorias() as $categoria)
                                                @if($rel AND $rel->SCA_ID == $categoria->SCA_ID)
                                                <option value="{{$categoria->SCA_ID}}" selected>{{$categoria->SCA_NOME}}</option>      
                                                @else                               
                                                <option value="{{$categoria->SCA_ID}}">{{$categoria->SCA_NOME}}</option>      
                                                @endif                               
                                            @endforeach
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-success">
                                            @if(isset($sindicato->SIN_ID)) 
                                                Atualizar
                                            @else
                                                Criar
                                            @endif</button>
                                        <a href="{{route('admin_sin_list')}}" type="reset" class="btn btn-danger">Voltar</a>
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
