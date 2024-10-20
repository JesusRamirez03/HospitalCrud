<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Bill;
use App\Models\Patient;
use App\Models\Hospital;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bill>
 */
class BillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'amount' => $this->faker->randomFloat(2, 50, 5000),
            'date' => $this->faker->date(),
            'patient_id' => Patient::factory(),
            'hospital_id' => Hospital::factory(),
        ];
    }
}
