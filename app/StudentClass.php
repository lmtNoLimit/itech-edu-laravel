<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class StudentClass extends Model
{
  protected $fillable = [
    'class_id', 'student_id'
  ];
}
