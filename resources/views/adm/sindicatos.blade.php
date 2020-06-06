@extends('adm.inside')

@section('css')
    <!-- DataTables CSS -->
    <link href="{{asset('/admin/vendor/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{asset('/admin/vendor/datatables-responsive/dataTables.responsive.css')}}" rel="stylesheet">
@endsection


@section('inside')
    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sindicatos/Associações</h1>
                </div>

                
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Administradores <a href="{{route('admin_sin_view', ['id'=> '0'])}}" class="btn btn-primary">Criar</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nome Fantasia</th>
                                        <th>Razão Social</th>
                                        <th>CNPJ</th>
                                        <th>Atividade</th>
                                        <th>Categoria</th>
                                        <th>Email</th>
                                        <th>Logo</th>
                                        <th>Responsável</th>
                                        <th>Resp. CPF</th>
                                        <th>Resp. Email</th>
                                        <th>Site</th>
                                        <th>Facebook</th>
                                        <th>Instagram</th>
                                        <th>Youtube</th>
                                        <th>Cobrança ID</th>
                                        <th>Criado</th>
                                        <th>Atualizado</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sindicatos as $sindicato)
                                    <tr>
                                        <td>{{$sindicato->SIN_ID}}</td>
                                        <td>{{$sindicato->SIN_FANTASIA}}</td>
                                        <td>{{$sindicato->SIN_RAZAO_SOCIAL}}</td>
                                        <td>{{$sindicato->SIN_CNPJ}}</td>
                                        <td>{{$sindicato->SIN_ATIVIDADE}}</td>
                                        <td>{{$sindicato->getCategoria()->SCA_NOME}}</td>
                                        <td>{{$sindicato->SIN_EMAIL}}</td>
                                        <td><img style="max-width: 100px; max-height: 100px;" src="{{ asset($sindicato->SIN_LOGO) }}"></td>
                                        <td>{{$sindicato->SIN_RESPONSAVEL_NOME}}</td>
                                        <td>{{$sindicato->SIN_RESPONSAVEL_CPF}}</td>
                                        <td>{{$sindicato->SIN_RESPONSAVEL_EMAIL}}</td>
                                        <td>{{$sindicato->SIN_SITE}}</td>
                                        <td>{{$sindicato->SIN_FACEBOOK}}</td>
                                        <td>{{$sindicato->SIN_INSTAGRAM}}</td>
                                        <td>{{$sindicato->SIN_YOUTUBE}}</td>
                                        <td>{{$sindicato->SIN_COBRANCA_ID}}</td>
                                        <td>{{$sindicato->SIN_ATUALIZADO}}</td>
                                        <td>{{$sindicato->SIN_CRIADO}}</td>
                                        <td>
                                        <a href="{{route('admin_sin_view', ['id'=> $sindicato->SIN_ID])}}" class="btn btn-primary">Alterar</a>
                                            
                                        
                                        <a href="{{route('admin_sin_active', ['id'=> $sindicato->SIN_ID])}}" class="btn btn-warning">
                                                @if($sindicato->SIN_ATIVADO == 'S')Desativar
                                                @else
                                                Ativar
                                                @endif
                                        </a>
                                        
                                        <a href="{{route('admin_sin_aprove', ['id'=> $sindicato->SIN_ID])}}" class="btn btn-warning">
                                                    @if($sindicato->SIN_APROVADO == 'S')Desaprovar
                                                    @else
                                                    Aprovar
                                                    @endif
                                        </a>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>

@endsection


@section('js')


    <!-- DataTables JavaScript -->
    <script src="{{asset('/admin/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/admin/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('/admin/vendor/datatables-responsive/dataTables.responsive.js')}}"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
@endsection

</body>

</html>
