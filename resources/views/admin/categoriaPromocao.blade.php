@extends('adm.inside')


@section('inside')

    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        @if(isset($estabelecimento->EST_ID)) 
                            Estabelecimento #{{ $estabelecimento->EST_ID }}
                        @else
                            Criar Estabelecimento
                        @endif
                        
                        </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            @if(isset($estabelecimento->EST_ID)) 
                                Atualizar Estabelecimento
                            @else
                                Criar Estabelecimento
                            @endif
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">

                               {!! Form::open(['route'=>'admin_par_est_submit', 'method'=>'post']) !!}

                                    <input type="hidden" name="id" value="{{$estabelecimento->EST_ID}}"/>
                                    <div class="form-group">
                                        <label>Parceiro</label>
                                        <select class="form-control" name="parceiro_id">
                                            @foreach($parceiros as $parceiro)
                                                <option class="form-control" name="parceiro_id" value="{{$parceiro->PAR_ID}}">{{$parceiro->PAR_FANTASIA}}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                    <div class="form-group">
                                            <label>Nome</label>
                                        <input class="form-control" name="nome" type="text" value="{{ $estabelecimento->EST_NOME }}" required>
                                    </div>

                                    <div class="form-group">
                                            <label>CEP</label>
                                        <input class="form-control" name="cep" type="text" value="{{ $estabelecimento->EST_CEP }}" required>
                                    </div>

                                    <div class="form-group">
                                            <label>UF</label>
                                        <input class="form-control" name="uf" type="text" value="{{ $estabelecimento->EST_UF }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Cidade</label>
                                    <input class="form-control" name="cidade" type="text" value="{{ $estabelecimento->EST_CIDADE }}" required>
                                    </div>

                                    <div class="form-group">
                                            <label>Bairro</label>
                                        <input class="form-control" name="bairro" type="text" value="{{ $estabelecimento->EST_BAIRRO }}" required>
                                    </div>

                                    <div class="form-group">
                                            <label>Rua</label>
                                        <input class="form-control" name="rua" type="text" value="{{ $estabelecimento->EST_RUA }}" required>
                                    </div>

                                    <div class="form-group">
                                            <label>Número</label>
                                        <input class="form-control" name="numero" type="text" value="{{ $estabelecimento->EST_NUMERO }}" required>
                                    </div>

                                    <div class="form-group">
                                            <label>Complemento</label>
                                        <input class="form-control" name="complemento" type="text" value="{{ $estabelecimento->EST_COMPLEMENTO }}">
                                    </div>

                                    <div class="form-group">
                                            <label>Latitude</label>
                                        <input class="form-control" name="latitude" type="text" value="{{ $estabelecimento->EST_LAT }}">
                                    </div>

                                    <div class="form-group">
                                            <label>Logitude</label>
                                        <input class="form-control" name="logitude" type="text" value="{{ $estabelecimento->EST_LNG }}">
                                    </div>

                                    <div class="form-group">
                                            <label>Telefone</label>
                                        <input class="form-control" name="telefone" type="text" value="{{ $estabelecimento->EST_TELEFONE }}">
                                    </div>

                                    <div class="form-group">
                                            <label>Telefone Alternativo</label>
                                        <input class="form-control" name="telefone_alt" type="text" value="{{ $estabelecimento->EST_TELEFONE_ALT }}">
                                    </div>
                                    <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">
                                                                    @if(isset($estabelecimento->EST_ID)) 
                                                                        Atualizar
                                                                    @else
                                                                        Criar
                                                                    @endif</button>
                                                                    
                                                                    <a href="{{route('admin_sin_est_list')}}" type="reset" class="btn btn-danger">Voltar</a>
                                    </div>

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

(function($) {	  
    
    AddTableRow = function() {
        var valor = $("#input_subcategoria").val();
        var newRow = $("<tr>");	    
        var cols = "";	
        cols += '<td hidden><input style="visibility:hidden" class="form-control" name="subcategorias[]" type="text" value="'+valor+'"></td>';	    
        cols += '<td>'+valor+'</td>';	   
        cols += '<td>';	    
        cols += '<button onclick="RemoveTableRow(this)" type="button">Remover</button>';	    
        cols += '</td>';	
        newRow.append(cols);	    
    
    $("#minhaTabela").append(newRow);	
    $("#input_subcategoria").val("");
        return false;	  
    };	

    RemoveTableRow = function(handler) {
        var tr = $(handler).closest('tr');
        tr.fadeOut(400, function(){ 
            tr.remove(); 
        });

        return false;
    };
})(jQuery);

</script>
@endsection