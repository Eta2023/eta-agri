<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Kingdom;

use App\DataTables\KingdomDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class KingdomController extends Controller
{
    public function index(KingdomDataTable $dataTables)
    {
        return $dataTables->render('dashboard.pages.kingdom.index');
    }


    public function create()
    {
        return view('dashboard.pages.kingdom.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Data Validate
        $request->validate([
            'nameAr' => ['required', 'string'],
            'nameEng' => ['required', 'string'],

        ]);


        Kingdom::create([
            'nameAr' => $request->input('nameAr'),
            'nameEng' => $request->input('nameEng'),
        ]);

        $notification = array(
            'message' => 'Kingdom Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('kingdom-admin.index')->with($notification);
    }


    /**
     * Display the specified resource.
     */
    public function show(Kingdom $kingdom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kingdom = Kingdom::findOrFail($id);
        return view('dashboard.pages.kingdom.edit', compact('kingdom'));
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



        Kingdom::where('id', $id)->update($data);

        $notification = array(
            'message' => 'Kingdom Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('kingdom-admin.index')->with($notification);
    }

    public function destroy($id)
    {
       try{ $kingodm = Kingdom::findOrFail($id);

        $kingodm->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);}
        catch (\Exception $e) {
            Log::error("Error deleting kingdom: {$e->getMessage()}");
            return response(['status' => 'error', 'message' => 'You Must have delete Phylum-الشعبة first']);
        }
    }
}
