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
                    <h1 class="page-header">Estabelecimentos</h1>
                </div>

                
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Estabelecimentos <a href="{{route('admin_par_est_view', ['id'=> '0'])}}" class="btn btn-primary">Criar</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Vínculo</th>
                                                            <th>Nome</th>
                                                            <th>UF</th>
                                                            <th>Cidade</th>
                                                            <th>Bairro</th>
                                                            <th>Telefone</th>                                        
                                                            <th>Ações</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($estabelecimentos as $estabelecimento)
                                                        <tr>
                                                            <td>{{$estabelecimento->EST_ID}}</td>
                                                            <td> @if($estabelecimento->SIN_ID === null)
                                                                        Parceiro
                                                                    @else
                                                                        Sindicato
                                                                    @endif
                                                            </td>
                                                            <td>{{$estabelecimento->EST_NOME}}</td>
                                                            <td>{{$estabelecimento->EST_UF}}</td>
                                                            <td>{{$estabelecimento->EST_CIDADE}}</td>
                                                            <td>{{$estabelecimento->EST_BAIRRO}}</td>
                                                            <td>{{$estabelecimento->EST_TELEFONE}}</td>
                                                            <td>
                                                            <a href="{{route('admin_par_est_view', ['id'=> $estabelecimento->EST_ID, 
                                                                                                'vinculo' => 'n' ])}}" class="btn btn-primary">Alterar</a>
                                                                
                                                            
                                                            <a href="{{route('admin_par_est_active', ['id'=> $estabelecimento->EST_ID])}}" class="btn btn-warning">
                                                        @if($estabelecimento->EST_ATIVADO == 'S')Desativar
                                                        @else
                                                        Ativar
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
