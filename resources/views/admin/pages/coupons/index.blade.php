@extends('admin.layouts.admin')




@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cupons</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            @can('partner')
                            <a href="{{route('coupons.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Novo cupom </a>
                            @endcan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Codigo</th>
                                        <th>Loja</th>
                                        <th>Promoção</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($coupons as $coupon)
                                    <tr>
                                        <th></th>
                                        <td>{{$coupon->code}}</td>
                                        <td>{{$coupon->promotion->store->name ?? 'Promoção desse cupom foi Excluída' }}</td>
                                        <td>{{$coupon->promotion->title ?? 'Promoção desse cupom foi Excluída'}}</td>
                                        <td>
                                            <a href="{{ route('coupons.edit',$coupon->id) }}">
                                                <button type="button" class="btn btn-pimary btn-sm">
                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
                                                </button>
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