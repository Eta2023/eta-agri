<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\DataTables\pesticide_typeDataTable;
use App\Models\Pesticide_type;
use App\Http\Requests\StorePesticide_typeRequest;
use App\Http\Requests\UpdatePesticide_typeRequest;

class PesticideTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(pesticide_typeDataTable $dataTables)
    {
     return $dataTables->render('dashboard.pages.pesticide_type.index');
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
    public function store(StorePesticide_typeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pesticide_type $pesticide_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesticide_type $pesticide_type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePesticide_typeRequest $request, Pesticide_type $pesticide_type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesticide_type $pesticide_type)
    {
        //
    }
}
