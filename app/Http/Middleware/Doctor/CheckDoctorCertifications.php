<?php

namespace App\Http\Middleware\Doctor;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CheckDoctorCertifications
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function handle(Request $request, Closure $next)
    {
//        ddd(count(auth('doctor')->user()->certifications));
       if (auth('doctor')->user() != null){
           if (count(auth('doctor')->user()->certifications) == 0){

               return redirect()->route('dashboard.doctor.certificates.index');
           }
           return $next($request);
       }
       return  redirect()->route('doctors.showLoginForm');
    }
}
