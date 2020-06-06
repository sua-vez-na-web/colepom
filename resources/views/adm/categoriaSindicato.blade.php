@extends('adm.inside')


@section('inside')

    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        @if(isset($categoria->SCA_ID)) 
                            Categoria #{{ $categoria->SCA_ID }}
                        @else
                            Criar Categoria
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
                            @if(isset($categoria->SCA_ID)) 
                                Atualizar Categoria
                            @else
                                Criar Categoria
                            @endif
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">

                               {!! Form::open(['route'=>'admin_sin_cat_submit', 'method'=>'post']) !!}
                                
                                 <input type="hidden" name="id" value="{{ $categoria->SCA_ID }}">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input class="form-control" name="nome" type="text" value="{{ $categoria->SCA_NOME }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Parente</label>
                                        <select class="form-control" name="parente">
                                            <option value="0">Nenhuma</option>
                                            @foreach ($categorias as $cat)
                                                @if ($categoria->SCA_PARENTE == $cat->SCA_ID)
                                                    <option value="{{ $cat->SCA_ID }}" selected> {{ $cat->SCA_NOME }}</option>
                                                @else
                                                    <option value="{{ $cat->SCA_ID }}"> {{ $cat->SCA_NOME }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <!--<div class="form-group">
                                        <label>Subcategoria</label>
                                        <input class="form-control" name="input_subcategoria" id="input_subcategoria" type="text" value="">
                                        <button class="btn btn-success" onclick="AddTableRow(input_subcategoria.value)" type="button">Adicionar subcategoria</button>  
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">Subcategorias</div>
                                                <div class="panel-body">
                                                    <table width="100%" class="table table-striped table-bordered table-hover" id="minhaTabela">
                                                        <thead>
                                                            <tr>
                                                                <th hidden></th>
                                                                <th>Nome</th>
                                                                <th>Ações</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($categoria->getSubcategorias() as $categoria)
                                                            <tr>
                                                                <td><input class="form-control" name="subcategorias[]" type="text" value="{{ $categoria->SSC_NOME }}"></td>
                                                                <td>
                                                                    <a href="{{route('admin_par_cat_view', ['id'=> $categoria->SCA_ID])}}" class="btn btn-primary">Alterar</a>
                                                                    <a href="{{route('admin_par_cat_view', ['id'=> $categoria->SCA_ID])}}" class="btn btn-danger">Excluir</a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->

                                    
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">
                                                                        @if(isset($categoria->SCA_ID)) 
                                                                            Atualizar
                                                                        @else
                                                                            Criar
                                                                        @endif</button>
                                                                        
                                                                        <a href="{{route('admin_sin_cat_list')}}" type="reset" class="btn btn-danger">Voltar</a>
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


