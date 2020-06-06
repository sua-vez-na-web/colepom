@extends('template') 
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="nav-title">
            <div class="black-canvas">
                <img class="d-block w-100" alt="Carousel Bootstrap First" src="https://images.unsplash.com/photo-1510130315046-1e47cc196aa0?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=42549827c6ab513e2e0d86208749e05e&auto=format&fit=crop&w=1050&q=80">
                <div class="carousel-shadow"></div>
            </div>

            <div class="container nav-container">
                <div class="header-perfil">
                    <div class="row justify-content-center">
                        <div class="col-md-3 col-sm-4">
                            <div class="black-canvas">
                                <img class="cupom-img-top" alt="Parceiro" src="/img/colepom_bg_white.png" width="450" height="600">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="page-title">
            <h1>Registre-se como Associado</h1>
        </div>
        <div class="col-md-8 offset-md-2">

            <div class="page-text">
                <div class="col-lg-8">
                    {!! Form::open(['route'=>'ass_registrar_action', 'method'=>'post', 'files'=>true]) !!}

                    <div class="form-group">
                        <label>Sindicato</label>
                        <select class="form-control" name="sindicato" required>
                            <option value="">Selecione o Sindicato</option>
                            @foreach($sindicatos as $sindicato)
                            <option value="{{$sindicato->SIN_ID}}">
                                {{$sindicato->SIN_FANTASIA}}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nome</label>
                        <input class="form-control" name="nome" type="text" value="" required>
                    </div>

                    <div class="form-group">
                        <label>Sobrenome</label>
                        <input class="form-control" name="sobrenome" type="text" value="" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" type="email" value="" required>
                    </div>

                    <div class="form-group">
                        <label>Senha</label>
                        <input class="form-control" name="senha" type="password" value="" required>
                    </div>

                    <div class="form-group">
                        <label>Nascimento</label>
                        <input class="form-control" name="nascimento" type="date" value="" required>
                    </div>

                    <div class="form-group">
                        <label>Genero</label>

                        <label class="radio-inline">
                            <input name="genero" type="radio" value="M" required checked> Masculino
                        </label>

                        <label class="radio-inline">
                            <input name="genero" type="radio" value="F" required> Feminino
                        </label>
                    </div>

                    <div class="form-group">
                        <label>Empresa</label>
                        <input class="form-control" name="empresa" type="text" value="" required>
                    </div>

                    <div class="form-group">
                        <label>Função</label>
                        <input class="form-control" name="funcao" type="text" value="" required>
                    </div>

                    <div class="form-group">
                        <label>CPF</label>
                        <input class="form-control" name="CPF" type="text" value="" required>
                    </div>

                    <div class="form-group">
                        <label>CEP</label>
                        <input class="form-control" name="CEP" type="text" value="">
                    </div>

                    <div class="form-group">
                        <label>UF</label>
                        <select id="seleciona-estados" class="form-control" name="UF">
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                         </select>
                    </div>


                    <div class="form-group">
                        <label>Cidade</label>
                        <input class="form-control" name="cidade" type="text" value="">
                    </div>

                    <div class="form-group">
                        <label>Bairro</label>
                        <input class="form-control" name="bairro" type="text" value="">
                    </div>

                    <div class="form-group">
                        <label>Rua</label>
                        <input class="form-control" name="rua" type="text" value="">
                    </div>

                    <div class="form-group">
                        <label>Numero</label>
                        <input class="form-control" name="numero" type="number" value="">
                    </div>

                    <div class="form-group">
                        <label>Complemento</label>
                        <input class="form-control" name="complemento" type="text" value="">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn full_colored">
						    Registrar
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection