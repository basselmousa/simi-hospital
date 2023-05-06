<?php

namespace App\Http\Controllers\Labs\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LabsProfileController extends Controller
{
    //
    public function index()
    {
        $pharmacy = auth("lab")->user();
        return view("labs.auth.profile",compact("pharmacy"));
    }

    public function updateProfile(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:medical_labs,email,'.auth("lab")->id(),
            'password' => 'nullable|min:8|confirmed',
            'address' => 'required',
            'country' => 'required|not_in:0',
            'city' => 'required|not_in:0',
            'facility_no' => 'required|not_in:0|unique:medical_labs,facility_no,'.auth("lab")->id(),
            'building_number' => 'required',
            'phone_number' => 'required|unique:medical_labs,phone_number,'.auth("lab")->id().'|min:10|max:10',
            'logo' => 'nullable|mimes:jpg,jpeg,png|max:10000'
        ]);

        if (isset($request->password)){
            $password = Hash::make($request->password);
        }else{
            $password = auth("lab")->user()->password;
        }
        if ($request->hasFile("logo"))
        {
            $logo = $this->profile_image_upload($request);
        }else{
            $logo = auth("lab")->user()->logo;
        }
        auth("lab")->user()->update([
            'name' =>$request['name'],
            'username' =>$request['username'],
            'email' => $request['email'],
            'password' => $password,
            'country' => $request['country'],
            'city' => $request['city'],
            'address' => $request['address'],
            'facility_no' => $request['facility_no'],
            'building_number' => $request['building_number'],
            'phone_number' => $request['phone_number'],
            'logo' => $logo,
        ]);
        return back()->with("success","profile updated successfully");
    }
    private function profile_image_upload(Request $request)
    {

        if ($request->hasFile('logo')){
            return $request->file('logo')->store('labs/'. $request->name . '/');
        }
        return null;
    }
}
