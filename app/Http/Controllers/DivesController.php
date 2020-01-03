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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
    $this->middleware('auth');
    }
    
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CreateDive');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dive = Dive::find($id);
        return view('Dive')->with('dive', $dive);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dive = Dive::find($id);
        return view('EditDive')->with('dive', $dive);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dive = Dive::find($id);
        $dive->delete();
        return redirect('/dives')->with('success', 'Duik verwijderd');
    }
}
