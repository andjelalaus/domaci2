<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'naziv'=>$this->faker->name(),
            'izdavacka_kuca'=>$this->faker->name(),
            'opis'=>$this->faker->sentence(),
            'datum'=>$this->faker->date(),
            'user_id'=>User::factory(),
        ];
    }
}
