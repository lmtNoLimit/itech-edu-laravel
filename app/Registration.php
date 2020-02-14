<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
  protected $fillable = [
    'id', 'name' , 'birthday', 'number','email', 'type_of_education', 'course'
];
}
