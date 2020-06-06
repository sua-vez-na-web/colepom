<?php

namespace App\Associado;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AssociadoFrontendModel extends Model
{
	public function selectAssociado($id)
	{
		return DB::table('associados')->where('ASS_ID', $id)->first();
	}

	public function updateAssociado($id, $data)
	{
		return DB::table('associados')->where('ASS_ID', $id)->update($data);
	}
}
