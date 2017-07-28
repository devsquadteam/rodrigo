<?php

namespace Charlie;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'custumers_id',
        'amount',
        'description'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
