<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Posisi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posisiData = [
            [
                'nama' => 'Master Dealer',
            ],
            [
                'nama' => 'Dealer',
            ],
            [
                'nama' => 'Kios Pertanian',
            ],
            [
                'nama' => 'Eceran',
            ],
            [
                'nama' => 'Petani Kunci',
            ],
            [
                'nama' => 'Ketua Kelompok Tani',
            ],
            [
                'nama' => 'Agen / Bandar',
            ],
            [
                'nama' => 'Petani Pengguna Benih',
            ],
            [
                'nama' => 'Petani Penerima Bantuan',
            ],
        ];

        foreach ($posisiData as $data) {
            DB::table('posisi')->insert($data);
        }
    }
}