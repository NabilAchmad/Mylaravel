<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // \App\Models\Mahasiswa::create([
        //     'nama'=>'Abdhu',
        //     'nobp'=>'21311111',
        //     'email'=>'abdhu@gmail.com',
        //     'nohp'=>'081311411',
        //     'jurusan'=>'Teknologi Informasi',
        //     'prodi'=>'TRPL',
        //     'tgllahir'=>'2005-02-18',

        // ]);

        //jika menggunakan faker
        \App\Models\Mahasiswa::factory(30)->create();
    }
}
