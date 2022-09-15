<?php

use Illuminate\Database\Seeder;

class KategoriSuratTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategorisurat')->insert(array(
            //membuat seeder untuk mengisi data tabel kategorisurat
            ['kategori' => 'Undangan'],
            ['kategori' => 'Pengumuman'],
            ['kategori' => 'Nota Dinas'],
            ['kategori' => 'Pemberitahuan']
        ));
    }
}
