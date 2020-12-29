@extends('admin.layouts.admin')




@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Assinaturas</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{route('subscriptions.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Nova Assinatura </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Cliente</th>
                                        <th>Detalhes</th>
                                        <th>Plano</th>
                                        <th>Ciclo</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subscriptions as $subscription)
                                    <tr>
                                        <th></th>
                                        <td>{{$subscription->customer->name}}</td>
                                        <td>{{$subscription->description}}</td>
                                        <td>{{ $subscription->plan->name }}</td>
                                        <td>{{ App\Models\Plan::CYCLE[$subscription->plan->cycle] }}</td>
                                        <td>
                                            {{--<a href="{{ route('subscriptions.edit',$subscription->id) }}" class="btn btn-primary btn-xs">
                                            <i class="fa fa-pencil"></i> Editar
                                            </a>--}}
                                            <a href="{{ route('subscriptions.show',$subscription->id) }}" class="btn btn-primary btn-xs">
                                                <i class="fa fa-eye"></i> Ver
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