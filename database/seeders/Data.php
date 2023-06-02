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

        $quisionerId = DB::table('quisioner')->where('nama', 'Kepuasan Pelanggan')->value('id');

        $pertanyaan = [
            'Kelengkapan informasi pada kemasan',
            'Harga Produk dibanding dengan kompetitor',
            'Keunggulan Varietas dibanding kompetitor',
            'Tampilan kemasan produk',
            'Kemudahan dalam memperoleh/membeli Produk',
            'Kepuasan memilih produk',
            'Tampilan gambar pada kemasan produk',
            'Kecukupan jumlah material promosi',
            'Kuantitas kegiatan promosi yang dilaksanakan oleh petugas',
            'Kualitas kegiatan promosi yang dilaksanakan oleh petugas',
            'Kemurnian fisik benih produk sesuai dengan standart mutu',
            'Vigor benih produk pada saat dipersemaian',
            'Daya tumbuh benih produk, sesuai dengan standart mutu',
            'Kemurnian genetik sesuai dengan standart mutu',
            'Ketahanan hama dan penyakit produk',
            'Kesesuaian gambar produk dengan hasil panen',
            'Kesesuaian hasil panen terhadap permintaan pasar',
            'Kepuasan hasil panen produk',
            'Kemampuan teknis budidaya petugas lapang',
            'Kemampuan teknis budidaya petugas lapang',
            'Intensitas kunjungan petugas lapang',
            'Intensitas interaksi dan komunikasi petugas lapang',
            'Kecakapan dan kredibilitas (dapat dipercaya) petugas lapang',
            'Pengaruh keberadaan petugas lapang',
            'Kemampuan teknis komunikasi petugas lapang',
            'Kecepatan verifikasi komplain pelanggan',
            'Kecepatan penyelesaian komplain pelanggan',
            'Penanganan komplain pelanggan',

        ];

        $detailQuisionerData = [];

        foreach ($pertanyaan as $question) {
            $detailQuisionerData[] = [
                'pertanyaan' => $question,
                'quisioner_id' => $quisionerId,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('detail_quisioner')->insert($detailQuisionerData);

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