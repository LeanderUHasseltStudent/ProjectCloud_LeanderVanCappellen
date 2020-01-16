<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Request;
use App\GradesBook;

class Controller extends BaseController
{   
     /**
     * Plaatst de inkomende data in de database.
     * 
     *@param $id het id van de duiker.
     *@param $eenster,$tweester,$driester,$vierster,$eensterI,$tweesterI,$basicNitrox,$advancedNitrox,$basicTrimix de verschillende graden die kunnen worden behaald.
     * 
     */
    public function postGradesBook($id,$eenster,$tweester,$driester,$vierster,$eensterI,$tweesterI,$basicNitrox,$advancedNitrox,$basicTrimix)
    {
        $Books = GradesBook::all();
        
        foreach ($Books as $Book) {
            if($Book->user_id == $id){

            if($eenster == '1 ster'){
                $Book->eenster = true;
            }
            if($tweester == '2 ster'){
                $Book->tweester = true;
            }       
            if($driester == '3 ster'){
                $Book->driester = true;
            }
            if($vierster == '4 ster'){
                $Book->vierster = true;
            }
            if($eensterI == '1 ster instructeur'){
                $Book->eensterI = true;
            }
            if($tweesterI == '2 ster instructeur'){
                $Book->tweesterI = true;
            }
            if($basicNitrox == 'basis nitrox'){
                $Book->basicNitrox = true;
            }
            if($advancedNitrox == 'geavanceerde nitrox'){
                $Book->advancedNitrox = true;
            }
            if($basicTrimix == 'basis trimix'){
                $Book->basicTrimix = true;
            }
            $Book->save();
            }
        }
    }
    
     /**
     * Haalt het gradesboek van de duike op uit de database.
     * 
     *@param $id het id van de duiker.
     *@return $gradesBook het gradesbook van de duiker in json formaat.
     */
    public function getGradesBook($id)
    {
        $gradesBook = DB::table('grades_books')->where('user_id', $id)->first();
        return json_encode($gradesBook);
    }
}
