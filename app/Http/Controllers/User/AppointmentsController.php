<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Homeable;
use App\Models\HomeMedicine;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AppointmentsController extends Controller
{
    //

    public function clinic()
    {
        $type = 'Clinic';
        $appoints = Appointment::with('user','doctor')
            ->where('user_id', auth()->id())
            ->where('type', '=', 'Clinic')
            ->whereNot('status', '=', 'pending')
            ->get();


        return view('user.appointments.index', compact('appoints', 'type'));
    }

    public function home()
    {
        $type = 'Home Medicine';
        $appoints = Appointment::with('user','doctor')
            ->where('user_id', auth()->id())
            ->where('type', '=', 'Home')
            ->whereNot('status', '=', 'pending')
            ->get();

//        $appoints = auth()->user()->appoints()->where('type', '=', 'Clinic')->get();
//        dd($appoints);
        return view('user.appointments.index', compact('appoints', 'type'));
    }
    public function pending()
    {
        $appoints = Appointment::with('user','doctor')
            ->where('user_id', auth()->id())
            ->where('status', '=', 'pending')
            ->get();

//        $appoints = auth()->user()->appoints()->where('type', '=', 'Clinic')->get();
//        dd($appoints);
        return view('user.appointments.index', compact('appoints'));
    }


    public function destroy(Request $request, Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('user.appointments.index');
    }

    public function care()
    {
        $appoints = Homeable::with([
            'user', 'medicine', 'medicine.doctor'
//            'medicine.doctor' => function($query){
//            $query->select('id' , auth('secretary')->user()->doctor_id);
//            }
        ])->whereHas('user', function ($query) {
            $query->where('id', auth()->id());
        }, '=')->get();

//        dd($appoints);
        return view('user.appointments.home-care', compact('appoints'));
    }

    public function accept_care(Request $request, Homeable $homeable)
    {
        $homeable->update([
            'status' => 'Accepted'
        ]);
        return redirect()->route('user.appointments.care');
    }

}
