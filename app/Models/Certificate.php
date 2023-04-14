<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dateFormat = 'Y-m-d';
    protected $casts = [
        'take_date' => 'date',
    ];
}
