<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Pesticide;
use App\Models\Kingdom;
use App\Models\Pesticide_type;
use App\Models\Type;
use App\DataTables\PesticideDataTable;
use Illuminate\Http\Request;


use App\Http\Requests\StorePesticideRequest;
use App\Http\Requests\UpdatePesticideRequest;

class PesticideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PesticideDataTable $dataTables)
    {
        return $dataTables->render('dashboard.pages.pesticide.index');
    }


    /**
     * Show the form for creating a new resource.
     */

    public function createConnection($id)
    {
        $kingdomId = 3; // Change this to the desired kingdom ID
        $kingdom = Kingdom::find($kingdomId);
        $pesticide = Pesticide::find($id);
        $pesticides = Pesticide::all();

        $types = Type::whereHas('genus.families.rank.classetas.phylums.kingdom', function ($query) use ($kingdomId) {
            $query->where('id', $kingdomId);
        })->get();

         return view('dashboard.pages.pesticide.conn', compact('pesticide','pesticides','types','kingdom'));

    }
    public function storeConnection(Request $request )
    {
        //  dd($request);
        $request->validate([
            'pesticide_id' => ['required'],
            'type_id' => ['required'],
        ]);
    
        // Create a new connection using the form data
        $connection = new Pesticide_type();
        $connection->pesticide_id = $request->pesticide_id; 
        $connection->type_id = $request->type_id; 
        $connection->save();
                 

        // return redirect()->route('pesticides-admin.index')->with($notification);
        return redirect()->route('pesticide_type-admin.index');

    }

    // public function create(Request $request)
    // {
    //     // in popub no need to create function 
    // }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        // Data Validate
        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'license_number' => ['required', 'numeric'],
        ]);

        Pesticide::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'license_number' => $request->input('license_number'),
        ]);

        $notification = [
            'message' => 'Pesticide Created Successfully!!',
            'alert-type' => 'success',
        ];

        return redirect()->route('pesticides-admin.index')->with($notification);
    }


    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pesticide = Pesticide::findOrFail($id);
        // $ranks = Rank::all();
        return view('dashboard.pages.pesticide.edit', compact('pesticide'));
    }

    public function update(Request $request, $id)
    {
        // Data Validate
        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'license_number' => ['required', 'numeric'],
        ]);

        $data = $request->except(['_token', '_method']);

        Pesticide::where('id', $id)->update($data);

        $notification = array(
            'message' => 'Pesticide Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('pesticides-admin.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $pesticide = Pesticide::findOrFail($id);
            $pesticide->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        } catch (\Exception $e) {
            Log::error("Error deleting company: {$e->getMessage()}");
        }
    }
    public function show($id)
    {
        // Your logic to retrieve and display a specific pesticide
        $pesticide = Pesticide::findOrFail($id);

        // Assuming you have a view named 'show' in 'resources/views/dashboard/pages/pesticide'
        return view('dashboard.pages.pesticide.show', compact('pesticide'));
    }




}
