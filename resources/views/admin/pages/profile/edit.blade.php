@extends('admin.layouts.admin')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5 class="panel-header">Editar Conta</h5>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="brand">Logo</label>
                            <input type="file" class="form-control" name="brand">
                        </div>
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" value="{{$profile->name}}" name="name">
                        </div>
                        <div class="form-group">
                            <label for="name">Telefone</label>
                            <input type="text" class="form-control" value="{{$profile->phone}}" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="name">Telefone Cel.</label>
                            <input type="text" class="form-control" value="{{$profile->mobile_phone}}" name="mobile_phone">
                        </div>
                        <div class="form-group">
                            <label for="name">Site</label>
                            <input type="text" class="form-control" value="{{$profile->site}}" name="site">
                        </div>
                        <div class="form-group">
                            <label for="name">Facebook</label>
                            <input type="text" class="form-control" value="{{$profile->facebook}}" name="facebook">
                        </div>
                        <div class="form-group">
                            <label for="name">Instagram</label>
                            <input type="text" class="form-control" value="{{$profile->instagram}}" name="instagram">
                        </div>
                        <div class="form-group">
                            <label for="name">Youtube</label>
                            <input type="text" class="form-control" value="{{$profile->youtube}}" name="youtube">
                        </div>
                        <div class="form-group">
                            <label for="details">Detalhes</label>
                            <textarea name="observations" id="" cols="30" rows="10" class="form-control" name="observations">
                            {{$profile->observations ?? ''}}
                            </textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-flat">Atualizar Dados</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <img src="{{Storage::url($profile->brand) }}" class="img-responsive" alt="">
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5 class="panel-header">Alterar Senha</h5>
                </div>
                <form action="{{ route('profile.update-password') }}" method="post">
                    @csrf
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="">Nova Senha</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Repetir Nova Senha</label>
                            <input type="password_confirmation" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-flat">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection