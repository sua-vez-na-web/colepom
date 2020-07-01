<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'role_id',
        'description',
        'is_active'
    ];
    /**
     * Relations
     */
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

}
