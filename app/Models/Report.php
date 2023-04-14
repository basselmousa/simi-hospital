<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Report extends Pivot
{
    //

    public $timestamps = true;

    protected $table = 'reports';

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
