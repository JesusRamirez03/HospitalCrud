<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Hospital;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Specialty;
use App\Models\Appointment;
use App\Models\Room;
use App\Models\Medication;
use App\Models\DiagnosticTest;
use App\Models\Result;
use App\Models\Bill;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Create Hospitals
        Hospital::factory(5)->create();

        // Create Specialties
        Specialty::factory(5)->create();

        // Create Doctors
        Doctor::factory(5)->create();

        // Create Patients
        Patient::factory(5)->create();

        // Create Appointments
        Appointment::factory(5)->create();

        // Create Rooms
        Room::factory(5)->create();

        // Create Medications
        Medication::factory(5)->create();

        // Create Diagnostic Tests
        DiagnosticTest::factory(5)->create();

        // Create Results
        Result::factory(5)->create();

        // Create Bills
        Bill::factory(5)->create();
    }
}
