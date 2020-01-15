<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
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
     * Laat de review page zien.
     *
     * @return view de view van de review page.
     */
    public function index()
    {
        $user_name = auth()->user()->name;
        return view('Review')->with('user_name', $user_name);
    }

    /**
     * Laat de form zien om een review te maken.
     *
     * @return view de view van het form?
     */
    public function create()
    {
        return view('CreateReview');
    }
    
     /**
     * Post de review naar de API voor opslag.
     *
     * @param  \Illuminate\Http\Request  $request.
     * @return view de view van de review page.
     */
    public function postReview(Request $request)
    {
        $this->validate($request, [
            'locatie' => 'required',
            'review' => 'required',
            ]);

        $client = new \GuzzleHttp\Client(["base_uri" => "http://127.0.0.1:5000/"]);
        $options = [
            'json' => [
            "Schrijver" => auth()->user()->name,
            "Locatie" => $request->input('locatie'),
            "Review" => $request->input('review')
            ]
        ]; 
        $response = $client->post("/postReview", $options)->getBody();
        return redirect('/reviews')->with('success', 'Review toegevoegd');
    }
    
     /**
     * Get reviews van de API.
     *
     * @param  \Illuminate\Http\Request  $request.
     * @return view de view van de review page.
     */
        public function getReview(Request $request)
    {
            $this->validate($request, [
                'locatie' => 'required',
            ]);
            
        $client = new \GuzzleHttp\Client(["base_uri" => "http://127.0.0.1:5000/"]);
        $options = [
            'json' => [
            "Locatie" => $request->input('locatie'),
            ]
        ]; 
        $response = $client->post("/getReview", $options)->getBody();
        $response_dec = json_decode($response);
        return view('review')->with("reviews", $response_dec);
    }
    
     /**
     * Laat de ingegeven locatie op een kaart zien via google maps.
     *
     * @param  \Illuminate\Http\Request  $request.
     * @return view de view van de kaart.
     */
    
    public function zieKaart(Request $request)
    {      
        return view('ViewMap')->with("Locatie", $request->input('locatie'));
    }
}
