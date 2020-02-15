<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Majors extends Model
{
    protected $fillable = ['id','majors_id', 'name', 'type_of_education'];
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function classes()
    {
        return $this->hasMany(Classes::class);
    }
}
