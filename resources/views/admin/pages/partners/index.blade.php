@extends('admin.layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <div class="col-lg-12">
                <h1 class="page-header">Parceiros</h1>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{route('partners.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Novo Parceiro </a>
                </div>

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome Fantasia</th>
                                <th>Razão Social</th>
                                <th>CNPJ</th>
                                <th>Categoria</th>
                                <th>Email</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($partners as $partner)
                            <tr>
                                <td></td>
                                <td>{{$partner->name}}</td>
                                <td>{{$partner->social_reason}}</td>
                                <td>{{$partner->cpf_cnpj}}</td>
                                <td>{{ $partner->category->name ?? '' }}</td>
                                <td>{{$partner->email}}</td>
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
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

@endsection


@section('scripts')
Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
@endsection