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
                    <h1 class="page-header">Parceiros</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Parceiros <a href="{{route('admin_par_view', ['id'=> '0'])}}" class="btn btn-primary">Criar</a>
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
                                            @foreach($parceiros as $parceiro)
                                            <tr>
                                                <td>{{$parceiro->PAR_ID}}</td>
                                                <td>{{$parceiro->PAR_FANTASIA}}</td>
                                                <td>{{$parceiro->PAR_RAZAO_SOCIAL}}</td>
                                                <td>{{$parceiro->PAR_CNPJ}}</td>
                                                <td>{{$parceiro->PAR_ATIVIDADE}}</td>
                                                <td>{{$parceiro->getCategoria()->PAC_NOME}}</td>
                                                <td>{{$parceiro->PAR_EMAIL}}</td>
                                                <td><img style="max-width: 100px; max-height: 100px;" src="{{ asset($parceiro->PAR_LOGO) }}"></td>
                                                <td>{{$parceiro->PAR_RESPONSAVEL_NOME}}</td>
                                                <td>{{$parceiro->PAR_RESPONSAVEL_CPF}}</td>
                                                <td>{{$parceiro->PAR_RESPONSAVEL_EMAIL}}</td>
                                                <td>{{$parceiro->PAR_SITE}}</td>
                                                <td>{{$parceiro->PAR_FACEBOOK}}</td>
                                                <td>{{$parceiro->PAR_INSTAGRAM}}</td>
                                                <td>{{$parceiro->PAR_YOUTUBE}}</td>
                                                <td>{{$parceiro->PAR_COBRANCA_ID}}</td>
                                                <td>{{$parceiro->PAR_ATUALIZADO}}</td>
                                                <td>{{$parceiro->PAR_CRIADO}}</td>
                                                <td>
                                                <a href="{{route('admin_par_view', ['id'=> $parceiro->PAR_ID])}}" class="btn btn-primary">Alterar</a>
                                                    
                                                
                                                <a href="{{route('admin_par_active', ['id'=> $parceiro->PAR_ID])}}" class="btn btn-warning">
                                                        @if($parceiro->PAR_ATIVADO == 'S')Desativar
                                                        @else
                                                        Ativar
                                                        @endif
                                                </a>
                                                
                                                <a href="{{route('admin_par_aprove', ['id'=> $parceiro->PAR_ID])}}" class="btn btn-warning">
                                                            @if($parceiro->PAR_APROVADO == 'S')Desaprovar
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
