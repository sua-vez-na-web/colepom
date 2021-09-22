<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'syndicate_id',
        'cycle',
        'plan_id',
        'description',
        'a_reference',
        'a_status',
        'a_customer',
        'a_next_due_date',
        'a_value',
        'a_billing_type',

    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function customer()
    {
        return $this->belongsTo(Syndicate::class, 'syndicate_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
