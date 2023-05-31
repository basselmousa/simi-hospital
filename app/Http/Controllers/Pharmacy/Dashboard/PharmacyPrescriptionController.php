<?php

namespace App\Http\Controllers\Pharmacy\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PrescriptionRequest;
use Illuminate\Http\Request;

class PharmacyPrescriptionController extends Controller
{
    //

    public function pending()
    {
        //
        $drugsRequests = PrescriptionRequest::whereNull("pharmacy_id")->get();

        return view("pharmacy.rocheta.index",compact("drugsRequests"));
    }
    public function approved()
    {
        //
        $drugsRequests = PrescriptionRequest::where("pharmacy_id",auth("pharmacy")->id())->get();


        return view("pharmacy.rocheta.sold",compact("drugsRequests"));
    }

    public function action(Request $request,PrescriptionRequest $prescriptionRequest)
    {
        $prescriptionRequest->update([
            "pharmacy_id" => auth("pharmacy")->id()
        ]);
        return back()->with("success","Rochette Sold Successfully");
    }

//    public function approved()
//    {
//        //
//    }
}
