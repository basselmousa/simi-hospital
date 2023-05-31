<?php

namespace App\Http\Controllers\Lab\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\MedicalExamination;
use App\Models\MedicalExaminationRequest;
use App\Models\UserExamination;
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
         $labs =MedicalExamination::where("medical_lab_id",auth("lab")->id())->pluck("id")->toArray();
        $examinations = MedicalExaminationRequest::whereIn("medical_examination_id",$labs)->get();
        return view("labs.requests.index",compact("examinations"));
    }

    public function setValue(Request $request, MedicalExaminationRequest $examination)
    {
        //
        $request->validate([
            "value" => "required",
            "greaterValue" => "required"
        ]);
        UserExamination::create([
            "user_id" => $examination->user_id,
            "doctor_id" => $examination->doctor_id,
            "medical_examination_id" => $examination->medical_examination_id,
            "value" => $request->value,
            "greater_value" => $request->greaterValue,
        ]);
        $examination->delete();
        return back()->with("success","Examination Value Set Successfully");
    }

    public function approved()
    {
        //
        $labs =MedicalExamination::where("medical_lab_id",auth("lab")->id())->pluck("id")->toArray();
        $examinations = UserExamination::whereIn("medical_examination_id",$labs)->get();
        return view("labs.requests.sold",compact("examinations"));
    }
}
