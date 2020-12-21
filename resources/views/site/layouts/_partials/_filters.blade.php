<div class="pesquisa-box">
    @if($table == 'partner')
    <form action="{{ route('partners.search') }}" method="get">
        @elseif($table == 'syndicate')
        <form action="{{ route('syndicates.search') }}" method="get">
            @elseif($table=='stores')
            <form action="{{ route('promotions.search') }}" method="get">
                @endif

                @if(isset($states))
                <div class="form-group">
                    <label for="estados">Estado</label>
                    <select name="estado" id="estados" class="form-control">
                        <option value="">Todos</option>
                        @foreach($states as $state)
                        <option value="{{ $state->id ?? '' }}">{{ $state->nome ?? ''  }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <select name="cidade" id="cidades" class="form-control" disabled>

                    </select>
                </div>
                @endif


                @if(isset($categories))
                <div class="form-group">
                    <label for="checkbox" class="control-label">Categorias</label>
                    <div class="colored-checkbox-list">
                        @foreach($categories as $category)
                        <label class="checkbox-block">{{$category->name}}
                            <input type="checkbox" name="category[]" class="form-check-input" value="{{$category->id}}">
                            <span class="checkmark"></span>
                        </label>
                        @endforeach
                    </div>
                </div>

                @endif

                <div class="form-group submit-box">
                    <button type="submit" class="btn btn-block btn-light-colored">
                        Buscar
                    </button>
                </div>
            </form>
</div>

@section('js')
<script>
    $('#estados').change(function() {
        uf = event.target.value;
        getCidades(uf);
    })

    function getCidades(uf) {

        $.getJSON(`/ajaxCidades?uf=${uf}`, function(response) {
            if (response.length > 0) {
                var option = '<option value="">Selecione uma cidade</option>';
                $.each(response, function(i, obj) {
                    option += `<option value="${obj.id}" data-index="${i}">${obj.nome}</option>`;
                })
                $('#cidades').html(option).attr('disabled', false);
                return
            }
            return
        })
    }
</script>
@endsection