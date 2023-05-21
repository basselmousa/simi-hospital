<?php

namespace App\Http\Controllers\Doctor\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DoctorLab;
use App\Models\MedicalLab;
use Illuminate\Http\Request;

class DoctorLabsController extends Controller
{
    //
    public function index()
    {

        $labs = DoctorLab::with(["lab"])->where('doctor_id',auth("doctor")->id())->get();

        $medicalLabs = MedicalLab::whereNotIn("id",$labs->pluck("medical_lab_id"))->get();

        return view("doctors.labs.index",compact("labs","medicalLabs"));
    }

    public function create(Request $request)
    {
        //
        $request->validate([
            "lab_id" => "required"
        ]);

        DoctorLab::create([
            "medical_lab_id" => $request->lab_id,
            "doctor_id" => auth("doctor")->id()
        ]);
        return back()->with("success","Lab Created Successfully");
    }

    public function delete(Request $request, DoctorLab $lab)
    {
        //
        $lab->delete();
        return back()->with("success","Lab Deleted Successfully");
    }
}
