<?php

namespace Database\Factories;

use App\Models\User;
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
        // dd(User::doesntHave('pejabat')->first()->id);
        return [
            'nama_lembaga' => 'kepolisian '. $this->faker->sentence(mt_rand(1, 2)),
            'kepala_lembaga' => $this->faker->name(),
            'id_user' => $this->faker->numberBetween(1, 10)
        ];
    }
}
