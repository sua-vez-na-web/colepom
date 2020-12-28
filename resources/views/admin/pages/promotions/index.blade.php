@extends('admin.layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Promoções</h1>

            <div class="panel panel-default">
                <div class="panel-heading">
                    @can('partner')
                    <a href="{{route('promotions.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Nova Promocao </a>
                    @endcan
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Foto</th>
                                <th>Titulo</th>
                                <th>Estabelecimento</th>
                                <th>Categoria</th>
                                <th>Disponivel até</th>
                                <th>Valor Original</th>
                                <th>Desconto</th>
                                <th>Quantidades</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($promotions as $promotion)
                            <tr>
                                <td></td>
                                <td><img src="{{ Storage::url($promotion->image) }}" alt="" widtd="50" height="50"></td>
                                <td>{{$promotion->title}}</td>
                                <td>{{$promotion->store->name}}</td>
                                <td>{{$promotion->category->name}}</td>
                                <td>{{ date('d/m/Y h:m:s',strToTime($promotion->expiration_date))}}</td>
                                <td>R$ {{$promotion->original_value}}</td>
                                <td><span class="badge">{{$promotion->discount}}%</span></td>
                                <td>{{ $promotion->quantity ?? ''}}</td>
                                <td>
                                    <a href="{{ route('promotions.edit',$promotion->id) }}" class="btn btn-primary btn-xs">
                                        <i class="fa fa-pencil"></i> Editar
                                    </a>
                                    <a href="{{ route('promotions.show',$promotion->id) }}" class="btn btn-primary btn-xs">
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