<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\InsuranceCompany;
use Illuminate\Http\Request;

class InsuranceCompaniesController extends Controller
{
    //

    public function index()
    {
        //
        $companies  = InsuranceCompany::all();

        return view("admin.insurance-companies.index",compact("companies"));

    }

    public function create(Request $request)
    {
        //
        $request->validate([
            "name" => "required",
            "username" => "required|unique:insurance_companies,username",
            "password" => "required",
            "coverage_ratio" => "required",
            "email" => "required|unique:insurance_companies,email",
            "facility_no" => "required|unique:insurance_companies,facility_no",
            "country" => "required",
            "address" => "required",
            "building_number" => "required",
            "phone_number" => "required|unique:insurance_companies,phone_number",
            "logo" => "required|mimes:jpeg,png,jpg",
        ]);

        InsuranceCompany::create([
            "name" => $request->name,
            "username" => $request->username,
            "password" => $request->password,
            "coverage_ratio" => $request->coverage_ratio,
            "email" => $request->email,
            "facility_no" => $request->facility_no,
            "country" => $request->country,
            "address" => $request->address,
            "building_number" => $request->building_number,
            "phone_number" => $request->phone_number,
            "logo" => $this->profile_image_upload($request),
        ]);

        return back()->with("success" , "Insurance Company Created Successfully");

    }

    public function update(Request $request,InsuranceCompany $company)
    {

        $request->validate([
            "name" => "required",
            "password" => "nullable",
            "coverage_ratio" => "required",
            "country" => "required",
            "address" => "required",
            "building_number" => "required",
            "phone_number" => "required|unique:insurance_companies,phone_number,".$company->id,
            "logo" => "nullable|mimes:jpeg,png,jpg",
        ]);

        $company->update([
            "name" => $request->name,
            "password" => $request->password,
            "coverage_ratio" => $request->coverage_ratio,
            "email" => $request->email,
            "facility_no" => $request->facility_no,
            "country" => $request->country,
            "address" => $request->address,
            "building_number" => $request->building_number,
            "phone_number" => $request->phone_number,
            "logo" => $this->profile_image_upload($request),
        ]);

        return back()->with("success" , "Insurance Company Updated Successfully");
    }

    public function delete(Request $request,InsuranceCompany $company)
    {
        $company->delete();
        return back()->with("success" , "Insurance Company Deleted Successfully");

    }
    private function profile_image_upload(Request $request)
    {

        if ($request->hasFile('logo')){
            return $request->file('logo')->store('insuranceCompany/'. $request->name . '/');
        }
        return null;
    }
}
