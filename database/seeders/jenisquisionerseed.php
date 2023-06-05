<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class jenisquisionerseed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenisQuisioner = [
            [
                'jenis' => 'Produk',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis' => 'Promosi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis' => 'Kualitas produk',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis' => 'Layanan petugas lapang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis' => 'Penanganan komplain pelanggan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis' => 'Ancaman Pesaing Baru',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis' => 'Reaksi Tindakan Perlawanan Pesaing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis' => 'Persaingan di antara Pesaing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis' => 'Tekanan dari Produk Pengganti',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('jenis_quisioner')->insert($jenisQuisioner);

    }
}