<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $rules = [
        'appointment_date'=>'required',
        'appointment_time'=>'required',
    ];

    protected $fillable = [
        'appointment_date',
        'appointment_time',
    ];

    
    public function pets()
    {
        return $this->belongsTo(related:Pet::class);
    }
    use HasFactory;
}
