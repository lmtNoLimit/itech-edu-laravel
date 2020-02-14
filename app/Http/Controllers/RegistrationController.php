<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Registration;
class RegistrationController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }
  
  public function index()
  {
      $registrations = Registration::all();
      // dd($classes);
      return view('admin/registrations/index');
  }
}
