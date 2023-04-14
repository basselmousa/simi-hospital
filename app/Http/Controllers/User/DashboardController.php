<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index()
    {
        return view('user.home');
    }

    public function rate(Request $request, Doctor $doctor)
    {
        $doctor->rate()->attach($doctor->id,[
            'rate' => $request->rating,
            'user_id' => auth()->id()
        ]);

        return redirect()->back()->with('success', 'Rated');
    }
}
