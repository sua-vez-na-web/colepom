@extends('admin.layouts.admin')




@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Notícias</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{route('posts.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Nova Notícia </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Sindicato</th>
                                        <th>Título</th>
                                        <th>Ativo</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $post)
                                    <tr>
                                        <td></td>
                                        <td>{{$post->syndicate->name}}</td>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->is_active ? 'SIM' : 'NÃO'}}</td>
                                        <td>
                                            <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-primary btn-xs">
                                                <i class="fa fa-pencil"></i> Editar
                                            </a>
                                            <a href="{{ route('posts.show',$post->id) }}" class="btn btn-primary btn-xs">
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