<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('perusahaan')->insert([
            'nama' => 'PT BISI Internasional Tbk',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('perusahaan')->insert([
            'nama' => 'PT East West Seed Indonesia',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('perusahaan')->insert([
            'nama' => 'PT Agri Makmur Pertiwi',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('perusahaan')->insert([
            'nama' => 'PT Benih Citra Asia',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('perusahaan')->insert([
            'nama' => 'PT Syngenta Seed Indonesia',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}