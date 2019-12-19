<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
        public function found(Request $request)
    {
    $client = new \GuzzleHttp\Client(["base_uri" => "http://127.0.0.1:5000/"]);
    $options = [
        'json' => [
        "fruit" => "banaan"
        ]
    ]; 
    $response = $client->post("/", $options)->getBody();
    return $response;
    }
}
