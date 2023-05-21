<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\InsuranceCompany;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'fathername' => ['required', 'string', 'max:255'],
            'familyname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'country' => 'required',
            'city' => 'required|not_in:0',
            'gender' => 'required|not_in:0',
            'ssn' => 'required|unique:users,ssn',
            'phone_number' => 'required|unique:doctors|min:10|max:10',
            'image' => 'nullable|mimes:jpg,jpeg,png|max:10000',
            'company' => 'required_if:company,!=,0',

        ]);
    }
    public function showRegistrationForm()
    {
        $companies = InsuranceCompany::all();
        return view('auth.register',compact("companies"));
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request)));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create( $request)
    {
        return User::create([
            'full_name' => $request->firstname . " " . $request->fathername . " " . $request->familyname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'country' => $request->country,
            'city' => $request->city,
            'gender' => $request->gender,
            'ssn' => $request->ssn,
            'phone_number' => $request->phone_number,
            'image' => $this->upload_image($request),
        ]);
    }
    private function upload_image(Request  $request)
    {
        $full_name = $request->firstname . " " . $request->fathername . " " . $request->familyname;
        if ($request->hasFile('image')){
            return $request->file('image')->store('patients/'. $full_name . '/');
        }
        return null;
    }
}
