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
    public function edit($id)
    {
        $phylum = Phylum::findOrFail($id);
        $kingdoms = Kingdom::all();
        return view('dashboard.pages.Phylum.edit', compact('phylum', 'kingdoms'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Data Validate
        $request->validate([
            'nameAr' => ['required', 'string'],
            'nameEng' => ['required', 'string'],
            'note' => ['required', 'string'],
            'kingdom_id' => ['required'],

        ]);

        $data = $request->except(['_token', '_method']);



        Phylum::where('id', $id)->update($data);

        $notification = array(
            'message' => 'phylum Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('phylum-admin.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Phylum = Phylum::findOrFail($id);
        $Phylum->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
