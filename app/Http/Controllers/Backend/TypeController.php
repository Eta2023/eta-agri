<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Genus;
use App\Models\Type;
use Illuminate\Http\Request;
use App\DataTables\TypeDataTable;



class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TypeDataTable $dataTables)
    {
        return $dataTables->render('dashboard.pages.Type.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gen=Genus::all();

        return view('dashboard.pages.Type.create' , compact("gen"));

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
            'genus_id' => ['required'],
        ]);


        Type::create([
            'nameAr' => $request->input('nameAr'),
            'nameEng' => $request->input('nameEng'),
            'note' => $request->input('note'),
            'genus_id' => $request->input('genus_id'), 
        ]);
        

        $notification = array(
            'message' => 'Type Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('types-admin.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Type = Type::findOrFail($id);
        $genus = Genus::all();
        return view('dashboard.pages.Type.edit', compact('Type', 'genus'));
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
            'genus_id' => ['required'],

        ]);

        $data = $request->except(['_token', '_method']);



        Type::where('id', $id)->update($data);

        $notification = array(
            'message' => 'Type Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('types-admin.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $type = Type::findOrFail($id);
            $type->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);}
            catch  (\Exception $e) {
                Log::error("Error deleting rank: {$e->getMessage()}");
                return response(['status' => 'error', 'message' => 'You Must have delete genus-الجنس first']);
            }
    }
}
