<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $table = "users";
    protected $fillable = [
        'student_id', 
        'name', 
        'username', 
        'gender', 
        'birthday', 
        'address', 
        'email', 
        'phone', 
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeSearch($query, $q)
    {
        return $query->where("name", "like", "%".$q."%")
            ->orWhere("username", "like", "%".$q."%")
            ->orWhere("email", "like", "%".$q."%")
            ->orWhere("student_id", "like", "%".$q."%")
            ->orWhere("phone", "like", "%".$q."%");
    }
}
