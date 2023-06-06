<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reseller extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rategroup()
    {
        return $this->hasMany('App\Models\RateGroup');
    }
}





