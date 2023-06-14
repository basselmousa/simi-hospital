<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//dd(auth('doctor')->user());
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get("/ss" , function(){

    dd(\Illuminate\Support\Facades\Hash::make("U@s0er123456789"));
});

Auth::routes();

// ,'middleware'=> ['guest:doctor',]
Route::group(['prefix' => 'doctor', 'as' => 'doctors.'], function () {
    Route::get('login', [\App\Http\Controllers\Doctor\Auth\AuthenticateDoctorController::class, 'showLoginForm'])->name('showLoginForm');
    Route::post('login', [\App\Http\Controllers\Doctor\Auth\AuthenticateDoctorController::class, 'submitLoginForm'])->name('submitLoginForm');
    Route::get('register', [\App\Http\Controllers\Doctor\Auth\AuthenticateDoctorController::class, 'showRegisterForm'])->name('showRegisterForm');
    Route::post('register', [\App\Http\Controllers\Doctor\Auth\AuthenticateDoctorController::class, 'submitRegisterForm'])->name('submitRegisterForm');
    Route::post('logout', [\App\Http\Controllers\Doctor\Auth\AuthenticateDoctorController::class, 'logout'])->name('logout');
});

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.doctor.', 'middleware' => ['auth:doctor', \App\Http\Middleware\Doctor\CheckDoctorCertifications::class]], function () {
    Route::get('/', [\App\Http\Controllers\Doctor\Dashboard\HomeController::class, 'index'])->name('home');
    Route::group(['prefix' => 'reports', 'as' => 'reports.'], function () {
        Route::get('/', [\App\Http\Controllers\Doctor\Dashboard\ReportsController::class, 'index'])->name('index');

    });
    Route::group(['prefix' => 'labs', 'as' => 'labs.'], function () {
        Route::get('/', [\App\Http\Controllers\Doctor\Dashboard\DoctorLabsController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Doctor\Dashboard\DoctorLabsController::class, 'create'])->name('create');
        Route::delete('/{lab}', [\App\Http\Controllers\Doctor\Dashboard\DoctorLabsController::class, 'delete'])->name('delete');

    });
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/profile', [\App\Http\Controllers\Doctor\Auth\ProfileController::class, 'index'])->name('profile');
        Route::put('/profile', [\App\Http\Controllers\Doctor\Auth\ProfileController::class, 'update'])->name('update');
    });
    Route::group(['as' => 'certificates.'], function () {
        Route::withoutMiddleware([\App\Http\Middleware\Doctor\CheckDoctorCertifications::class])
//        ['prefix' => 'certificates','as' => 'dashboard.doctor.']
            ->prefix('certificates')->group(function () {
                Route::get('/', [\App\Http\Controllers\Doctor\Dashboard\CertificatesController::class, 'index'])->name('index');
                Route::post('/', [\App\Http\Controllers\Doctor\Dashboard\CertificatesController::class, 'create'])->name('add');
                Route::delete('/{certificate}', [\App\Http\Controllers\Doctor\Dashboard\CertificatesController::class, 'destroy'])->name('delete');
            });
    });
    Route::group(['prefix' => 'dates', 'as' => 'dates.'], function () {
        Route::get('/', [\App\Http\Controllers\Doctor\Dashboard\DatesController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Doctor\Dashboard\DatesController::class, 'create'])->name('add');
        Route::delete('/{date}', [\App\Http\Controllers\Doctor\Dashboard\DatesController::class, 'destroy'])->name('delete');
    });
    Route::group(['prefix' => 'homeable', 'as' => 'homeable.'], function () {
        Route::get('/', [\App\Http\Controllers\Doctor\Dashboard\HomeMedicinesController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Doctor\Dashboard\HomeMedicinesController::class, 'create'])->name('add');
        Route::delete('/{home}', [\App\Http\Controllers\Doctor\Dashboard\HomeMedicinesController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => 'secretary', 'as' => 'secretary.'], function () {
        Route::get('/', [\App\Http\Controllers\Doctor\Dashboard\SecretaryController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Doctor\Dashboard\SecretaryController::class, 'create'])->name('create');
        Route::put('/{secretary}', [\App\Http\Controllers\Doctor\Dashboard\SecretaryController::class, 'update'])->name('update');
        Route::delete('/{secretary}', [\App\Http\Controllers\Doctor\Dashboard\SecretaryController::class, 'destroy'])->name('delete');
    });
    Route::group(['prefix' => 'appointments', 'as' => 'appointments.'], function () {
        Route::get('/clinic', [\App\Http\Controllers\Doctor\Dashboard\AppointmentsController::class, 'clinic'])->name('doctor-clinic');
        Route::get('/home', [\App\Http\Controllers\Doctor\Dashboard\AppointmentsController::class, 'home'])->name('doctor-home');
        Route::get('/care', [\App\Http\Controllers\Doctor\Dashboard\AppointmentsController::class, 'care'])->name('doctor-care');
        Route::put('/care/{homeable}/', [\App\Http\Controllers\Doctor\Dashboard\AppointmentsController::class, 'finish_care'])->name('doctor-care-done');
        Route::get('/pending', [\App\Http\Controllers\Doctor\Dashboard\AppointmentsController::class, 'pending'])->name('pending');
        Route::put('/pending/{appointment}', [\App\Http\Controllers\Doctor\Dashboard\AppointmentsController::class, 'change_appointment_status'])->name('change-status');
        Route::put('/report/{appointment}', [\App\Http\Controllers\Doctor\Dashboard\AppointmentsController::class, 'write_report'])->name('write-report');
        Route::put('/addDrug/{appointment}', [\App\Http\Controllers\Doctor\Dashboard\AppointmentsController::class, 'add_drug'])->name('add-drug');
        Route::put('/addExamination/{appointment}', [\App\Http\Controllers\Doctor\Dashboard\AppointmentsController::class, 'add_examination'])->name('add-examination');
        Route::delete('/{appointment}', [\App\Http\Controllers\Doctor\Dashboard\AppointmentsController::class, 'destroy'])->name('doctor-delete');
//        Route::get('/{doctor}', [\App\Http\Controllers\User\DoctorController::class, 'show_appoint'])->name('showAppoint');
//        Route::post('/{doctor}', [\App\Http\Controllers\User\DoctorController::class, 'appoint'])->name('appoint');
    });


});


