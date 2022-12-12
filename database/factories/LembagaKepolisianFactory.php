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
            'nama_lembaga' => 'kepolisian '. $this->faker->sentence(mt_rand(1, 2)),
            'kepala_lembaga' => $this->faker->name(),
            'id_user' => mt_rand(1, 10)
        ];
    }
}
