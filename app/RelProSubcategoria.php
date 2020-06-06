<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class RelProSubcategoria extends Model
{
    protected $table = 'rel_pro_subcategorias';
    protected $primaryKey = ['SPC_ID','PCA_ID','PRO_ID','PAR_ID'];
    const CREATED_AT = 'RPS_CRIADO';
    const UPDATED_AT = 'RPS_ATUALIZADO';

    public $incrementing = false;
   
    static function getRelProSubcatPromocao($ID) {
        $categorias = RelProSubcategoria::where('PRO_ID', '=', $ID)->get();
        return $categorias;
    }

    protected function setKeysForSaveQuery(Builder $query)
    {
        $keys = $this->getKeyName();
        if(!is_array($keys)){
            return parent::setKeysForSaveQuery($query);
        }

        foreach($keys as $keyName){
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }

    protected function getKeyForSaveQuery($keyName = null)
    {
        if(is_null($keyName)){
            $keyName = $this->getKeyName();
        }

        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }

        return $this->getAttribute($keyName);
    }
}
