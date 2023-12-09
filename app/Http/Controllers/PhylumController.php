<?php

namespace App\Http\Controllers;

use App\Models\Kingdom;
use App\Models\Phylum;
use App\Http\Requests\StorePhylumRequest;
use App\Http\Requests\UpdatePhylumRequest;
use App\DataTables\PhylumDataTable;
use Illuminate\Http\Request;



class PhylumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PhylumDataTable $dataTables)
    {
        return $dataTables->render('dashboard.pages.Phylum.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kingdoms=Kingdom::all();

        return view('dashboard.pages.Phylum.create' , compact("kingdoms"));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Data Validate
        $request->validate([
            'nameAr' => ['required', 'string'],
            'nameEng' => ['required', 'string'],
            'note' => ['required', 'string'],


        ]);


        Phylum::create([
            'nameAr' => $request->input('nameAr'),
            'nameEng' => $request->input('nameEng'),
            'note' => $request->input('note'),

            'kingdom_id' => $request->input('kingdom'), // Make sure to replace 'kingdom_id' with the actual field name
        ]);
        

        $notification = array(
            'message' => 'Phylum Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('phylum-admin.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Phylum $phylum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Phylum $phylum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhylumRequest $request, Phylum $phylum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Phylum $phylum)
    {
        //
    }
}
