<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Family;
use App\Models\Genus;
use Illuminate\Http\Request;
use App\DataTables\GenusDataTable;
use Illuminate\Support\Facades\Log;
class GenusController extends Controller
{
    public function index(GenusDataTable $dataTables)
    {
        return $dataTables->render('dashboard.pages.Genus.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $families=Family::all();

        return view('dashboard.pages.Genus.create' , compact("families"));

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
        
        Genus::create([
            'nameAr' => $request->input('nameAr'),
            'nameEng' => $request->input('nameEng'),
            'note' => $request->input('note'),
            'family_id' => $request->input('family_id'), 
        ]);
        $notification = array(
            'message' => 'Sex Created Successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->route('genus-admin.index')->with($notification);

    }

    /**
     * Display the specified resource.
     */
    public function show(Genus $genus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sex = Genus::findOrFail($id);
        $families = Genus::all();
        return view('dashboard.pages.Genus.edit', compact('sex', 'families'));
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
    
        Genus::where('id', $id)->update($data); // Use Sex model instead of Family model
    
        $notification = array(
            'message' => 'Sex Updated Successfully!!',
            'alert-type' => 'success',
        );
    
        return redirect()->route('genus-admin.index')->with($notification);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {   
        try {
            $genus = Genus::findOrFail($id);
            $genus->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        } catch (\Exception $e) {
            Log::error("Error deleting family: {$e->getMessage()}");
            return response(['status' => 'error', 'message' => 'You Must have delete Type-الصنف first']);
        }
    }
}
