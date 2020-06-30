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
                    <h1 class="page-header">Associados</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Associados <a href="{{route('admin_ass_view', ['id'=> '0'])}}" class="btn btn-primary">Criar</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover table-sm" style="font-size: 11px">
                                <thead>
                                    <tr>
                                        <th>Sindicato</th>
                                        <th>Nome</th>
                                        <th>Empresa</th>
                                        <th>CPF</th>
                                        <th>CEP</th>
                                        <th>UF</th>
                                        <th>Cidade</th>
                                        <th>Bairro</th>
                                        <th>Criado</th>
                                        <th>Atualizado</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($associados as $associado)
                                    <tr>
                                        <td>{{$associado->getSindicato()->SIN_FANTASIA}}</td>
                                        <td>{{$associado->ASS_NOME}}</td>
                                        <td>{{$associado->ASS_EMPRESA}}</td>
                                        <td>{{$associado->ASS_CPF}}</td>
                                        <td>{{$associado->ASS_CEP}}</td>
                                        <td>{{$associado->ASS_UF}}</td>
                                        <td>{{$associado->ASS_CIDADE}}</td>
                                        <td>{{$associado->ASS_BAIRRO}}</td>
                                        <td>{{ date('d/m/Y H:i', strtotime($associado->ASS_CRIADO))}}</td>
                                        <td>{{$associado->ASS_ATUALIZADO}}</td>
                                        <td>
                                        <a href="{{route('admin_ass_view', ['id'=> $associado->ASS_ID])}}" class="btn btn-primary btn-sm">Alterar</a>
                                            
                                        
                                        <a href="{{route('admin_ass_active', ['id'=> $associado->ASS_ID])}}" class="btn btn-warning  btn-sm">
                                                @if($associado->ASS_ATIVADO == 'S')Desativar
                                                @else
                                                Ativar
                                                @endif
                                        </a>
                                        
                                        <a href="{{route('admin_ass_aprove', ['id'=> $associado->ASS_ID])}}" class="btn btn-warning btn-sm">
                                                    @if($associado->ASS_APROVADO == 'S')Desaprovar
                                                    @else
                                                    Aprovar
                                                    @endif
                                        </a>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $associados->links() }}
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
