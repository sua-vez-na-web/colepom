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
                    <h1 class="page-header">Associados</h1>
                </div>                                
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">                          
                            <a href="{{route('affiliates.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Novo Associado </a>                           
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Sindicato</th>
                                        <th>Empresa</th>                                        
                                        <th>Cargo</th>                                       
                                        <th>Cidade</th>                                       
                                        <th>Bairro</th>                                       
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>                                    
                                    @foreach($affiliates as $affiliate)
                                    <tr>
                                        <th>{{$affiliate->id}}</th>
                                        <th>{{$affiliate->first_name}}</th>
                                        <th>{{$affiliate->email}}</th>
                                        <th>{{$affiliate->syndicate->fantasy_name}}</th>
                                        <th>{{$affiliate->company}}</th>
                                        <th>{{$affiliate->job_post}}</th>
                                        <th>{{$affiliate->city}}</th>
                                        <th>{{$affiliate->neigborhood}}</th>
                                        <th>                                          
                                            <a href="#" class="btn btn-primary btn-xs">
                                                <i class="fa fa-pencil"></i> Dependentes
                                            </a>
                                            <a href="{{ route('affiliates.show',$affiliate->id) }}" class="btn btn-primary btn-xs">
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


