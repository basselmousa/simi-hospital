<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserExamination extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function user()
    {
        return $this->belongsTo(User::class,"user_id");
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class,"doctor_id");
    }

    public function examination()
    {
        return $this->belongsTo(MedicalExamination::class,"medical_examination_id");
    }
}
