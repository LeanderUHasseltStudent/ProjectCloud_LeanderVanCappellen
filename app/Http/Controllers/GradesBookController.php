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
       $client = new \GuzzleHttp\Client(["base_uri" => "http://127.0.0.1:8001/"]);
       $options = [
            'json' => [
            "id" => $user_id
            ]
        ];
        $response = $client->post("/api/getGradesBook", $options)->getBody();
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
        $client = new \GuzzleHttp\Client(["base_uri" => "http://127.0.0.1:8001/api/"]);
        $options = [
            'json' => [
            "id" => $user_id,
            "1_ster" => $request['1_ster'],
            "2_ster" => $request['2_ster'],
            "3_ster" => $request['3_ster'],
            "4_ster" => $request['4_ster'],
            "1_ster_instructeur" => $request['1_ster_instructeur'],
            "2_ster_instructeur" => $request['2_ster_instructeur'],
            "basis_nitrox" => $request['basis_nitrox'],
            "geavanceerde_nitrox" => $request['geavanceerde_nitrox'],
            "basis_trimix" => $request['basis_trimix'],
            ]
        ];
        $response = $client->post("/postGradesBook", $options)->getBody();
        return redirect('/dives')->with('success', 'Duik graden geupdate');
    }
    
  

}
