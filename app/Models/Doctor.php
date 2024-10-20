<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'specialty_id', 'hospital_id', 'phone', 'email'];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function medications()
    {
        return $this->hasMany(Medication::class);
    }

    public function diagnosticTests()
    {
        return $this->hasMany(DiagnosticTest::class);
    }
}