Route::group(['prefix' => 'user', 'middleware' => ['auth:web'], 'as' => 'user.'], function () {

    Route::get('dashboard', [\App\Http\Controllers\User\DashboardController::class, 'index'])->name('home');
    Route::post('rate/{doctor}', [\App\Http\Controllers\User\DashboardController::class, 'rate'])->name('rate');

    Route::group(['prefix' => 'doctors', 'as' => 'doctors.'], function () {
        Route::get('/', [\App\Http\Controllers\User\DoctorController::class, 'index'])->name('index');
        Route::get('/care', [\App\Http\Controllers\User\DoctorController::class, 'care'])->name('care');
        Route::get('/{doctor}', [\App\Http\Controllers\User\DoctorController::class, 'show_appoint'])->name('showAppoint');
        Route::get('/cares/{medicine}', [\App\Http\Controllers\User\DoctorController::class, 'care_appoint'])->name('show-appoint');
        Route::post('/cares/{medicine}', [\App\Http\Controllers\User\DoctorController::class, 'appoint_care'])->name('appoint-care');
        Route::post('/{doctor}', [\App\Http\Controllers\User\DoctorController::class, 'appoint'])->name('appoint');
    });

    Route::group(['prefix' => 'appointments', 'as' => 'appointments.'], function () {
        Route::get('/pending', [\App\Http\Controllers\User\AppointmentsController::class, 'pending'])->name('pending');
        Route::get('/clinic', [\App\Http\Controllers\User\AppointmentsController::class, 'clinic'])->name('clinic');
        Route::get('/home', [\App\Http\Controllers\User\AppointmentsController::class, 'home'])->name('home');
        Route::get('/care', [\App\Http\Controllers\User\AppointmentsController::class, 'care'])->name('care');
        Route::put('/care/{homeable}', [\App\Http\Controllers\User\AppointmentsController::class, 'accept_care'])->name('care.accept');
        Route::delete('/{appointment}', [\App\Http\Controllers\User\AppointmentsController::class, 'destroy'])->name('delete');
//        Route::get('/{doctor}', [\App\Http\Controllers\User\DoctorController::class, 'show_appoint'])->name('showAppoint');
//        Route::post('/{doctor}', [\App\Http\Controllers\User\DoctorController::class, 'appoint'])->name('appoint');
    });

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/', [\App\Http\Controllers\User\ProfileController::class, 'index'])->name('index');
        Route::put('/', [\App\Http\Controllers\User\ProfileController::class, 'update'])->name('update');

    });
    Route::group(['prefix' => 'reports', 'as' => 'reports.'], function () {
        Route::get('/', [\App\Http\Controllers\User\ReportsController::class, 'index'])->name('index');
    });
    Route::group(['prefix' => 'drugs', 'as' => 'drug.'], function () {
        Route::get('/', [\App\Http\Controllers\User\DrugsController::class, 'index'])->name('index');
    });
    Route::group(['prefix' => 'examinations', 'as' => 'examination.'], function () {
        Route::get('/', [\App\Http\Controllers\User\ExaminationsController::class, 'index'])->name('index');
    });

});

