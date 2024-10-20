<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Hospital;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'patient_id' => Patient::factory(),
            'doctor_id' => Doctor::factory(),
            'hospital_id' => Hospital::factory(),
        ];
    }
}
