@extends('site.layouts.template')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card-body">
                @include('admin.layouts.partials._messages')
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                        <div class="col-md-8">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>

                        <div class="col-md-8">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-8 offset-4">
                            <button type="submit" class="btn btn-lg btn-block full_colored ">Entrar</button>
                            <!-- </div> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6 justify-content-center d-flex align-items-center flex-column">
            <h4 class="text-center">Não tem uma conta?
            </h4>
            <a href="{{ route('affiliates.register') }}" class="btn btn-outline-dark">Cadastre-se aqui</a>
        </div>
    </div>
</div>
@endsection