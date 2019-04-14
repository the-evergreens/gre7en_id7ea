<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;
use App\Role;
use App\User;
use App\Utilities\GoogleMaps;
use Jcf\Geocode\Geocode;


class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $search;

    if(isset($_GET["position"])){
        $position = explode(' ', $_GET["position"], 2); 
        $latitude = $position[0];
        $longitude = !empty($position[1]) ? $position[1] : '';
    }
    elseif(isset($_GET["latitude"]) && isset($_GET["longitude"])){
        $latitude = $_GET["latitude"];
        $longitude = $_GET["longitude"];
        $search = $_GET["search"];
    }

    $windowLat = $latitude;
    $windowLon = $longitude;
    $message = 'Вие сте тук';

    if(!empty($search)){
        $response = app('Geocoder')->address($search)
            ->language('en')
            ->region('bg')
            ->geocode(); 
        if($response){
            $arrResults = $response->results;
            $message = $search;
            $windowLat = $arrResults[0]->geometry->location->lat; 
            $windowLon = $arrResults[0]->geometry->location->lng;
        }      
    }    
        // dd($response = app('Geocoder')->address('Плиска 1 Враца')
        //        ->language('en')
        //        ->region('bg')
        //        ->geocode());

     $points = Position::select('latitude','longitude','density','created_at')->where('active',1)->get()->toJson();
     return view('home')->with(compact(['points','latitude','longitude', 'windowLat', 'windowLon','message']));


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
