<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Data extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('quisioner')->insert([
            'nama' => 'Kepuasan Pelanggan',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('quisioner')->insert([
            'nama' => 'Analisis Kompetitor',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Rizqi',
            'email' => 'rizqi@gmail.com',
            'password' => bcrypt('12345678'),
            'alamat' => '123 Main St',
            'no_tlp' => '123456789',
            'role' => 'admin',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'alamat' => '123 Main St',
            'no_tlp' => '123456789',
            'role' => 'admin',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}