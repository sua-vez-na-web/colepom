@extends('admin.layouts.admin')




@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cupons Resgatados</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>CODIGO</th>
                                        <th>Data Restage</th>
                                        <th>Data Expiração</th>
                                        <th>Data do Uso</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($affiliatesCoupons as $coupons)
                                    <tr>
                                        <th></th>
                                        <td>{{$coupons->coupon->code}}</td>
                                        <td>{{$coupons->redeem_at->format('d/m/Y H:m')}}</td>
                                        <td>{{$coupons->promotion->redeem_expiration_date->format('d/m/Y H:m')}}</td>
                                        <td>{{$coupons->used_at->format('d/m/Y H:m') ?? '---'}}</td>
                                        <td>
                                            <a href="{{ route('affiliates-coupons.show',$coupons->id) }}" class="btn btn-primary btn-xs">Ver</a>
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