@extends('admin.layouts.admin')




@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sindicatos/Associações</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{route('syndicates.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Novo Sindicato </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nome</th>
                                        <th>Presidente</th>
                                        <th>CNPJ</th>
                                        <th>Email</th>
                                        <th>Aprovado</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($syndicates as $syndicate)
                                    <tr>
                                        <td></td>
                                        <td>{{$syndicate->name}}</td>
                                        <td>{{$syndicate->president_name}}</td>
                                        <td>{{$syndicate->cpf_cnpj}}</td>
                                        <td>{{$syndicate->email}}</td>
                                        <td>{{$syndicate->is_aprooved ?'SIM':'NÃO'}}</td>
                                        <td>
                                            <a href="{{ route('syndicates.edit',$syndicate->id) }}" class="btn btn-primary btn-xs">
                                                <i class="fa fa-pencil"></i> Editar
                                            </a>
                                            <a href="{{ route('syndicates.show',$syndicate->id) }}" class="btn btn-primary btn-xs">
                                                <i class="fa fa-eye"></i>
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
    </div>
</div>
</div>

@endsection


@section('scripts')

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({

        });
    });
</script>
@endsection