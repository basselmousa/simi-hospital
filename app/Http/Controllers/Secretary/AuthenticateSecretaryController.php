<?php

namespace App\Http\Controllers\Secretary;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticateSecretaryController extends Controller
{
    //
    use ThrottlesLogins;
    public function __construct()
    {
        $this->middleware(['guest:secretary'])->except('logout');
    }
    public function showLoginForm()
    {
        return view('secretary.login');
    }


    public function login(Request $request)
    {
        //

        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::guard('secretary')->attempt(
            $request->only($this->username(), 'password'), $request->filled('remember')
        )) {

            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }
            $request->session()->regenerate();

            $this->limiter()->clear($this->throttleKey($request));
            return $request->wantsJson()
                ? new JsonResponse([], 204)
                : redirect()->intended(route('secretary.dashboard.appointments.home-appointment'));
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
    public function logout(Request $request)
    {

        Auth::guard('secretary')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->route('secretary.show');
    }
}
