<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
	protected $table = "registrations";
  protected $fillable = [
    'name', 'email', 'phone', 'type_of_education', 'majors_id'
];
}
