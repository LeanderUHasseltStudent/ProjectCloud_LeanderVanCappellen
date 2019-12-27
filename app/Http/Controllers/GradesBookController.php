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
        if (GradesBook::where('user_id', $user_id)->exists()) {}
        else{
            $gradesBook = new GradesBook;
          
            $gradesBook->user_id = auth()->user()->id;
            $gradesBook->_1ster = false;
            $gradesBook->_2ster = false;
            $gradesBook->_3ster = false;
            $gradesBook->_4ster = false;
            $gradesBook->_1sterI = false;
            $gradesBook->_2sterI = false;
            $gradesBook->basicNitrox = false;
            $gradesBook->advancedNitrox = false;
            $gradesBook->basicTrimix = false;
            $gradesBook->save();
        }
        
        $client = new \GuzzleHttp\Client();
        $request = $client->get("http://127.0.0.1:8000/gradesBook/update/submit/$user_id");    
        $response = $request->getBody();
        return $response;
        
        $user = User::find($user_id);
        return view('GradesBook');//->with('gradesbook', $user->grades_books);
    }
    
    public function update()
    {
        return view('CreateGradesBook');
    }
    
    public function submitUpdate(Request $request)
    {
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            $gradesBook = $user->grades_books;
            if($request['1_ster'] == '1 ster'){
                $gradesBook->_1ster = true;
            }
            if($request['2_ster'] == '2 ster'){
                $gradesBook->_2ster = true;
            }
            if($request['3_ster'] == '3 ster'){
                $gradesBook->_3ster = true;
            }
            if($request['4_ster'] == '4 ster'){
                $gradesBook->_4ster = true;
            }            
            if($request['1_ster_instructeur'] == '1 ster instructeur'){
                $gradesBook->_1sterI = true;
            }
            if($request['2_ster_instructeur'] == '2 ster instructeur'){
                $gradesBook->_2sterI = true;
            }
            if($request['basis_nitrox'] == 'basis nitrox'){
                $gradesBook->basicNitrox = true;
            }
            if($request['geavanceerde_nitrox'] == 'geavanceerde nitrox'){
                $gradesBook->advancedNitrox = true;
            }
            if($request['basis_trimix'] == 'basis trimix'){
                $gradesBook->basicTrimix = true;
            }
            $gradesBook->save();         
        
    }
    
    
    public function getGrades($user_id)
    {
        $user = User::find($user_id);
        $gradesBook = $user->grades_books;
        return "hello";
    }

}
