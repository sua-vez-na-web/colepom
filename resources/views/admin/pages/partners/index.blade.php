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
                    <h1 class="page-header">Parceiros</h1>
                </div>                                
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{route('partners.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Novo Parceiro </a>
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
                                        <th>Email</th>                                       
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>                                    
                                    @foreach($partners as $partner)
                                    <tr>
                                        <th>{{$partner->id}}</th>
                                        <th>{{$partner->fantasy_name}}</th>
                                        <th>{{$partner->social_reason}}</th>
                                        <th>{{$partner->document}}</th>
                                        <th>{{$partner->email}}</th>
                                        <th>
                                            <a href="{{ route('partners.edit',$partner->id) }}" class="btn btn-primary btn-xs">
                                                <i class="fa fa-pencil"></i> Editar
                                            </a>
                                            <a href="{{ route('partners.show',$partner->id) }}" class="btn btn-primary btn-xs">
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


