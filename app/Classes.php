<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = [
        'class_id', 'majors_id', 'name' , 'year', 
    ];

    public function majors()
    {
        return $this->belongsTo(Majors::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
