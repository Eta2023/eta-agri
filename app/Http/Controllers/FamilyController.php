<?php

namespace App\Http\Controllers;

use App\DataTables\FamilyDataTable;
use App\Models\Family;
use App\Http\Requests\StoreFamilyRequest;
use App\Http\Requests\UpdateFamilyRequest;
use App\Models\Rank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FamilyDataTable $dataTables)
    {
        return $dataTables->render('dashboard.pages.family.index');
    }
    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $ranks = Rank::all();

        return view('dashboard.pages.family.create', compact("ranks"));
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


        Family::create([
            'nameAr' => $request->input('nameAr'),
            'nameEng' => $request->input('nameEng'),
            'note' => $request->input('note'),
            'ranks_id' => $request->input('rank'), 
        ]);


        $notification = array(
            'message' => 'Family Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('family-admin.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Family $family)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $family = Family::findOrFail($id);
        $ranks = Rank::all();
        return view('dashboard.pages.family.edit', compact('family', 'ranks'));
    }

    public function update(Request $request, $id)
    {
        // Data Validate
        $request->validate([
            'nameAr' => ['required', 'string'],
            'nameEng' => ['required', 'string'],
            'ranks_id' => ['required'],

        ]);

        $data = $request->except(['_token', '_method']);

        Family::where('id', $id)->update($data);

        $notification = array(
            'message' => 'Family Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('family-admin.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $family = Family::findOrFail($id);
            $family->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        } catch (\Exception $e) {
            Log::error("Error deleting family: {$e->getMessage()}");
            return response(['status' => 'error', 'message' => 'You Must have delete Genus-الجنس first']);
        }
    }
}
