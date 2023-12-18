<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(UserDataTable $dataTables)
    {
        return $dataTables->render('dashboard.pages.user.index');
    }

    public function create()
    {
       

        return view('dashboard.pages.user.create' );

    }
    public function store(Request $request)
    {
        
        // Data Validate
        $request->validate([
            'name' => ['required', 'string'],
            'email' => 'required|email|unique:users',
            'role' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'phone' =>  ['required',
            'regex:/^(079|078|077)\d{7}$/'
            ,'max:10'],
            'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'
            ]
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->password),
            'role' => $request->input('role'),
            'gender' => $request->input('gender'), 
            'phone' => $request->input('phone'), 
        ]);
        

        $notification = array(
            'message' => 'Type Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('user-admin.index')->with($notification);
    }

}
