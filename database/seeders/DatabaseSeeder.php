<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Kasus;
use App\Models\lembaga_kepolisian;
use App\Models\LembagaKepolisian;
use App\Models\Pegawai;
use App\Models\PraKasus;
use App\Models\PelaporanKasus;
use App\Models\PerintahDisposisi;
use App\Models\Role;
use App\Models\Saksi;
use App\Models\StatusKasus;
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
        // User::factory(20)->create();

        //pegawai seeder
        Pegawai::factory(10)->create();

        //Lambaga kepolisian
        LembagaKepolisian::factory(10)->create();

        //pra kasus seeder
        PraKasus::factory(10)->create();

        //activity seeder
        Activity::create([
            'aktifitas' => 'menambah pra kasus',
            'updated_at' => null
        ]);
        Activity::create([
            'aktifitas' => 'mengedit pra kasus',
            'updated_at' => null
        ]);
        Activity::create([
            'aktifitas' => 'menghapus pra kasus',
            'updated_at' => null
        ]);
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
        Activity::create([
            'aktifitas' => 'melakukan update pegawai',
            'updated_at' => null
        ]);
        Activity::create([
            'aktifitas' => 'melakukan update perintah diposisi',
            'updated_at' => null
        ]);
        Activity::create([
            'aktifitas' => 'menambahkan pelaporan kasus',
            'updated_at' => null
        ]);
        Activity::create([
            'aktifitas' => 'menghapus pelaporan kasus',
            'updated_at' => null
        ]);
        Activity::create([
            'aktifitas' => 'mengedit pelaporan kasus',
            'updated_at' => null
        ]);

        //perintah disposisi seeder
        PerintahDisposisi::create([
            'perintah' => 'diperlukan penyelidikan'
        ]);
        PerintahDisposisi::create([
            'perintah' => 'review ulang kasus'
        ]);
        PerintahDisposisi::create([
            'perintah' => 'pembentukkan tim'
        ]);

        //status kasus seeder
        StatusKasus::create([
            'nama' => 'pembunahan',
            'level_urgensi' => 'tingkat 1'
        ]);
        StatusKasus::create([
            'nama' => 'pencurian',
            'level_urgensi' => 'tingkat 2'
        ]);
        StatusKasus::create([
            'nama' => 'pembegalan',
            'level_urgensi' => 'tingkat 3'
        ]);

        //kasus seeder
        Kasus::factory(10)->create();

        //pelaporan kasus seeder
        PelaporanKasus::factory(10)->create();

        //saksi seeder
        Saksi::factory(20)->create();
    }
}
