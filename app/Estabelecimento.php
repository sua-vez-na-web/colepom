<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estabelecimento extends Model
{
    protected $table = 'estabelecimentos';
    protected $primaryKey = 'EST_ID';
    const CREATED_AT = 'EST_CRIADO';
    const UPDATED_AT = 'EST_ATUALIZADO';
}
