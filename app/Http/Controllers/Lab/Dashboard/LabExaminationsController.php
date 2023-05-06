<?php

namespace App\Http\Controllers\Lab\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\MedicalExamination;
use Illuminate\Http\Request;

class LabExaminationsController extends Controller
{
    //

    public function index()
    {
        //

        $examinations = MedicalExamination::with("lab")->where("medical_lab_id",auth("lab")->id())->get();
        return view("labs.examinations.index",compact("examinations"));

    }

    public function deleteExamination(Request $request,MedicalExamination $examination)
    {
        $examination->delete();
        return back()->with("success","Examination Deleted Successfully");

    }

    public function addExamination(Request $request)
    {
        //

        $request->validate([
            "name" => "required",
            "price" => "required"
        ]);

        MedicalExamination::create([
            "medical_lab_id" => auth("lab")->id(),
            "name" => $request->name,
            "price" => $request->price
        ]);

        return back()->with("success","Examination Created Successfully");
    }

    public function pending()
    {
        //
    }

    public function approved()
    {
        //
    }
}
