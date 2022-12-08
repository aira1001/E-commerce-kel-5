<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_pra_kasus' => mt_rand(1,10),
            'nama' => $this->faker->name(),
            'umur' => mt_rand(20, 50),
            'asal' => 'kota ' . $this->faker->word()
        ];
    }
}
