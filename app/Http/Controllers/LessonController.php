<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;
class LessonController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }
  
  public function index()
  {
      $lessons = Lesson::all();
      return view('admin/lessons/index', [
          'lessons' => $lessons
      ]);
  }

    
}
