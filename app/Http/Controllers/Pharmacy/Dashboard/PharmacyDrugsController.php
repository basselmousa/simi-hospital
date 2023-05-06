<?php

namespace App\Http\Controllers\Pharmacy\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Drug;
use Illuminate\Http\Request;

class PharmacyDrugsController extends Controller
{
    //

    public function index()
    {
        //
        $drugs = Drug::all();
        return view("pharmacy.drugs.index",compact("drugs"));
    }
}
