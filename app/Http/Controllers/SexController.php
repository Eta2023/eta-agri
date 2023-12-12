<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\Sex;
use App\Http\Requests\StoreSexRequest;
use App\Http\Requests\UpdateSexRequest;
use Illuminate\Http\Request;
use App\DataTables\SexDataTable;


class SexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SexDataTable $dataTables)
    {
        return $dataTables->render('dashboard.pages.Sex.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $families=Family::all();

        return view('dashboard.pages.Sex.create' , compact("families"));

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nameAr' => ['required', 'string'],
            'nameEng' => ['required', 'string'],
            'family_id' => ['required'],
        ]);
        Sex::create([
            'nameAr' => $request->input('nameAr'),
            'nameEng' => $request->input('nameEng'),
            'note' => $request->input('note'),
            'family_id' => $request->input('family_id'), 
        ]);
        $notification = array(
            'message' => 'Sex Created Successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->route('sex-admin.index')->with($notification);

    }

    /**
     * Display the specified resource.
     */
    public function show(Sex $sex)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sex = Sex::findOrFail($id);
        $families = Family::all();
        return view('dashboard.pages.family.edit', compact('sex', 'families'));
    }

    public function update(Request $request, $id)
    {
        // Data Validate
        $request->validate([
            'nameAr' => ['required', 'string'],
            'nameEng' => ['required', 'string'],
            'family_id' => ['required'],

        ]);

        $data = $request->except(['_token', '_method']);

        Family::where('id', $id)->update($data);

        $notification = array(
            'message' => 'Sex Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('sex-admin.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {   
        try {
            $sex = Sex::findOrFail($id);
            $sex->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        } catch (\Exception $e) {
            Log::error("Error deleting family: {$e->getMessage()}");
            return response(['status' => 'error', 'message' => 'You Must have delete Genus-الجنس first']);
        }
    }
}
