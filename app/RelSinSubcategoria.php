<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class RelSinSubcategoria extends Model
{
    protected $table = 'rel_sin_subcategorias';
    protected $primaryKey = ['SSC_ID','SCA_ID','SIN_ID'];
    const CREATED_AT = 'RSS_CRIADO';
    const UPDATED_AT = 'RSS_ATUALIZADO';
    
    public $incrementing = false;
   
    static function getRelSinSubcatSindicato($SIN_ID) {
        $categorias = RelSinSubcategoria::where('SIN_ID', '=', $SIN_ID)->get();
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
