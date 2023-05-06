<?php

namespace App\Http\Controllers\Pharmacy\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PharmacyProfileController extends Controller
{
    //
    public function index()
    {
        $pharmacy = auth("pharmacy")->user();
        return view("pharmacy.auth.profile",compact("pharmacy"));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:pharmacies,email,'.auth("pharmacy")->id(),
            'password' => 'nullable|min:8|confirmed',
            'address' => 'required',
            'country' => 'required|not_in:0',
            'city' => 'required|not_in:0',
            'facility_no' => 'required|not_in:0|unique:pharmacies,facility_no,'.auth("pharmacy")->id(),
            'building_number' => 'required',
            'phone_number' => 'required|unique:pharmacies,phone_number,'.auth("pharmacy")->id().'|min:10|max:10',
            'logo' => 'nullable|mimes:jpg,jpeg,png|max:10000'
        ]);

        if (isset($request->password)){
            $password = Hash::make($request->password);
        }else{
            $password = auth("pharmacy")->user()->password;
        }
        if ($request->hasFile("logo"))
        {
            $logo = $this->profile_image_upload($request);
        }else{
            $logo = auth("pharmacy")->user()->logo;
        }
        auth("pharmacy")->user()->update([
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
            return $request->file('logo')->store('pharmacy/'. $request->name . '/');
        }
        return null;
    }
}
