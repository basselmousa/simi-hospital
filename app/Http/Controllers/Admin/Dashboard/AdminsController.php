<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{
  //

    public function index()
    {
        //
        $admins = Admin::all();
        return view("admin.admins.index",compact("admins"));
    }

    public function create(Request $request)
    {
        $request->validate([
            "username" => "required|unique:admins,username",
            "password" => "required|min:8",
        ]);

        Admin::create([
            "username" => $request->username,
            "password" => Hash::make($request->password)
        ]);

        return back()->with("success","Admin Created Successfully");
    }

    public function update(Request $request,Admin $admin){
        $request->validate([
            "password" => "required|min:8",
        ]);
        if ($admin->username == 'superadmin'){
            return back()->with("error","Can't Update super admin");
        }
        $admin->update([
            "password" => Hash::make($request->password)
        ]);
        return back()->with("success","Admin Updated Successfully");
    }
    public function delete(Request $request,Admin $admin)
    {
        if ($admin->username == 'superadmin'){
            return back()->with("error","Can't Delete super admin");
        }
        $admin->delete();
        return back()->with("success","Admin Deleted Successfully");


    }
}
