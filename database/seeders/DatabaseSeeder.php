<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\PraKasus;
use App\Models\PelaporKasus;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        PelaporKasus::factory(5)->create();
        PraKasus::factory(10)->create();
        Activity::create([
            'aktifitas' => 'manambahkan kasus',
            'updated_at' => null
        ]);
        Activity::create([
            'aktifitas' => 'mengedit kasus',
            'updated_at' => null
        ]);
        Activity::create([
            'aktifitas' => 'menghapus kasus',
            'updated_at' => null
        ]);
    }
}
