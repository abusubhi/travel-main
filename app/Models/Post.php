<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use  SoftDeletes, HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',

    ];

    function post_images(){
        return $this->hasMany(PostImage::class);
    }

    public function getImageAttribute($value)
    {
        if ($value){
            return url('storage/'.$value);
        }
    }
}
