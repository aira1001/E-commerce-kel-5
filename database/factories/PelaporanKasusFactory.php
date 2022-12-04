<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PelaporanKasusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_kasus' => mt_rand(1,10),
            'perihal' => $this->faker->sentence(8),
            'deskripsi' => $this->faker->paragraph(2)
        ];
    }
}
