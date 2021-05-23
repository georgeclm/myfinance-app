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
        DB::table('jenisuangs')->insert([
            'nama' => 'Bayar Utang',
        ]);
        DB::table('jenisuangs')->insert([
            'nama' => 'Teman Bayar Utang',
        ]);
        DB::table('categories')->insert([
            'nama' => 'Sedekah atau Donasi',
        ]);
        DB::table('categories')->insert([
            'nama' => 'Cicilan',
        ]);
        DB::table('categories')->insert([
            'nama' => 'Makanan',
        ]);
        DB::table('categories')->insert([
            'nama' => 'Pengeluaran Pribadi',
        ]);
        DB::table('categories')->insert([
            'nama' => 'Kendaraan',
        ]);
        DB::table('categories')->insert([
            'nama' => 'Nongky',
        ]);
    }
}
