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
                    <h1 class="page-header">Promoções</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Promoções <a href="{{route('admin_pro_view', ['id'=> '0'])}}" class="btn btn-primary">Criar</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Parceiro</th>
                                        <th>Nome</th>
                                        <th>Descricao</th>
                                        <th>Foto</th>
                                        <th>Categoria</th>
                                        <th>Porcentagem</th>
                                        <th>Validade</th>
                                        <th>Criado</th>
                                        <th>Atualizado</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($promocoes as $promocao)
                                    <tr>
                                    <td><a href="{{route('admin_par_view',['id' => $promocao->getParceiro()->PAR_ID])}}">{{$promocao->getParceiro()->PAR_FANTASIA}}</a></td>
                                        <td>{{$promocao->PRO_NOME}}</td>
                                        <td>{{$promocao->PRO_DESCRICAO}}</td>
                                        <td><img style="max-width: 100px; max-height: 100px;" src="{{ asset($promocao->PRO_FOTO) }}"></td>
                                        <td>{{$promocao->getCategoria()->PCA_NOME}}</td>
                                        <td>{{$promocao->PRO_PORCENTAGEM}}</td>
                                        <td>{{$promocao->PRO_VALIDADE}}</td>
                                        <td>{{$promocao->PRO_CRIADO}}</td>
                                        <td>{{$promocao->PRO_ATUALIZADO}}</td>
                                        <td>
                                        <a href="{{route('admin_pro_view', ['id'=> $promocao->PRO_ID])}}" class="btn btn-primary">Alterar</a>
                                            
                                        
                                        <a href="{{route('admin_pro_active', ['id'=> $promocao->PRO_ID])}}" class="btn btn-warning">
                                                @if($promocao->PRO_ATIVADO == 'S')Desativar
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
