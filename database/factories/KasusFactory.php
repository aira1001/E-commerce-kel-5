<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KasusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_pra_kasus' => mt_rand(1, 10)
        ];
    }
}
