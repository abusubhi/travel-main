<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use SoftDeletes, HasRoles, HasFactory, Notifiable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'end_name',
        'email',
        'phone',
        'postal_number',
        'gender',
        'birth_date',
        'password',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRoleIdAttribute()
    {
        return ($this->roles and (!empty($this->roles[0]))) ? $this->roles[0]->id : 0;
    }

    public function getImageAttribute($value)
    {
        return url('storage/'.$value);
    }



    static function gender($gender = ""){
        $array =  [
            0 => __('other'),
            1 => __('Male'),
            2 => __('Female'),
        ];

        if($gender == ""){
            return $array;
        }else{
            return !empty($array[$gender]) ? $array[$gender] : $gender;
        }
    }


    static function registerRole($registerRole = ""){
        $array =  [
            3 => __('user'),
        ];

        if($registerRole == ""){
            return $array;
        }else{
            return !empty($array[$registerRole]) ? $array[$registerRole] : $registerRole;
        }
    }


    function users() {
        return $this->hasMany(User::class);
    }

    function travelers()
    {
        return $this->hasMany(Traveler::class);
    }




}
