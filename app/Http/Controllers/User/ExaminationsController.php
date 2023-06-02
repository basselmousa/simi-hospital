<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserExamination;
use Illuminate\Http\Request;

class ExaminationsController extends Controller
{
    //

    public function index()
    {
        $examinations = UserExamination::with(["user","doctor","examination","examination.lab"])
            ->where("user_id",auth("web")->id())->get();

        return view("user.examination.index",compact("examinations"));
    }
}
