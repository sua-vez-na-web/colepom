@extends('adm.inside')


@section('inside')

<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
          @if(isset($associado->ADM_ID)) 
              Associado #{{ $associado->ASS_ID }}
          @else
              Criar Associado
          @endif          
          </h1>
    </div>
      <!-- /.col-lg-12 -->
  </div>
    <!-- /.row -->
  <div class="row">
    <div class="col-lg-6">
      <div class="panel panel-default">
        <div class="panel-heading">
            @if(isset($associado->ASS_ID)) 
                Atualizar Associado
            @else
                Criar Associado
            @endif
        </div>
        <div class="panel-body">
          <div class="row">
              <div class="col-lg-6">
              {!! Form::open(['route'=>'admin_ass_submit', 'method'=>'post', 'files'=>true]) !!}
              <input type="hidden" name="id" value="{{$associado->ASS_ID}}"/>

              <div class="form-group">
                  <label>Sindicato</label>
                  <select class="form-control" name="sindicato">
                      <option value="0" disabled>
                          Selecione o Sindicato
                      </option>
                      @foreach($sindicatos as $sindicato)
                      <option value="{{$sindicato->SIN_ID}}" @if($sindicato->SIN_ID == $associado->SIN_ID) selected @endif>
                          {{$sindicato->SIN_FANTASIA}}
                      </option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                <label>Nome</label>
                <input class="form-control" name="nome" type="text" value="{{ $associado->ASS_NOME }}" required>
              </div>

              <div class="form-group">
                  <label>Email</label>
                  <input class="form-control" name="email" type="email" value="{{ $associado->ASS_EMAIL }}" required>
              </div>

              <div class="form-group">
                  <label>Senha</label>
                  <input class="form-control" name="senha" type="password" value="">
              </div>

              <div class="form-group">
                      <label>Nascimento</label>
                  <input class="form-control" name="nascimento" type="date" value="{{ $associado->ASS_NASCIMENTO }}" required>
              </div>

              <div class="form-group">
                  <label>Genero</label>

              <label class="radio-inline">
                  <input name="genero" type="radio" value="M" required @if($associado->ASS_GENERO == "M") 
                  checked
                  @endif> Masculino
              </label>

              <label class="radio-inline">
                  <input name="genero" type="radio" value="F" required @if($associado->ASS_GENERO == "F") 
                  checked
                  @endif> Feminino
              </label>


              </div>

              <div class="form-group">
                      <label>Empresa</label>
                  <input class="form-control" name="empresa" type="text" value="{{ $associado->ASS_EMPRESA }}" required>
              </div>

              <div class="form-group">
                      <label>Função</label>
                  <input class="form-control" name="funcao" type="text" value="{{ $associado->ASS_FUNCAO }}" required>
              </div>

              <div class="form-group">
                      <label>CPF</label>
                  <input class="form-control" name="CPF" type="text" value="{{ $associado->ASS_CPF }}" required>
              </div>

              <div class="form-group">
                      <label>CEP</label>
                  <input class="form-control" name="CEP" type="text" value="{{ $associado->ASS_CEP }}">
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
                  <input class="form-control" name="cidade" type="text" value="{{ $associado->ASS_CIDADE }}">
              </div>

              <div class="form-group">
                      <label>Bairro</label>
                  <input class="form-control" name="bairro" type="text" value="{{ $associado->ASS_BAIRRO }}">
              </div>

              <div class="form-group">
                      <label>Rua</label>
                  <input class="form-control" name="rua" type="text" value="{{ $associado->ASS_RUA }}">
              </div>

              <div class="form-group">
                      <label>Numero</label>
                  <input class="form-control" name="numero" type="number" value="{{ $associado->ASS_NUMERO }}">
              </div>

              <div class="form-group">
                      <label>Complemento</label>
                  <input class="form-control" name="complemento" type="text" value="{{ $associado->ASS_COMPLEMENTO }}">
              </div>

              <button type="submit" class="btn btn-success">
                  @if(isset($associado->ASS_ID)) 
                      Atualizar
                  @else
                      Criar
                  @endif</button>
              <a href="{{route('admin_ass_list')}}" type="reset" class="btn btn-danger">Voltar</a>
              {!! Form::close() !!}
              </div>
              <!-- /.col-lg-6 (nested) -->
          </div>
          <!-- /.row (nested) -->
        </div>
          <!-- /.panel-body -->
      </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
  </div>
    <!-- /.row -->
</div>
    <!-- /#page-wrapper -->


    <!-- /#wrapper -->

@endsection

@section('js')
<script>
    document.getElementById("seleciona-estados").value = "{{$associado->ASS_UF}}";
</script>
@endsection