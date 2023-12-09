<?php

namespace App\Http\Controllers;

use App\DataTables\ClassetaDataTable;
use App\Models\classeta;
use App\Http\Requests\StoreclassetaRequest;
use App\Http\Requests\UpdateclassetaRequest;
use App\Models\Phylum;
use Illuminate\Http\Request;

class ClassetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ClassetaDataTable $dataTables)
    {
        return $dataTables->render('dashboard.pages.class.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $phylums = Phylum::all();
        return view('dashboard.pages.class.create', compact('phylums'));
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
            'phylums_id' => ['required'],

        ]);
        classeta::create([
            'nameAr' => $request->input('nameAr'),
            'nameEng' => $request->input('nameEng'),
            'note' => $request->input('note'),
            'phylums_id' => $request->input('phylums_id'),
        ]);

        $notification = array(
            'message' => 'Class Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('class-admin.index')->with($notification);
    }
    /**
     * Display the specified resource.
     */
    public function show(classeta $classeta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $class = classeta::findOrFail($id);
        $phylums = Phylum::all();
        return view('dashboard.pages.class.edit', compact('class', 'phylums'));
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
            'phylums_id' => ['required'],

        ]);

        $data = $request->except(['_token', '_method']);



        classeta::where('id', $id)->update($data);

        $notification = array(
            'message' => 'Class Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('class-admin.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $class = classeta::findOrFail($id);
        $class->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
