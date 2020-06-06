<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'administradores';
    protected $primaryKey = 'ADM_ID';
    const CREATED_AT = 'ADM_CRIADO';
    const UPDATED_AT = 'ADM_ATUALIZADO';
}
