<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Patient;
use App\Models\Hospital;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'date_of_birth' => $this->faker->date(),
            'hospital_id' => Hospital::factory(),
            'social_security_number' => $this->faker->unique()->numerify('###-##-####'),
        ];
    }
}
