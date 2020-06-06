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
                    <h1 class="page-header">Cupons</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Cupons
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Associado</th>
                                        <th>Promoção</th>
                                        <th>Parceiro</th>
                                        <th>Usado</th>
                                        <th>Criado</th>
                                        <th>Atualizado</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cupons as $cupom)
                                    <tr>
                                        <td>{{$cupom->CUP_ID}}</td>

                                        <td><a href="{{route('admin_ass_view',['id' => $cupom->getAssociado()->ASS_ID])}}">{{$cupom->getAssociado()->ASS_NOME}}</a></td>

                                        <td><a href="{{route('admin_pro_view',['id' => $cupom->getPromocao()->PRO_ID])}}">{{$cupom->getPromocao()->PRO_NOME}}</a></td>

                                        <td><a href="{{route('admin_par_view',['id' => $cupom->getParceiro()->PAR_ID])}}">{{$cupom->getParceiro()->PAR_FANTASIA}}</a></td>
                                        <td>{{$cupom->CUP_USADO}}</td>
                                        <td>{{$cupom->CUP_CRIADO}}</td>
                                        <td>{{$cupom->CUP_ATUALIZADO}}</td>
                                        <td>
                                            <a href="{{route('admin_cup_active', ['id'=> $cupom->CUP_ID])}}" class="btn btn-warning">
                                                    @if($cupom->CUP_ATIVADO == 'S')Desativar
                                                    @else
                                                    Ativar
                                                    @endif
                                            </a>

                                            <a href="{{route('admin_cup_use', ['id'=> $cupom->CUP_ID])}}" class="btn btn-primary">
                                                    @if($cupom->CUP_USADO === null)Usar
                                                    @else
                                                    Remover Uso
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
