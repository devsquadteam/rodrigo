<?php

namespace Charlie;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $table = 'customers';
    //protegendo
    protected $fillable = [
        'name',
        'city',
        'state',
        'birthdate',
        'special_customer'
    ];

    //casteando
    protected $casts = [
        'special_customer' => 'boolean',
        'birthdate' => 'date'
    ];

    // relacionando os models
    public function purchases(){
        return $this->hasMany(Purchase::class);
    }

}
