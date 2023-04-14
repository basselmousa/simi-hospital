<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_doctors = Doctor::all()->count();
        $all_patients = User::all()->count();
        $all_appointments = Appointment::all()->count();
        $doctors  = Doctor::query()
            ->select(['doctors.*', 'rates.*', DB::raw('AVG(rate) as rating')])
            ->join('rates', 'doctors.id', '=', 'doctor_id')
            ->groupBy(['doctor_id'])
            ->having('rating',  '>=', '3')
            ->get();
        return view('welcome', compact('doctors', 'all_appointments', 'all_doctors', 'all_patients'));
    }
}
