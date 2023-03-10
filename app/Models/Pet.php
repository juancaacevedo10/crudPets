<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $rules = [
        'id_pet'=>'required',
        'pet_name'=>'required',
        'pet_type'=>'required',
    ];

    protected $primaryKey = 'id_pet';

    protected $fillable = [
        'id_pet',
        'pet_name',
        'pet_type',
    ];

    /**
     * Get the user that owns the Pet
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(related:User::class);
    }

    public function appointment()
    {
        return $this->hasMany(related:Appointment::class);
    }


    use HasFactory;
}
