<?php

namespace App\Http\Controllers;

use App\Models\agriculture_types;
use App\Models\classeta;
use App\Models\Family;
use App\Models\farmer;
use App\Http\Requests\StorefarmerRequest;
use App\Http\Requests\UpdatefarmerRequest;
use App\Models\Genus;
use App\Models\irrigation_types;
use App\Models\Kingdom;
use App\Models\Phylum;
use App\Models\Rank;
use App\Models\Species;
use App\Models\Type;
class FarmerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.pages.indexFarmer');

    }
    public function count(){
        $kingdom=Kingdom::get();
        $phylum=Phylum::get();
        $class= classeta::get();
        $family= Family::get();        
        $rank= Rank::get();
        $genus= Genus::get();
        // $species= Species::get();
        $types= Type::get();
        $species = Species::all();
        $agriculture_types = agriculture_types::all();
        $irrigation_types = irrigation_types::all();

        return view('dashboard.pages.indexFarmer', compact('kingdom','phylum','class','family','rank','genus','species','agriculture_types','irrigation_types'));

    }
public function speciesAndTypesDetailes(){

}
public function addFarmDetailes(){
    
}
public function manageFarmDetailes(){
    
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorefarmerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(farmer $farmer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(farmer $farmer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatefarmerRequest $request, farmer $farmer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(farmer $farmer)
    {
        //
    }
}
