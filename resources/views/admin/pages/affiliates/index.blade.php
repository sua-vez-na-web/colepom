@extends('admin.layouts.admin')


@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Associados</h1>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{route('affiliates.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Novo Associado </a>
                </div>

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
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($affiliates as $affiliate)
                            <tr>
                                <td></td>
                                <td>{{$affiliate->first_name}}</td>
                                <td>{{$affiliate->email}}</td>
                                <td>{{$affiliate->syndicate->name}}</td>
                                <td>{{$affiliate->company}}</td>
                                <td>{{$affiliate->job_post}}</td>
                                <td>{{$affiliate->city}}</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-xs">
                                        <i class="fa fa-pencil"></i> Dependentes
                                    </a>
                                    <a href="{{ route('affiliates.show',$affiliate->id) }}" class="btn btn-primary btn-xs">
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