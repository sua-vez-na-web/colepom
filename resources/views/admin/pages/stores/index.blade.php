@extends('admin.layouts.admin')

@section('css')
    <!-- DataTables CSS -->
    <link href="{{asset('/admin/vendor/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{asset('/admin/vendor/datatables-responsive/dataTables.responsive.css')}}" rel="stylesheet">
@endsection


@section('content')    
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Estabelecimentos</h1>
                </div>                                
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">                            
                             <a href="{{route('stores.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Novo Estabelecimento </a>                           
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Sindicato</th>
                                        <th>Parceiro</th>                                        
                                        <th>Telefone</th>                                       
                                        <th>Cidade</th>                                       
                                        <th>Bairro</th>                                       
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>                                    
                                    @foreach($stores as $store)
                                    <tr>
                                        <th>{{$store->id}}</th>
                                        <th>{{$store->name}}</th>
                                        <th>{{$store->syndicate->fantasy_name}}</th>
                                        <th>{{$store->partner->fantasy_name}}</th>
                                        <th>{{$store->phone}}</th>
                                        <th>{{$store->city}}</th>
                                        <th>{{$store->neighborhood}}</th>
                                        <th>
                                            <a href="{{ route('stores.edit',$store->id) }}" class="btn btn-primary btn-xs">
                                                <i class="fa fa-pencil"></i> Editar
                                            </a>
                                            <a href="{{ route('stores.show',$store->id) }}" class="btn btn-primary btn-xs">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </th>   
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


