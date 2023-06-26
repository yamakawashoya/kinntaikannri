<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances'; 

    protected $fillable = [
        'user_id',
        'work_date',
        'start_time',
        'end_time',
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}

}
