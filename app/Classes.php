<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Classes as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Classes extends Model
{
    use Notifiable;
    protected $fillable = [
        'name' , 'year', 'course_id'
    ];
    // public function course()
    // {
    //     return $this->belongsTo(Course::class);
    // }

    // public function users()
    // {
    //     return $this->hasMany(User::class);
    // }
}
