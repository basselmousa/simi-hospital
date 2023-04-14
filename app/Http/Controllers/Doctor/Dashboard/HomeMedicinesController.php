<?php

namespace App\Http\Controllers\Doctor\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\HomeMedicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeMedicinesController extends Controller
{
    //

    public function index()
    {
        //
        $medicines = auth('doctor')->user()->medicine;
        return view('doctors.homeable.index', compact('medicines'));
    }

    public function create(Request $request)
    {
        //

        $request->validate([
            'nurse' => 'required',
            'gender' => 'required|not_in:0',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);

        auth('doctor')->user()->medicine()->create([
            'nurse' => $request->nurse,
            'gender' => $request->gender,
            'image' => $this->nurse_image_upload($request)
        ]);

        return redirect()->route('dashboard.doctor.homeable.index');
    }

    public function edit(Request $request , HomeMedicine $home)
    {
        //
    }

    public function update(Request $request  , HomeMedicine $home)
    {
        //
    }

    public function destroy(Request $request , HomeMedicine $home)
    {
        if ($home->doctor_id == auth('doctor')->id()){
            Storage::delete($home->image);
            $home->delete();
            return redirect()->route('dashboard.doctor.homeable.index');
        }
        abort(401);

    }

    private function nurse_image_upload(Request $request)
    {
        $fullname = auth('doctor')->user()->full_name;
        if ($request->hasFile('image')){
            return $request->file('image')->store('doctors/'. $fullname . '/');
        }
        return null;
    }
}
