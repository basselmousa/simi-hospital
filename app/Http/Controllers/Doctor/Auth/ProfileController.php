<?php

namespace App\Http\Controllers\Doctor\Auth;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    //
    public function index()
    {
        $doctor = auth('doctor')->user();
        $doctorCertificates = auth('doctor')->user()->certifications;
        $names = explode(' ', $doctor->full_name);
        $rate = auth('doctor')->user()->rate()->average('rate');

//        dd($rate);
//        dd(count($doctor->appointments->where('status', '=', 'pending')));
        return view('doctors.auth.profile', compact('doctor', 'doctorCertificates', 'names', 'rate'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'fathername' => 'required',
            'familyname' => 'required',
            'email' => 'required|unique:doctors,email,' . auth('doctor')->id(),
            'password' => 'nullable|min:8|confirmed',
            'country' => 'required',
            'city' => 'required|not_in:0',
            'gender' => 'required|not_in:0',
            'building_number' => 'required',
            'phone_number' => 'required|min:10|max:10|unique:doctors,phone_number,' . auth('doctor')->id(),
            'image' => 'nullable|mimes:jpg,jpeg,png|max:10000'
        ]);
//        dd(auth('doctor')->user()->password);
        $pass = '';
        if ($request->password !== null) {
            $pass = Hash::make($request->password);
        } else {
            $pass = auth('doctor')->user()->password;
        }

//        dd($pass == auth('doctor')->user()->password);

        $request['password'] = $pass;
        $this->update_doctor($request);
        return redirect()->route('dashboard.doctor.profile.profile');

    }

    private function update_doctor(Request $request)
    {
        return auth('doctor')->user()->update([
            'full_name' => $request['firstname'] . " " . $request['fathername'] . " " . $request['familyname'],
            'email' => $request['email'],
            'password' => $request['password'],
            'country' => $request['country'],
            'city' => $request['city'],
            'gender' => $request['gender'],
            'building_number' => $request['building_number'],
            'phone_number' => $request['phone_number'],
            'image' => $request->hasFile('image') ? $this->profile_image_update($request) : auth('doctor')->user()->image,
        ]);
    }

    private function profile_image_update(Request $request)
    {
        $fullname = $request['firstname'] . " " . $request['fathername'] . " " . $request['familyname'];

        return $request->file('image')->store('doctors/' . $fullname . '/');


    }
}
