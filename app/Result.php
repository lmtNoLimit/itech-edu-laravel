<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public $table = "results";
    protected $fillable = [
        'class_id', 'subject_id', 'content'
    ];
}
