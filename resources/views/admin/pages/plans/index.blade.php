@extends('admin.layouts.admin')




@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Planos</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{route('plans.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Nova Plano </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nome</th>
                                        <th>Descricao</th>
                                        <th>Valor do Plano</th>
                                        <th>Ciclo</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($plans as $plan)
                                    <tr>
                                        <th></th>
                                        <td>{{$plan->name}}</td>
                                        <td>{{$plan->description}}</td>
                                        <td>{{ $plan->amount }}</td>
                                        <td>{{ App\Models\Plan::CYCLE[$plan->cycle] }}</td>
                                        <td>
                                            {{--<a href="{{ route('plans.edit',$plan->id) }}" class="btn btn-primary btn-xs">
                                            <i class="fa fa-pencil"></i> Editar
                                            </a>--}}
                                            <a href="{{ route('plans.show',$plan->id) }}" class="btn btn-primary btn-xs">
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