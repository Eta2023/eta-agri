<?php

namespace App\Http\Controllers;

use App\Models\Genus;
use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
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
        ]);


        Type::create([
            'nameAr' => $request->input('nameAr'),
            'nameEng' => $request->input('nameEng'),
            'note' => $request->input('note'),

            'genus_id' => $request->input('gen_id'), // where genus_id frome table(model) and gen_id from form (create)
        ]);
        

        $notification = array(
            'message' => 'Type Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('type-admin.index')->with($notification);
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
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        //
    }
}
