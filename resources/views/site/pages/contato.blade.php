@extends('site.layouts.template')


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

<div class="container">
    <div class="section">
        <div class="container justify-content-center">
            <div class="form-contact-title">
                <h2>Deixe que nós ligamos para você</h2>
            </div>
            <div class="col-md-6 offset-md-3">
                <form class="form-horizontal" action="{{ route('contact.store') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input name="name" placeholder="Nome" class="form-control @error('name') is-invalid @enderror" required="required" type="text">
                            @error('name')
                            <span class="text-danger">{{ $message ?? '' }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <input name="email" placeholder="Email" class="form-control" required="required" type="email">
                            @error('email')
                            <span class="text-danger">{{ $message ?? '' }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input name="phone" placeholder="Telefone" required="required" class="form-control" type="text">
                            @error('phone')
                            <span class="text-danger">{{ $message ?? '' }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <input name="city" placeholder="Cidade" class="form-control" type="text">
                            @error('city')
                            <span class="text-danger">{{ $message ?? '' }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <select name="state" required="required" class="select form-control">
                                <option value="0" disabled selected>Selecione seu estado</option>
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
                            @error('state')
                            <span class="text-danger">{{ $message ?? '' }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input name="subject" class="form-control" type="text" placeholder="Assunto (opcional)">
                            @error('subject')
                            <span class="text-danger">{{ $message ?? '' }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <textarea name="message" cols="40" rows="5" class="form-control" placeholder="Deixe sua mensagem (opcional)"></textarea>
                            @error('message')
                            <span class="text-danger">{{ $message ?? '' }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block full_colored">
                            Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row d-flex flex-column">
            <div class="card p-3">
                <p>Telefone Fixo: (27) 98833-5381</p>
                <p>Whatsapp: (27) 98833-5381</p>
                <p>Endereço Comercial: Avenida Professor Fernando Duarte Rabelo , 865, sala 203 - Bairro: Maria Ortiz - Vitoria Espirito Santo - CEP: 29070440</p>
                <p> CNPJ - 05355421000159</p>
            </div>
        </div>
    </div>
</div>
@endsection