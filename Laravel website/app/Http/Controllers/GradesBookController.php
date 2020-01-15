<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\GradesBook;

class GradesBookController extends Controller
{
     /**
     * Maak deze pagina enkel toegankelijk voor authenticated users.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
     /**
     * Toont de gradesbook pagina.
     * Maakt gradesboek aan als user er nog geen heeft.
     * Haalt gradesboek op via API.
     * 
     *@retun view de view van het gradesboek. 
     *
     */
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
        $client = new \GuzzleHttp\Client;
        $request = $client->post("http://127.0.0.1:8001/api/getGradesBook/$user_id");
        $response = $request->getBody();
        $dec = json_decode($response);
        return view('GradesBook')->with('gradesbook', $dec);
    }
    
     /**
     * Toont form op de grades te updaten.
     * 
     *@retun view de view van het form. 
     *
     */
    public function update()
    {
        return view('CreateGradesBook');
    }
    
     /**
     * Stuurt de geupdate gradesboek op naar de API voor opslag.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @retun view de view van het gradesboek. 
     *
     */
    public function submitUpdate(Request $request)
    {
        if($request['1_ster'] == null){$eenster = 0;} else{$eenster = $request['1_ster'];}
        if($request['2_ster'] == null){$tweester = 0;} else{$tweester = $request['2_ster'];}
        if($request['3_ster'] == null){$driester = 0;} else{$driester = $request['3_ster'];}
        if($request['4_ster'] == null){$vierster = 0;} else{$vierster = $request['4_ster'];}
        if($request['1_ster_instructeur'] == null){$eensterI = 0;} else{ $eensterI = $request['1_ster_instructeur'];}
        if($request['2_ster_instructeur'] == null){$tweesterI = 0;} else{$tweesterI = $request['2_ster_instructeur'];}
        if($request['basis_nitrox'] == null){$basicNitrox = 0;} else{$basicNitrox = $request['basis_nitrox'];}
        if($request['geavanceerde_nitrox'] == null){$advancedNitrox = 0;} else{$advancedNitrox = $request['geavanceerde_nitrox'];}
        if($request['basis_trimix'] == null){$basicTrimix = 0;} else{$basicTrimix = $request['basis_trimix'];}

        $user_id = auth()->user()->id;
        $client = new \GuzzleHttp\Client;
        $request = $client->post("http://127.0.0.1:8001/api/postGradesBook/$user_id/$eenster/$tweester/$driester/$vierster/$eensterI/$tweesterI/$basicNitrox/$advancedNitrox/$basicTrimix");
        return redirect('/dives')->with('success', 'Duik graden geupdate');
    }
    
  

}
