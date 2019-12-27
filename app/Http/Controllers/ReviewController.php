<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }
    
    public function index()
    {
        $user_name = auth()->user()->name;
        return view('Review')->with('user_name', $user_name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CreateReview');
    }
    
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
}
