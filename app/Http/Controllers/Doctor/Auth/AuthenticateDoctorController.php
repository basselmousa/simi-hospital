<?php

namespace App\Http\Controllers\Doctor\Auth;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use PhpParser\Comment\Doc;

class AuthenticateDoctorController extends Controller
{
    use ThrottlesLogins;
    public function __construct()
    {
        $this->middleware(['guest:doctor'])->except('logout');
    }

    public function showLoginForm()
    {
        return view('doctors.auth.login');
    }

    public function showRegisterForm()
    {
        return view('doctors.auth.register');
    }

    public function submitLoginForm(Request $request)
    {
        //

        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
        if (Auth::guard('doctor')->attempt(
            $request->only($this->username(), 'password'), $request->filled('remember')
        )) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }
            $request->session()->regenerate();

            $this->limiter()->clear($this->throttleKey($request));
            return $request->wantsJson()
                ? new JsonResponse([], 204)
                : redirect()->intended(route('dashboard.doctor.profile.profile'));
        }

        $this->limiter()->hit(
            $this->throttleKey($request), $this->decayMinutes() * 60
        );
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);

    }
    public function username()
    {
        return 'email';
    }

    public function submitRegisterForm(Request $request)
    {

        $request->validate([
            'firstname' => 'required',
            'fathername' => 'required',
            'familyname' => 'required',
            'email' => 'required|unique:doctors',
            'password' => 'required|min:8|confirmed',
            'country' => 'required',
            'city' => 'required|not_in:0',
            'gender' => 'required|not_in:0',
            'building_number' => 'required',
            'phone_number' => 'required|unique:doctors|min:10|max:10',
            'image' => 'nullable|mimes:jpg,jpeg,png|max:10000'
        ]);


        event(new Registered($user = $this->create($request)));

        Auth::guard('doctor')->login($user);


        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect()->route('dashboard.doctor.profile.profile');
    }

    private function create(Request $request)
    {
        return Doctor::create([
            'full_name' =>$request['firstname'] . " ". $request['fathername'] . " ". $request['familyname'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'country' => $request['country'],
            'city' => $request['city'],
            'gender' => $request['gender'],
            'building_number' => $request['building_number'],
            'phone_number' => $request['phone_number'],
            'image' => $this->profile_image_upload($request),
        ]);
    }

    private function profile_image_upload(Request $request)
    {
        $fullname = $request['firstname'] . " ". $request['fathername'] . " ". $request['familyname'];
        if ($request->hasFile('image')){
           return $request->file('image')->store('doctors/'. $fullname . '/');
        }
        return null;
    }


    public function logout(Request $request)
    {

        Auth::guard('doctor')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->route('doctors.showLoginForm');
    }

}
