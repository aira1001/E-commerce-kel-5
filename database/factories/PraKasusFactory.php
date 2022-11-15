<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PraKasusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_pelapor' => mt_rand(1, 5),
            'judul_kasus' => $this->faker->sentence(mt_rand(2, 4)),
            'waktu_kejadian' => $this->faker->dateTime(),
            'tempat_kejadian' => $this->faker->sentence(mt_rand(2, 3)),
            'terlapor' => $this->faker->name(),
            'korban'=>$this->faker->name(),
            'bagaimana_terjadi'=>$this->faker->paragraph(mt_rand(2,3)),
            'uraian_singkat_kejadian'=>$this->faker->paragraph(mt_rand(1,2)),

        ];
    }
}
