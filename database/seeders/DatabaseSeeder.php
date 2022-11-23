<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\PraKasus;
use App\Models\PelaporKasus;
use App\Models\Role;
use App\Models\User;
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
        //roles seeder
        Role::create([
            'role' => 'Masyarakat'
        ]);
        Role::create([
            'role' => 'Staff Front Office'
        ]);
        Role::create([
            'role' => 'Pejabat'
        ]);
        Role::create([
            'role' => 'Tim kasus'
        ]);
        Role::create([
            'role' => 'Pembuat Tim'
        ]);

        //user seeder
        User::factory(10)->create();

        //pelapor kasus seeder
        PelaporKasus::factory(5)->create();

        //pra kasus seeder
        PraKasus::factory(10)->create();

        //activity seeder
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
