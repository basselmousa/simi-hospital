<?php

namespace App\Http\Controllers\Doctor\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    //
    public function index()
    {

        $reports = Report::with(['user','doctor'])->where('doctor_id', auth()->id())->get();


        return view('doctors.reports.index', compact('reports'));

    }
}
