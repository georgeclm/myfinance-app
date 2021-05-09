<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        DB::table('jenis')->insert([
            'nama' => 'Akun Kas',
        ]);
        DB::table('jenis')->insert([
            'nama' => 'Akun Bank',
        ]);
        DB::table('jenis')->insert([
            'nama' => 'Akun Digital',
        ]);
        DB::table('jenisuangs')->insert([
            'nama' => 'Uang Masuk',
        ]);
        DB::table('jenisuangs')->insert([
            'nama' => 'Uang Keluar',
        ]);
        DB::table('jenisuangs')->insert([
            'nama' => 'Transfer',
        ]);
    }
}
