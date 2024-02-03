<?php


namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\agriculture_types;
use App\DataTables\agriculture_typesDataTable;

use App\Http\Requests\Storeagriculture_typesRequest;
use App\Http\Requests\Updateagriculture_typesRequest;
use Illuminate\Http\Request;


class AgricultureTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(agriculture_typesDataTable $dataTables)
    {
        return $dataTables->render('dashboard.pages.agriculture_types.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $AgricultureTypes=agriculture_types::all();

        return view('dashboard.pages.agriculture_types.create' , compact("AgricultureTypes"));

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


        agriculture_types::create([
            'nameAr' => $request->input('nameAr'),
            'nameEng' => $request->input('nameEng'),

        ]);
        

        $notification = array(
            'message' => 'agriculture_types Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('AgricultureTypes-admin.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(agriculture_types $agriculture_types)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $agriculture_types = agriculture_types::findOrFail($id);
        return view('dashboard.pages.agriculture_types.edit', compact('agriculture_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Data Validate
        $request->validate([
            'nameAr' => ['required', 'string'],
            'nameEng' => ['required', 'string'],

        ]);

        $data = $request->except(['_token', '_method']);



        agriculture_types::where('id', $id)->update($data);

        $notification = array(
            'message' => 'agriculture types Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('AgricultureTypes-admin.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $agriculture_types = agriculture_types::findOrFail($id);
            $agriculture_types->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        } catch (\Exception $e) {
            Log::error("Error deleting phylum: {$e->getMessage()}");
            return response(['status' => 'error', 'message' => 'You Must have delete irrigation_types-انواع الري first']);
        }
    }
}
