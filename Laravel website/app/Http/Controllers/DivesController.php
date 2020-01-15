<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dive;
use App\User;
use GuzzleHttp\Client;
use SoapClient;

class DivesController extends Controller
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
     * index wordt opgeroepen bij het openen van /dives.
     * maakt verbinding met soap service om duikboekdata op te halen
     * 
     *@retrun view de view van het duikboek 
     * 
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $client = new \SoapClient('http://soapsevice-dev-leandervancappellen.us-east-2.elasticbeanstalk.com/WebService1.asmx?wsdl');
        $aantalDuiken;
        $duikuren;
        
        $response = $client->getAantalDuiken(array("user"=>$user_id));
        foreach($response as $resp){
            $aantalDuiken = $resp;     
        }
        $response = $client->getDuikuren(array("user"=>$user_id));
        foreach($response as $resp){
            $duikuren = $resp;     
        }

        $user = User::find($user_id);
        return view('home')->with('dives', $user->dives)->with('aantalDuiken', $aantalDuiken)->with('aantalDuikuren', $duikuren);
    }

    /**
     * Toont de form om een nieuwe duik te maken.
     *
     * @return view de view van de form
     */
    public function create()
    {
        return view('CreateDive');
    }

    /**
     * Slaat een nieuwe duik op in het duikboek.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view de view van het duikboek
     */
    public function store(Request $request)
    {
            $this->validate($request, [
                'datum' => 'required',
                'locatie' => 'required',
                'duur' => 'required',
                'diepte' => 'required'
            ]);

            $dive = new Dive;
            $dive->user_id = auth()->user()->id;
            $dive->datum = $request->input('datum');
            $dive->locatie = $request->input('locatie');
            $dive->duur = $request->input('duur');
            $dive->diepte = $request->input('diepte');
            $dive->opmerking = $request->input('opmerking');
            $dive->save();
           
            
            return redirect('/dives')->with('success', 'Duik toegevoegd');
    }

    /**
     * Toont een bepaalde duik in detail.
     *
     * @param  int  $id
     * @return view de view van de gedetailleerde duik.
     */
    public function show($id)
    {
        $dive = Dive::find($id);
        return view('Dive')->with('dive', $dive);
    }

    /**
     * Toont de form een een bepaalde duik aan te passen.
     *
     * @param  int  $id
     * @return view de view van de edit form.
     */
    public function edit($id)
    {
        $dive = Dive::find($id);
        return view('EditDive')->with('dive', $dive);
    }

    /**
     * Update de aangepaste duik in het duikboek.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return view de view van het duikboek.
     */
    public function update(Request $request, $id)
    {
            $this->validate($request, [
                'datum' => 'required',
                'locatie' => 'required',
                'duur' => 'required',
                'diepte' => 'required'
            ]);

            $dive = Dive::find($id);
            $dive->datum = $request->input('datum');
            $dive->locatie = $request->input('locatie');
            $dive->duur = $request->input('duur');
            $dive->diepte = $request->input('diepte');
            $dive->opmerking = $request->input('opmerking');
            $dive->save();
           
            
            return redirect('/dives')->with('success', 'Duik geupdate');
    }

    /**
     * Verwijder een bepaalde duik van het duikboek.
     *
     * @param  int  $id
     * @return view de view van het duikboek.
     */
    public function destroy($id)
    {
        $dive = Dive::find($id);
        $dive->delete();
        return redirect('/dives')->with('success', 'Duik verwijderd');
    }
}
