<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
  protected $fillable = [
    'course_id','name'
  ];
}
