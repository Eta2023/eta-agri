<?php

namespace App\Http\Controllers;
use App\Models\classeta;
use App\Models\Rank;
use App\Http\Requests\StoreRankRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateRankRequest;
use App\DataTables\RankDataTable;
use Database\Seeders\ClassetaSeeder;

class RankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RankDataTable $dataTables)
    {
        return $dataTables->render('dashboard.pages.Rank.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $class=classeta::all();

        return view('dashboard.pages.Rank.create' , compact("class"));

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
        'class_id' => ['required'],
    ]);
   
    
    Rank::create([
        'nameAr' => $request->input('nameAr'),
        'nameEng' => $request->input('nameEng'),
        'note' => $request->input('note'),
        'class_id' => $request->input('class_id'), 
    ]);
    $notification = array(
        'message' => 'Rank Created Successfully!!',
        'alert-type' => 'success',
    );

    return redirect()->route('rank-admin.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rank $rank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Rank = Rank::findOrFail($id);
        $classetas = classeta::all();
        return view('dashboard.pages.rank.edit', compact('Rank', 'classetas'));
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
            'class_id' => ['required'],

        ]);

        $data = $request->except(['_token', '_method']);



        Rank::where('id', $id)->update($data);

        $notification = array(
            'message' => 'Rank Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('rank-admin.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rank = Rank::findOrFail($id);
        $rank->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
