<?php

namespace App\Http\Controllers\Doctor\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Secretary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SecretaryController extends Controller
{
    //

    public function index()
    {
        $secretaries = auth('doctor')->user()->secretary;
        return view('doctors.secretary.index', compact('secretaries'));
    }

    public function create(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:secretaries',
            'password' => 'required|min:8'
        ]);

        auth('doctor')->user()->secretary()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('dashboard.doctor.secretary.index');
    }

    public function update(Request $request, Secretary $secretary)
    {
        //

        $request->validate([
            'name' => 'required',
            'password' => 'nullable|min:8'
        ]);
        if (isset($request->password)){
            $pass = Hash::make($request->password);
        }
        else{
            $pass = $secretary->password;
        }

        $secretary->update([
            'name' => $request->name,
            'password' => $pass
        ]);
        return redirect()->route('dashboard.doctor.secretary.index');
    }

    public function destroy(Request $request, Secretary $secretary)
    {
        //
        if ($secretary->doctor_id != auth('doctor')->id()){
            abort(401);
        }
        $secretary->delete();
        return redirect()->route('dashboard.doctor.secretary.index');
    }
}
