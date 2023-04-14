<?php

namespace App\Http\Controllers\Doctor\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Homeable;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    public function clinic()
    {
        $appoints = Appointment::with('user', 'doctor')
            ->where('doctor_id', auth('doctor')->id())
            ->where('type', '=', 'Clinic')
            ->where('status', '=', 'Accepted')
            ->get();


        return view('doctors.appointments.index', compact('appoints'));
    }

    public function home()
    {
        $appoints = Appointment::with('user', 'doctor')
            ->where('doctor_id', auth('doctor')->id())
            ->where('type', '=', 'Home')
            ->get();

        return view('doctors.appointments.index', compact('appoints'));
    }

    public function pending()
    {
        $appoints = Appointment::with('user', 'doctor')
            ->where('doctor_id', auth('doctor')->id())
            ->where('status', '=', 'pending')
            ->get();

        return view('doctors.appointments.pending', compact('appoints'));
    }

    public function care()
    {
        $appoints = Homeable::with(['user', 'medicine', 'medicine.doctor'])
            ->where('status', '=', 'Accepted')
            ->whereHas('medicine.doctor', function ($query) {
                $query->where('id', auth('doctor')->id());
            }, '=')->get();
//        dd($appoints);
        return view('doctors.appointments.care', compact('appoints'));
    }

    public function change_appointment_status(Request $request, Appointment $appointment)
    {
        //
        $request->validate([
            'status' => 'required',
        ]);
        $appointment->update([
            'status' => $request->status
        ]);

        return redirect()->route('dashboard.doctor.appointments.pending');

    }

    public function write_report(Request $request, Appointment $appointment)
    {
        //
        $request->validate([
            'prescription' => 'required',
            'recommendation' => 'required',
            'status' => 'required|not_in:0'
        ]);

        $appointment->user->report()->attach($appointment->user_id, [
            'recommendation' => $request->recommendation,
            'prescription' => $request->prescription,

            'doctor_id' => auth('doctor')->id()
        ]);

        $appointment->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Report written successfully');

    }

    public function finish_care(Request $request, Homeable $homeable)
    {
        $homeable->update([
            'status' => 'Done'
        ]);

        return redirect()->route('dashboard.doctor.appointments.doctor-care')->with('success', 'Home Care done successfully');
    }

    public function destroy(Request $request, Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('dashboard.doctor.appointments.home');
    }

}
