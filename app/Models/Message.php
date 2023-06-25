<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    use SoftDeletes;
    protected $fillable = ['user_id', 'message_text'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
