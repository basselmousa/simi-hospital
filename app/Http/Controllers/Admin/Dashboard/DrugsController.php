<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Drug;
use Illuminate\Http\Request;

class DrugsController extends Controller
{
    //
    public function index()
    {
        //
        $drugs  = Drug::all();

        return view("admin.drugs.index",compact("drugs"));

    }

    public function create(Request $request)
    {
        //
        $request->validate([
            "name" => "required",
            "price" => "required"
        ]);

        Drug::create([
            "name" => $request->name,
            "price" => $request->price
        ]);

        return back()->with("success" , "Drug Created Successfully");

    }

    public function update(Request $request,Drug $drug)
    {

        $request->validate([
            "name" => "required",
            "price" => "required"
        ]);

        $drug->update([
            "name" => $request->name,
            "price" => $request->price
        ]);

        return back()->with("success" , "Drug Updated Successfully");
    }

    public function delete(Request $request,Drug $drug)
    {
        $drug->delete();
        return back()->with("success" , "Drug Deleted Successfully");

    }
}
