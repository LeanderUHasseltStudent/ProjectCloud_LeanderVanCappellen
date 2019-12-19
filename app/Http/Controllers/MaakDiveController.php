<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaakDiveController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }
    
        public function store(Request $request)
    {
            $this->validate($request, [
                'locatie' => 'required',
                'duur' => 'required'
            ]);
            return redirect('/home');
    }            
    
        public function index()
    {
        return view('MakeDiveView');
    }
}
