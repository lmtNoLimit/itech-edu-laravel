<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function classes()
    {
        return $this->hasMany(Classes::class);
    }
    protected $fillable = ['id', 'name', 'type'];
}
