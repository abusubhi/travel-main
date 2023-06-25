<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Traveler extends Model
{
    use  SoftDeletes, HasFactory;

    protected $fillable = [
        'storage',
        'weight',
        'date_travel',
        'date_travel',
        'form',
        'to',
        'user_id',
        'price',

    ];


    function user()
    {
        return $this->belongsTo(User::class);
    }
}
