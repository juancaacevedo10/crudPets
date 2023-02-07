<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointment';

    protected $rules = [
        'appointment_pet'=>'required',
        'appointment_date'=>'required',
        'appointment_time'=>'required',
    ];

    protected $fillable = [
        'appointment_date',
        'appointment_time',
        'appointment_pet',

    ];

    
    public function pets()
    {
        return $this->belongsTo(related:Pet::class);
    }

    
    use HasFactory;
}