Route::group(['prefix' => 'secretary', 'as' => 'secretary.'], function () {
    Route::get('/login', [\App\Http\Controllers\Secretary\AuthenticateSecretaryController::class, 'showLoginForm'])->name('show');
    Route::post('/login', [\App\Http\Controllers\Secretary\AuthenticateSecretaryController::class, 'login'])->name('login');
    Route::post('/logout', [\App\Http\Controllers\Secretary\AuthenticateSecretaryController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['auth:secretary']], function () {

        Route::group(['prefix' => 'appointments', 'as' => 'appointments.'], function () {
            Route::get('/home-appointment', [\App\Http\Controllers\Secretary\DoctorMedicalAppointmentsController::class, 'index'])->name('home-appointment');
            Route::get('/clinic', [\App\Http\Controllers\Secretary\DoctorMedicalAppointmentsController::class, 'clinic'])->name('clinic');
            Route::get('/home-care', [\App\Http\Controllers\Secretary\DoctorMedicalAppointmentsController::class, 'care'])->name('home-care');
            Route::put('/home-care/{homeable}', [\App\Http\Controllers\Secretary\DoctorMedicalAppointmentsController::class, 'care_accept'])->name('home-care-accept');
            Route::put('/{appointment}', [\App\Http\Controllers\Secretary\DoctorMedicalAppointmentsController::class, 'change_status'])->name('change-status');
        });
        Route::group(['prefix' => 're-appointments', 'as' => 're-appointments.'], function () {
            Route::get('/home-appointment', [\App\Http\Controllers\Secretary\DoctorMedicalAppointmentsController::class, 'home_reappoint'])->name('home-appointment');
            Route::get('/clinic', [\App\Http\Controllers\Secretary\DoctorMedicalAppointmentsController::class, 'clinic_reappoint'])->name('clinic');
            Route::get('/appoint/{appoint}/{type}', [\App\Http\Controllers\Secretary\DoctorMedicalAppointmentsController::class, 'reappoint'])->name('reappoint');
            Route::post('/appoint/{appoint}/{doctor}/{user}/{type}', [\App\Http\Controllers\Secretary\DoctorMedicalAppointmentsController::class, 'reappoint_change_status'])->name('reappoint-post');

            Route::put('/{appointment}', [\App\Http\Controllers\Secretary\DoctorMedicalAppointmentsController::class, 'change_status'])->name('change-status');
        });
    });


});

Route::group(['prefix' => 'pharmacy', 'as' => 'pharmacy.'], function () {
    Route::get('login', [\App\Http\Controllers\Pharmacy\Auth\AuthenticatePharmacyController::class, 'showLoginForm'])->name('showLoginForm');
    Route::post('login', [\App\Http\Controllers\Pharmacy\Auth\AuthenticatePharmacyController::class, 'submitLoginForm'])->name('submitLoginForm');
    Route::get('register', [\App\Http\Controllers\Pharmacy\Auth\AuthenticatePharmacyController::class, 'showRegisterForm'])->name('showRegisterForm');
    Route::post('register', [\App\Http\Controllers\Pharmacy\Auth\AuthenticatePharmacyController::class, 'submitRegisterForm'])->name('submitRegisterForm');
    Route::post('logout', [\App\Http\Controllers\Pharmacy\Auth\AuthenticatePharmacyController::class, 'logout'])->name('logout');

});
Route::group(["prefix" => "dashboard/pharmacy", "as" => "dashboard.pharmacy."], function () {

    Route::group(["prefix" => "profile", "as" => "profile."], function () {
        Route::get("profile", [\App\Http\Controllers\Pharmacy\Dashboard\PharmacyProfileController::class, "index"])->name("profile");
        Route::put("profile", [\App\Http\Controllers\Pharmacy\Dashboard\PharmacyProfileController::class, "updateProfile"])->name("updateProfile");
    });
    Route::group(["prefix" => "prescription", "as" => "prescription."], function () {
        Route::get("pending", [\App\Http\Controllers\Pharmacy\Dashboard\PharmacyPrescriptionController::class, "pending"])->name("pending");
        Route::post("approve/{prescriptionRequest}", [\App\Http\Controllers\Pharmacy\Dashboard\PharmacyPrescriptionController::class, "action"])->name("action");
        Route::get("approved", [\App\Http\Controllers\Pharmacy\Dashboard\PharmacyPrescriptionController::class, "approved"])->name("approved");
    });
    Route::group(["prefix" => "drugs", "as" => "drugs."], function () {
        Route::get("", [\App\Http\Controllers\Pharmacy\Dashboard\PharmacyDrugsController::class, "index"])->name("index");
    });
});
Route::group(['prefix' => 'labs', 'as' => 'labs.'], function () {
    Route::get('login', [\App\Http\Controllers\Labs\Auth\AuithenticateLabsController::class, 'showLoginForm'])->name('showLoginForm');
    Route::post('login', [\App\Http\Controllers\Labs\Auth\AuithenticateLabsController::class, 'submitLoginForm'])->name('submitLoginForm');
    Route::get('register', [\App\Http\Controllers\Labs\Auth\AuithenticateLabsController::class, 'showRegisterForm'])->name('showRegisterForm');
    Route::post('register', [\App\Http\Controllers\Labs\Auth\AuithenticateLabsController::class, 'submitRegisterForm'])->name('submitRegisterForm');
    Route::post('logout', [\App\Http\Controllers\Labs\Auth\AuithenticateLabsController::class, 'logout'])->name('logout');

});

