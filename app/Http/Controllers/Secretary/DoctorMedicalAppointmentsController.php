<?php

namespace App\Http\Controllers\Secretary;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Homeable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use PhpParser\Comment\Doc;


class DoctorMedicalAppointmentsController extends Controller
{
    //
    public function index()
    {
        $appoints = Appointment::with(['doctor', 'user'])
            ->where('doctor_id', auth('secretary')->user()->doctor_id)
            ->where('type', '=', 'Home')
            ->where('status', '=', 'pending')
            ->get();
        $type = 'Home Medicine';
        return view('secretary.dashboard.appointment.index', compact('appoints', 'type'));
    }


    public function clinic()
    {
        $appoints = Appointment::with(['doctor', 'user'])
            ->where('doctor_id', auth('secretary')->user()->doctor_id)
            ->where('type', '=', 'Clinic')
            ->where('status', '=', 'pending')
            ->get();
        $type = 'Clinic';

        return view('secretary.dashboard.appointment.index', compact('appoints', 'type'));
    }

    public function change_status(Request $request, Appointment $appointment)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $appointment->update([
            'status' => $request->status,
        ]);
        return redirect()->back();
    }

    public function care()
    {
        $appoints = Homeable::with([
            'user', 'medicine', 'medicine.doctor'
//            'medicine.doctor' => function($query){
//            $query->select('id' , auth('secretary')->user()->doctor_id);
//            }
        ])->wherein('status',  ['pending','Waiting-For-User-Acceptance'])
            ->whereHas('medicine.doctor' ,function ($query){
            $query->where('id', auth('secretary')->user()->doctor_id);
        }, '=')->get();
//        dd($appoints, auth('secretary')->user()->doctor_id);

        return view('secretary.dashboard.appointment.home-care', compact('appoints'));
    }

    public function care_accept(Request $request, Homeable $homeable)
    {
        $request->validate([
            'price' => 'required'
        ]);
        $homeable->update([
            'price' => $request->price,
            'status' => 'Waiting-For-User-Acceptance'
        ]);

        return redirect()->route('secretary.dashboard.appointments.home-care');
    }


    public function home_reappoint()
    {
        //

        $appoints = Appointment::with(['user', 'doctor'])
            ->where('type', '=','Home')
            ->where('status', '=', 'Re-Appoint')

            ->get();
        $type = 'Home';
        return view('secretary.dashboard.appointment.re-appoint', compact('appoints', 'type'));
    }

    public function clinic_reappoint()
    {
        //
        $type = 'Clinic';
        $appoints = Appointment::with(['user', 'doctor'])
            ->where('type', '=','Clinic')
            ->where('status', '=', 'Re-Appoint')
            ->get();
        return view('secretary.dashboard.appointment.re-appoint', compact('appoints', 'type'));
    }

    public function reappoint(Request $request, Appointment $appoint, $type)
    {
        //
        return view('secretary.dashboard.appointment.appoint', compact('appoint', 'type'));
    }

    public function reappoint_change_status(Request $request,Appointment $appoint, Doctor $doctor, User $user, $type)
    {
        //
        $request->validate([
            'date' => 'required|after_or_equal:now',
            'type' => 'required',

        ]);
        $times  = $doctor->dates()->where('day', Carbon::make($request->date)->getTranslatedDayName())
            ->where('type', '=', $request->type)
            ->get(['start_time', 'end_time'])->values()->toArray();
//dd(count($times));
//        dd($times[0]['start_time'], $times[0]['end_time']);
        if (count($times) > 0){
            $request->validate([
                'time' => 'required|after_or_equal:'.$times[0]['start_time'] . '|before_or_equal:'. $times[0]['end_time'],
            ]);
        }else{
            throw  \Illuminate\Validation\ValidationException::withMessages([
                'date' => 'The Doctor Doesn\'t Work In The Selected Day '
            ]);
        }
        $user->appoints()->attach($user->id,[
            'doctor_id' => $doctor->id,
            'date' => Carbon::make($request->date),
            'time' => Carbon::make($request->time)->toTimeString(),
            'type' => $request->type,
            'status' => 'Accepted'
        ]);

        $appoint->update([
            'status' => 'Done'
        ]);

        return redirect()->route( $type == 'Clinic' ? 'secretary.dashboard.re-appointments.clinic':'secretary.dashboard.re-appointments.home-appointment')->with('success', 'Appointed');
    }


}
