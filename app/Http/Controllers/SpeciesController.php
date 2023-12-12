<?php

namespace App\Http\Controllers;

use App\DataTables\SpeciesDataTable;
use App\Models\Species;
use App\Http\Requests\StoreSpeciesRequest;
use App\Http\Requests\UpdateSpeciesRequest;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Traits\ImageUploadTrait;
class SpeciesController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(SpeciesDataTable $dataTables)
    {
        return $dataTables->render('dashboard.pages.specias.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types=Type::all();

        return view('dashboard.pages.specias.create' , compact("types"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Data Validate
         $request->validate([
            'name' => ['required', 'string'],
            'manufacture_company' => ['required', 'string'],
            'license_number' => ['required'],
            'type_id'=>['required'],
            'image'=>['required'],
        ]);
        $imagePath = $this->uploadImage($request, 'image', 'uploads');
        
        Species::create([
            'name' => $request->input('name'),
            'manufacture_company' => $request->input('manufacture_company'),
            'license_number' => $request->input('license_number'),
            'type_id' => $request->input('type_id'), 
            'image'=>$imagePath,
        ]);
        $notification = array(
            'message' => 'Species Created Successfully!!',
            'alert-type' => 'success',
        );
    
        return redirect()->route('species-admin.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Species $species)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Species = Species::findOrFail($id);
        $types=Type::all();
        return view('dashboard.pages.specias.edit', compact('Species', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'manufacture_company' => ['required', 'string'],
            'license_number' => ['required'],
            'type_id'=>['required'],
        ]);
       

        $data = $request->except(['_token', '_method']);


        $species = Species::findOrFail($id);
        $imagePath = $this->updateImage($request, 'image', 'uploads', $species->image);

        $data['image'] = empty(!$imagePath) ? $imagePath : $species->image;

        Species::where('id', $id)->update($data);

        $notification = array(
            'message' => 'Species Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('species-admin.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $species = Species::findOrFail($id);
            $species->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);}
            catch  (\Exception $e) {
                Log::error("Error deleting rank: {$e->getMessage()}");
                return response(['status' => 'error', 'message' => 'Error']);
            }
    }
    public function showDetails($id){
        $species = Species::with('types')->find($id);
        return view('dashboard.pages.specias.details',compact('species'));
    
    }
}
