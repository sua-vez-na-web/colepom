@extends('adm.inside')


@section('inside')

    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        @if(isset($promocao->PRO_ID)) 
                            Promoção #{{ $promocao->PRO_ID }}
                        @else
                            Criar Promoção
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
                            @if(isset($promocao->PRO_ID)) 
                                Atualizar Promoção
                            @else
                                Criar Promoção
                            @endif
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">

                                {!! Form::open(['route'=>'admin_pro_submit', 'method'=>'post', 'files'=>true]) !!}

                                        <input type="hidden" name="id" value="{{$promocao->PRO_ID}}"/>

                                        <div class="form-group">
                                            <label>Parceiro</label>
                                            <select class="form-control" name="parceiro">
                                                <option value="0" disabled>
                                                        Selecione o Parceiro
                                                    </option>
                                                    @foreach($parceiros as $parceiro)
                                                    <option value="{{$parceiro->PAR_ID}}" @if($parceiro->PAR_ID == $promocao->PAR_ID) selected @endif>
                                                            {{$parceiro->PAR_FANTASIA}}
                                                    </option>
                                                    @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                                <label>Nome</label>
                                            <input class="form-control" name="nome" type="text" value="{{ $promocao->PRO_NOME }}" required>
                                        </div>

                                        <div class="form-group">
                                                <label>Descrição</label>
                                            <textarea class="form-control" name="descricao" type="" value="" required>{{ $promocao->PRO_DESCRICAO }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Foto da Promoção</label>
                                            <input name="foto" type="file" accept="image/*" value="{{ $promocao->PRO_FOTO }}">

                                            <img style="max-width: 300px; max-height: 300px;" src="{{ asset($promocao->PRO_FOTO) }}">
                                        </div>

                                        <div class="form-group">
                                                <label>Porcentagem</label>
                                            <input class="form-control" name="porcentagem" type="number" value="{{ $promocao->PRO_PORCENTAGEM }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Validade</label>
                                        <input class="form-control" name="validade" type="date" value="{{ $promocao->PRO_VALIDADE }}">
                                        </div>
                                        @foreach ($promocao->getCategorias() as $categoria)						
                                            <div class="form-group">
                                                <label for="checkbox" class="control-label">{{$categoria->PCA_NOME}}</label>
                                                
                                                @foreach ($categoria->getSubcategorias() as $subcategoria)
                                                    <div class="checkbox">
                                                        <label>
                                                        @if($promocao->getSubcategorias()->contains('SPC_ID',$subcategoria->SPC_ID))
                                                            <input type="checkbox" name="subcategorias[]" checked value="{{$subcategoria->SPC_ID}}">
                                                        @else
                                                            <input type="checkbox" name="subcategorias[]" value="{{$subcategoria->SPC_ID}}">
                                                        @endif
                                                        {{$subcategoria->SPC_NOME}}</label>
                                                    </div>
                                                @endforeach	                                                
                                            </div>
                                        @endforeach
                                        <button type="submit" class="btn btn-success">
                                            @if(isset($promocao->PRO_ID)) 
                                                Atualizar
                                            @else
                                                Criar
                                            @endif</button>
                                        <a href="{{route('admin_pro_list')}}" type="reset" class="btn btn-danger">Voltar</a>
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
