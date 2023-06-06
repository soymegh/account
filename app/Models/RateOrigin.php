<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RateOrigin extends Model
{
    use HasFactory;

    protected $table = 'rate_origin';

    protected $fillable = [
        'rategroup',
        'code',
        'destination',
        'country',
        'status',
        'connection_cost',
        'cost_min',
        'gracetime',
        'init_increment',
        'increment',
    ];

     public function rategroup()
    {
        return $this->hasMany('App\Models\RateGroup');
    }
}


