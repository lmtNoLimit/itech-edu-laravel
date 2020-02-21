<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['course_id', 'name'];

    public function courses()
    {
        return $this->belongsTo(Course::class);
    }
}
