@extends('adm.inside')


@section('inside')

    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        @if(isset($admin->ADM_ID)) 
                            Administrador #{{ $admin->ADM_ID }}
                        @else
                            Criar Administrador
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
                            @if(isset($admin->ADM_ID)) 
                                Atualizar Administrador
                            @else
                                Criar Administrador
                            @endif
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">

                                {!! Form::open(['route'=>'admin_adm_submit', 'method'=>'post']) !!}

                                        <input type="hidden" name="id" value="{{$admin->ADM_ID}}"/>

                                        <div class="form-group">
                                            <label>Email</label>
                                        <input class="form-control" name="email" type="email" value="{{ $admin->ADM_EMAIL }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nova Senha</label>
                                            <input class="form-control" type="password" name="password" required>
                                        </div>

                                        
                                        <button type="submit" class="btn btn-success">
                                            @if(isset($admin->ADM_ID))
                                                Atualizar
                                            @else
                                                Criar
                                            @endif
                                        </button>
                                        <a href="{{route('admin_adm_list')}}" type="reset" class="btn btn-danger">Voltar</a>
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
