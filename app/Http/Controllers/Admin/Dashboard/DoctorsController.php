<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;


class DoctorsController extends Controller
{
    //
    public function active()
    {
        $doctors = Doctor::where("active","=",true)->get();
        return view("admin.doctors.active",compact("doctors"));

    }

    public function pending()
    {
        //
        $doctors = Doctor::where("active","=",false)->get();
        return view("admin.doctors.inactive",compact("doctors"));
    }

    public function activate(Request $request, Doctor $doctor)
    {
        //
        $doctor->update([
            "active" => true,
        ]);
        return back()->with("success","Doctor Activated Successfully");
    }

    public function deActivate(Request $request,Doctor $doctor)
    {
        //
        $doctor->update([
            "active" => false,
        ]);
        return back()->with("success","Doctor DeActivated Successfully");
    }
}
