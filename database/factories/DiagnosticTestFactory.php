<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\DiagnosticTest;
use App\Models\Patient;
use App\Models\Doctor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DiagnosticTest>
 */
class DiagnosticTestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => $this->faker->word,
            'date' => $this->faker->date(),
            'patient_id' => Patient::factory(),
            'doctor_id' => Doctor::factory(),
        ];
    }
}
