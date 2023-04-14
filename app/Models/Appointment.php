<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Appointment extends Pivot
{
    //

    protected $table = 'appointments';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

}
