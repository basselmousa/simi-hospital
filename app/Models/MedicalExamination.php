<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalExamination extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function lab()
    {
        return $this->belongsTo(MedicalLab::class,"medical_lab_id");
    }
}
