@extends('admin.layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <div class="col-lg-12">
                <h1 class="page-header">Estabelecimentos</h1>
            </div>

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
                                <th>Parceiro</th>
                                <th>Telefone</th>
                                <th>Cidade</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stores as $store)
                            <tr>
                                <td></td>
                                <td>{{$store->name}}</td>
                                <td>{{$store->partner->name ?? '----'}}</td>
                                <td>{{$store->phone}}</td>
                                <td>{{$store->city}}</td>
                                <td>
                                    <a href="{{ route('stores.edit',$store->id) }}" class="btn btn-primary btn-xs">
                                        <i class="fa fa-pencil"></i> Editar
                                    </a>
                                    <a href="{{ route('stores.show',$store->id) }}" class="btn btn-primary btn-xs">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
            responsive: true
        });
    });
</script>
@endsection