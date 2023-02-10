<?php

namespace Database\Factories;

use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\pesma>
 */
class PesmaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'ime'=>$this->faker->word(),
            'album_id'=>Album::factory(),
            'trajanje'=>$this->faker->numberBetween(100,480),
            
        ];
    }
}
