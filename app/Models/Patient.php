<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'date_of_birth', 'hospital_id', 'social_security_number'];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function room()
    {
        return $this->hasOne(Room::class);
    }

    public function medications()
    {
        return $this->hasMany(Medication::class);
    }

    public function diagnosticTests()
    {
        return $this->hasMany(DiagnosticTest::class);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
}
