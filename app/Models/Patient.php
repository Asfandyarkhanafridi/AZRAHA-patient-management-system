<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function contactInformation()
    {
        return $this->hasOne(ContactInformation::class);
    }

    public function medicalHistories()
    {
        return $this->hasMany(MedicalHistory::class);
    }

    public function currentMedications()
    {
        return $this->hasMany(CurrentMedication::class);
    }

}
