<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RateGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'markup',
        'init_increment',
        'increment'
    ];

    public function reseller()
    {
        return $this->belongsTo('App\Models\Reseller');
    }

    public function rateorigin()
    {
        return $this->belongsTo('App\Models\RateOrigin');
    }
}