Route::group(["prefix" => "dashboard/labs", "as" => "dashboard.labs."], function () {

    Route::group(["prefix" => "profile", "as" => "profile."], function () {
        Route::get("profile", [\App\Http\Controllers\Labs\Dashboard\LabsProfileController::class, "index"])->name("profile");
        Route::put("profile", [\App\Http\Controllers\Labs\Dashboard\LabsProfileController::class, "updateProfile"])->name("updateProfile");
    });

    Route::group(["prefix" => "examinationsRequests", "as" => "examination."], function () {
        Route::get("pending", [\App\Http\Controllers\Lab\Dashboard\LabExaminationsController::class, "pending"])->name("pending");
        Route::get("approved", [\App\Http\Controllers\Lab\Dashboard\LabExaminationsController::class, "approved"])->name("approved");
    });

    Route::group(["prefix" => "examinations", "as" => "examination."], function () {
        Route::get("/", [\App\Http\Controllers\Lab\Dashboard\LabExaminationsController::class, "index"])->name("index");
        Route::post("/", [\App\Http\Controllers\Lab\Dashboard\LabExaminationsController::class, "addExamination"])->name("add");
        Route::post("/approve/{examination}", [\App\Http\Controllers\Lab\Dashboard\LabExaminationsController::class, "setValue"])->name("approve");
        Route::delete("/{examination}", [\App\Http\Controllers\Lab\Dashboard\LabExaminationsController::class, "deleteExamination"])->name("delete");
    });

});

Route::group(['prefix' => 'admins', 'as' => 'admins.'], function () {
    Route::get('login', [\App\Http\Controllers\Admin\Auth\AuthenticateAdminController::class, 'showLoginForm'])->name('showLoginForm');
    Route::post('login', [\App\Http\Controllers\Admin\Auth\AuthenticateAdminController::class, 'submitLoginForm'])->name('submitLoginForm');
    Route::post('logout', [\App\Http\Controllers\Admin\Auth\AuthenticateAdminController::class, 'logout'])->name('logout');
});
Route::group(["prefix" => "dashboard", "as" => "dashboard.admin."], function () {
    Route::group(["prefix" => "admins", "as" => "admins."], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Dashboard\AdminsController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Admin\Dashboard\AdminsController::class, 'create'])->name('add');
        Route::put('/{admin}', [\App\Http\Controllers\Admin\Dashboard\AdminsController::class, 'update'])->name('update');
        Route::delete('/{admin}', [\App\Http\Controllers\Admin\Dashboard\AdminsController::class, 'delete'])->name('delete');

    });
    Route::group(["prefix" => "drugs", "as" => "drugs."], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Dashboard\DrugsController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Admin\Dashboard\DrugsController::class, 'create'])->name('add');
        Route::put('/{drug}', [\App\Http\Controllers\Admin\Dashboard\DrugsController::class, 'update'])->name('update');
        Route::delete('/{drug}', [\App\Http\Controllers\Admin\Dashboard\DrugsController::class, 'delete'])->name('delete');

    });
    Route::group(["prefix" => "companies", "as" => "company."], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Dashboard\InsuranceCompaniesController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Admin\Dashboard\InsuranceCompaniesController::class, 'create'])->name('add');
        Route::put('/{company}', [\App\Http\Controllers\Admin\Dashboard\InsuranceCompaniesController::class, 'update'])->name('update');
        Route::delete('/{company}', [\App\Http\Controllers\Admin\Dashboard\InsuranceCompaniesController::class, 'delete'])->name('delete');

    });
    Route::group(["prefix" => "doctors", "as" => "doctors."], function () {
        Route::get('/pending', [\App\Http\Controllers\Admin\Dashboard\DoctorsController::class, 'pending'])->name('pending');
        Route::get('/active', [\App\Http\Controllers\Admin\Dashboard\DoctorsController::class, 'active'])->name('active');
        Route::post('/pending/{doctor}', [\App\Http\Controllers\Admin\Dashboard\DoctorsController::class, 'activate'])->name('activate');
        Route::post('/active/{doctor}', [\App\Http\Controllers\Admin\Dashboard\DoctorsController::class, 'deActivate'])->name('deactivate');

    });
});
