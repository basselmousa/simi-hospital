<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Homeable extends Pivot
{
    //
    protected $table = 'homeable';
    protected $guarded = [];

    public function medicine()
    {
        return $this->belongsTo(HomeMedicine::class, 'home_medicine_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
