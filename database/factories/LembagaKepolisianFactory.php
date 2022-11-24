<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LembagaKepolisianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_lembaga' => $this->faker->word(),
            'kepala_lembaga' => $this->faker->name()
        ];
    }
}
