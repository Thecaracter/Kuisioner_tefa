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
            'nama' => 'Nama Quisioner 1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('quisioner')->insert([
            'nama' => 'Nama Quisioner 2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $quisionerId = DB::table('quisioner')->where('nama', 'Nama Quisioner 1')->value('id');

        DB::table('detail_quisioner')->insert([
            'pertanyaan' => 'Pertanyaan 1',
            'quisioner_id' => $quisionerId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $quisionerId = DB::table('quisioner')->where('nama', 'Nama Quisioner 2')->value('id');

        DB::table('detail_quisioner')->insert([
            'pertanyaan' => 'Pertanyaan 2',
            'quisioner_id' => $quisionerId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Rizqi',
            'email' => 'rizqi@gmail.com',
            'password' => bcrypt('12345678'),
            'alamat' => '123 Main St',
            'no_tlp' => '123456789',
            'role' => 'user',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}