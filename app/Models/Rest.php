<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rest extends Model
{
    protected $table = 'rests'; 

    protected $fillable = [
        'attendance_id',
        'break_start_time',
        'break_end_time',
    ];
}
