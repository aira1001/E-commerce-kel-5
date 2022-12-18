<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // dd(User::count());
        return [
            'nama' => $this->faker->name(),
            'nrp' => $this->faker->randomNumber(8, true),
            // 'id_user' => $this->faker->unique()->numberBetween(1, 15)
            // 'id_user' => User::doesntHave('pegawai')->first()->id,
            'id_user' => User::factory()
        ];
    }

}
