<?php

namespace Database\Factories;

use App\Models\Cities;
use App\Models\Specialty;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker\Factory::create('pt_BR');
        return [
            'name' => $faker->name(),
            'document'  =>$faker->cpf(),
            'specialtie_id' => Specialty::first()->id,
            'citie_id' => Cities::first()->id
        ];
    }
}
