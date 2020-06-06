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
                    <h1 class="page-header">Administradores</h1>
                </div>

                
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Administradores <a href="{{route('admin_adm_view', ['id'=> '0'])}}" class="btn btn-primary">Criar</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Email</th>
                                        <th>Atualizado em</th>
                                        <th>Criado em</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($admins as $admin)
                                    <tr>
                                        <td>{{$admin->ADM_ID}}</td>
                                        <td>{{$admin->ADM_EMAIL}}</td>
                                        <td>{{$admin->ADM_ATUALIZADO}}</td>
                                        <td>{{$admin->ADM_CRIADO}}</td>
                                        <td>
                                        <a href="{{route('admin_adm_view', ['id'=> $admin->ADM_ID])}}" class="btn btn-primary">Alterar</a>
                                            <a href="{{route('admin_adm_active', ['id'=> $admin->ADM_ID])}}" class="btn btn-warning">
                                                @if($admin->ADM_ATIVADO == 'S')Desativar
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
