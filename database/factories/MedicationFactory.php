<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Medication;
use App\Models\Patient;
use App\Models\Doctor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medication>
 */
class MedicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'dose' => $this->faker->randomFloat(2, 0.5, 100),
            'patient_id' => Patient::factory(),
            'doctor_id' => Doctor::factory(),
        ];
    }
}
