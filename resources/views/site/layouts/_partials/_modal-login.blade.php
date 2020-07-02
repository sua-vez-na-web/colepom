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
                            <a href="#">Esqueci minha senha de Associado</a>
                        </div>

                        <div class="checkbox">
                            <label>
                                <input name="remember" type="checkbox" value="Remember Me"> Lembrar-me
                            </label>
                        </div>
                        <!-- Change this to a button or input when using this as a form -->
                        <button type="submit" class="btn btn-lg btn-block full_colored ">Entrar como Associado</button>
                    </form>
                    <!-- <div class="modal-account-options">
                         <a class="registrar-associado" href="#">Registrar como Associado</a>
                        <br>
                        <a class="login-parceiro" href="#">Entrar como Parceiro</a>
                        <br>
                        <a class="login-sindicato" href="#">Entrar como Sindicato/Associação</a>
                    </div> -->
                </fieldset>				
		  	</div>
		</div>
	</div>