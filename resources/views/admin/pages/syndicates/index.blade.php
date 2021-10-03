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
                                        <th>CNPJ</th>
                                        <th>Email</th>
                                        <th>Telefone</th>
                                        <th>Cidade</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
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
    let dtOverrideGlobals = {
        // buttons: dtButtons,
        processing: true,
        serverSide: true,
        retrieve: true,
        aaSorting: [],
        ajax: "{{ route('syndicates.index') }}",
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'cpf_cnpj',
                name: 'cpf_cnpj'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'mobile_phone',
                name: 'mobile_phone'
            },
            {
                data: 'city',
                name: 'city'
            },
            {
                data: 'actions',
                name: 'actions'
            }
        ],
        orderCellsTop: true,
        order: [
            [1, 'desc']
        ],
        pageLength: 20,
    };
    let table = $('#dataTables-example').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
</script>
@endsection