<div id="associado_login" class="modal fade modal-login" tabindex="-1" role="dialog" aria-labelledby="Logar" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <fieldset>
                <h4 class="text-center">Entrar</h4>
                <form action="{{route('login')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                    </div>
                    <!-- Change this to a button or input when using this as a form -->
                    <button type="submit" class="btn btn-lg btn-block full_colored ">Entrar</button>
                </form>
                <div class="modal-account-options">
                    <a class="btn btn-outline-warning" href="{{ route('affiliates.register') }}">Cadastre-se</a>
                </div>
            </fieldset>
        </div>
    </div>
</div>