<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\agriculture_types;
use App\Models\irrigation_types;
use App\DataTables\irrigation_typesDataTable;

use App\Http\Requests\Storeirrigation_typesRequest;
use App\Http\Requests\Updateirrigation_typesRequest;
use Illuminate\Http\Request;


class IrrigationTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(irrigation_typesDataTable $dataTables)
    {
        return $dataTables->render('dashboard.pages.irrigation_types.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $AgricultureTypes=agriculture_types::all();

        return view('dashboard.pages.irrigation_types.create' , compact("AgricultureTypes"));

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
            'agriculture_type_id' => ['required'], // Ensure the agriculture_type_id exists in agriculture_types table

        ]);
    
        irrigation_types::create([
            'name_arabic' => $request->input('nameAr'),
            'name_english' => $request->input('nameEng'),
            'agriculture_type_id' => $request->input('agriculture_type_id'),
        ]);
    
        $notification = array(
            'message' => 'Irrigation Types Created Successfully!!',
            'alert-type' => 'success',
        );
    
        return redirect()->route('IrrigationTypes-admin.index')->with($notification);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(irrigation_types $irrigation_types)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $irrigation_types = irrigation_types::findOrFail($id);
        $agriculture_types = agriculture_types::all();
        return view('dashboard.pages.irrigation_types.edit', compact('irrigation_types', 'agriculture_types'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Data Validate
        
        $request->validate([
            'name_arabic' => ['required', 'string'],
            'name_english' => ['required', 'string'],
            'agriculture_type_id' => ['required'], // Ensure the agriculture_type_id exists in agriculture_types table

        ]);

        $data = $request->except(['_token', '_method']);
        irrigation_types::where('id', $id)->update($data);
        
        $notification = array(
            'message' => 'irrigation types Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('IrrigationTypes-admin.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $irrigation_types = irrigation_types::findOrFail($id);
            $irrigation_types->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        } catch (\Exception $e) {
            Log::error("Error deleting irrigation_types: {$e->getMessage()}");
            return response(['status' => 'error']);
        }
    }
}
