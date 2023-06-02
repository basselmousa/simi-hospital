<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PrescriptionRequest;
use Illuminate\Http\Request;

class DrugsController extends Controller
{
    //

    public function index()
    {

        $drugs = PrescriptionRequest::with(["drug","doctor","pharmacy"])
            ->where("user_id",auth("web")->id())->get();
        return view("user.drugs.index",compact("drugs"));
    }
}
