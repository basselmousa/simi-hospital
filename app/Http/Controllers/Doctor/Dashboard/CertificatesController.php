<?php

namespace App\Http\Controllers\Doctor\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class CertificatesController extends Controller
{
    //
    public function index()
    {
        $certificates = auth('doctor')->user()->certifications;
        return view('doctors.certificates.index',compact('certificates'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'take_date' => 'required|before_or_equal:today',
            'title' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png'
        ]);

        auth('doctor')->user()->certifications()->create([
            'title' => $request->title,
            'take_date' => $request->take_date,
            'image' => $this->certificate_image_upload($request)
        ]);
        return redirect()->route('dashboard.doctor.certificates.index');

    }
    private function certificate_image_upload(Request $request)
    {

        if ($request->hasFile('image')){
            return $request->file('image')->store('doctors/'. auth('doctor')->user()->full_name . '/');
        }
        return null;
    }

    public function destroy(Request $request, Certificate $certificate)
    {
        //
        if ($certificate->doctor_id == auth('doctor')->user()->id){

            Storage::delete($certificate->image);
            $certificate->delete();
            return redirect()->route('dashboard.doctor.certificates.index');
        }
        abort(401);

    }

}
