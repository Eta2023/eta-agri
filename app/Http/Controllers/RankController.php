<?php

namespace App\Http\Controllers;
use App\Models\classeta;
use App\Models\Rank;
use App\Http\Requests\StoreRankRequest;
use App\Http\Requests\UpdateRankRequest;
use App\DataTables\RankDataTable;
use Database\Seeders\ClassetaSeeder;

class RankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RankDataTable $dataTables)
    {
        return $dataTables->render('dashboard.pages.Rank.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $class=classeta::all();

        return view('dashboard.pages.Rank.create' , compact("class"));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRankRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Rank $rank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rank $rank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRankRequest $request, Rank $rank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rank $rank)
    {
        //
    }
}
