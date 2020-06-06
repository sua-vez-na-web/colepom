<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cupom extends Model
{
    protected $table = 'cupons';
    protected $primaryKey = 'CUP_ID';
    const CREATED_AT = 'CUP_CRIADO';
    const UPDATED_AT = 'CUP_ATUALIZADO';

    function getAssociado() {
        $cupom = Associado::where('ASS_ID', $this->ASS_ID)->first();
        return $cupom;
    }

    function getParceiro() {
        $parceiro = Parceiro::where('PAR_ID', $this->PAR_ID)->first();
        return $parceiro;
    }

    function getPromocao() {
        $promocao = Promocao::where('PRO_ID', $this->PRO_ID)->first();
        return $promocao;
    }
}
