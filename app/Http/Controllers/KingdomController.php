<?php

namespace App\Http\Controllers;

use App\Models\Kingdom;
use App\Http\Requests\StoreKingdomRequest;
use App\Http\Requests\UpdateKingdomRequest;
use App\DataTables\KingdomDataTable;
use Illuminate\Http\Request;
class KingdomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KingdomDataTable $dataTables)
    {
        return $dataTables->render('dashboard.pages.kingdom.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.kingdom.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Data Validate
        $request->validate([
            'nameAr' => ['required', 'string'],
            'nameEng' => ['required', 'string'],

        ]);


        Kingdom::create([
            'nameAr' => $request->input('nameAr'),
            'nameEng' => $request->input('nameEng'),
        ]);

        $notification = array(
            'message' => 'Kingdom Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('kingdom-admin.index')->with($notification);
    }


    /**
     * Display the specified resource.
     */
    public function show(Kingdom $kingdom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kingdom $kingdom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKingdomRequest $request, Kingdom $kingdom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kingdom $kingdom)
    {
        //
    }
}
