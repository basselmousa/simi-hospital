<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Doctor extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];

    public function certifications()
    {
        return $this->hasMany(Certificate::class);
    }

    public function dates()
    {
        return $this->hasMany(DoctorDate::class, 'doctor_id');
    }

    public function appointments()
    {
        return $this->belongsToMany(User::class, 'appointments')->withPivot(['status', 'date', 'time'])->withTimestamps();
    }

    public function rate()
    {
        return $this->belongsToMany(User::class, 'rates', 'doctor_id')->withPivot('rate')->withTimestamps();
    }


    public function secretary()
    {
        return $this->hasMany(Secretary::class);
    }

    public function medicine()
    {
        return $this->hasMany(HomeMedicine::class);
    }

}
