<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\DataTables\CompanyDataTable;
use App\Models\Company;

use App\Models\Type;
use Illuminate\Http\Request;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CompanyDataTable $dataTables)
    {
        $types = Type::all();

        return $dataTables->render('dashboard.pages.company.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('dashboard.pages.company.create', compact('types'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // Data Validate
        $request->validate([
            'nameAr' => ['required', 'string'],
            'nameEng' => ['required', 'string'],
            'mobile' => ['required', 'string'],
            'email' => ['required', 'string'],
            'location' => ['required', 'string'],
            'logo' => ['required', 'string'],

        ]);
        Company::create([
            'nameAr' => $request->input('nameAr'),
            'nameEng' => $request->input('nameEng'),
            'mobile' => $request->input('mobile'),
            'email' => $request->input('email'),
            'location' => $request->input('location'),
            'logo' => $request->input('logo'),
            // 'type_id' => $request->input('type_id'),
        ]);

        $notification = array(
            'message' => 'company Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('companies-admin.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return view('dashboard.pages.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , $id)
    {
        $request->validate([
            'nameAr' => ['required', 'string'],
            'nameEng' => ['required', 'string'],
            'mobile' => ['required', 'string'],
            'email' => ['required', 'string'],
            'location' => ['required', 'string'],
            'logo' => ['required'],

        ]);
        $data = $request->except(['_token', '_method']);
        Company::where('id', $id)->update($data);

        $notification = array(
            'message' => 'Company Updated Successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->route('companies-admin.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $company = Company::findOrFail($id);
            $company->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);}
            catch  (\Exception $e) {
                Log::error("Error deleting company: {$e->getMessage()}");
            }
    }
}
