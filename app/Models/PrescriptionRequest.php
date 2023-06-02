<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionRequest extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function drug()
    {
        return $this->belongsTo(Drug::class,"drug_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class,"user_id");
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class,"doctor_id");
    }

    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class,"pharmacy_id");
    }
}
