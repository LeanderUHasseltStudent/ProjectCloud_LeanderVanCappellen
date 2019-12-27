<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\GradesBook;

class GradesBookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('GradesBook')->with('gradebook', $user->gradeBooks);
    }
}
