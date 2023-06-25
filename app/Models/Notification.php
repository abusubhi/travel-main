<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use HasFactory , SoftDeletes;

     protected $fillable = [
         'name',
         'number',
         'rating',
         'update',
     ];


    function user() {

        return $this->belongsTo(User::class);
    }

    function product() {

        return $this->belongsTo(TypeProduct::class,'product_id')->without('products','notifications');
    }

    function type_exploit() {

        return $this->belongsTo(TypeExploit::class);
    }

    function rating_exploit() {

        return $this->belongsTo(RatingExploit::class);
    }

}
