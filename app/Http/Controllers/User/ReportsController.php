<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    //

    public function index()
    {
        $reports = Report::with(['user', 'doctor'])->where('user_id', auth()->id())->get();
        return view('user.reports.index', compact('reports'));
    }
}
