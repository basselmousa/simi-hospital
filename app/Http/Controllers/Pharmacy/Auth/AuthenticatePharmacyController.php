<?php

namespace App\Http\Controllers\Pharmacy\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticatePharmacyController extends Controller
{
    //
    use ThrottlesLogins;
    public function __construct()
    {
        $this->middleware(['guest:pharmacy'])->except('logout');
    }

    public function showLoginForm()
    {
        return view('pharmacy.auth.login');
    }

    public function showRegisterForm()
    {
        return view('pharmacy.auth.register');
    }

    public function submitLoginForm(Request $request)
    {
        //

        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
        if (Auth::guard('pharmacy')->attempt(
            $request->only($this->username(), 'password'), $request->filled('remember')
        )) {
            if ($request->hasSession()) {
                $request->session()->put('auth.pharmacy.password_confirmed_at', time());
            }
            $request->session()->regenerate();

            $this->limiter()->clear($this->throttleKey($request));
            return $request->wantsJson()
                ? new JsonResponse([], 204)
                : redirect()->route('dashboard.pharmacy.profile.profile');
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
            'name' => 'required',
            'username' => 'required|unique:pharmacies,username',
            'email' => 'required|unique:pharmacies,email',
            'password' => 'required|min:8|confirmed',
            'address' => 'required',
            'country' => 'required|not_in:0',
            'city' => 'required|not_in:0',
            'facility_no' => 'required|not_in:0|unique:pharmacies,facility_no',
            'building_number' => 'required',
            'phone_number' => 'required|unique:pharmacies,phone_number|min:10|max:10',
            'logo' => 'required|mimes:jpg,jpeg,png|max:10000'
        ]);

        event(new Registered($user = $this->create($request)));

        Auth::guard('pharmacy')->login($user);


        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect()->route('dashboard.pharmacy.profile.profile');
    }

    private function create(Request $request)
    {
        return Pharmacy::create([
            'name' =>$request['name'],
            'username' =>$request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'country' => $request['country'],
            'city' => $request['city'],
            'address' => $request['address'],
            'facility_no' => $request['facility_no'],
            'building_number' => $request['building_number'],
            'phone_number' => $request['phone_number'],
            'logo' => $this->profile_image_upload($request),
        ]);
    }

    private function profile_image_upload(Request $request)
    {

        if ($request->hasFile('logo')){
            return $request->file('logo')->store('pharmacy/'. $request->name . '/');
        }
        return null;
    }


    public function logout(Request $request)
    {

        Auth::guard('pharmacy')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->route('pharmacy.showLoginForm');
    }

}
