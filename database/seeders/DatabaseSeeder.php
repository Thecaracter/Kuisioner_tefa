<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(Data::class);
        $this->call(PerusahaanSeeder::class);
        $this->call(Posisi::class);
        $this->call(jenisquisionerseed::class);
        $this->call(pengisian_quis::class);

    }
}