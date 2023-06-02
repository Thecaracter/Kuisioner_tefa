<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class pengisian_quis extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quisionerId = DB::table('quisioner')->where('nama', 'Analisis Kompetitor')->value('id');

        $pertanyaan = [
            'Jika pembeli bertambah maka biaya tetap operasional akan menurun secara signifikan',
            'Identifikasi merek dan kesetiaan pelanggan disebabkan oleh layanan perusahaan kepada pelanggan',
            'Adanya biaya beralih pemasok (switching cost) yang harus dikeluarkan pembeli bilamana mereka berpindah dari satu pemasok ke pemasok lain',
            'Adanya hambatan untuk masuk ke saluran distribusi dapat ditimbulkan dengan adanya kebutuhan dari pesaing baru untuk mengamankan distribusi produknya',
            'Perusahaan yang telah mapan mempunyai keunggulan biaya yang tidak dapat ditiru oleh pesaing baru yang akan masuk',
            'Teknologi produk milik sendiri terkait pengetahuan produk atau karakteristik rancangan yang dilindungi kepemilikannya melalui hak paten atau kerahasiaan',
            'Perusahaan yang telah mapan telah menguasai sumber-sumber bahan baku yang paling menguntungkan',
            'Sejarah perlawanan keras terhadap pesaing baru',
            'Perusahaan yang telah mapan dengan sumberdaya yang besar untuk menyerang balik',
            'Perusahaan yang telah mapan dengan komitmen yang besar dan telah menanamkan kekayaan yang sangat tidak likuid di dalamnya',
            'Pertumbuhan perusahaan yang lambat akan membatasi kemampuan perusahaan untuk mengakuisisi pesaing baru dan pesaing yang telah mapan',
            'Hambatan masuk dapat berubah bila kondisi-kondisi yang diuraikan di atas pada angka 8 sampai dengan 11 berubah',
            'Adanya jumlah pesaing yang banyak, maka persaingan menjadi besar dan beberapa perusahaan mungkin beranggapan bahwa mereka dapat bergerak tanpa diketahui lawan',
            'Pertumbuhan perusahaan yang lamban akan mengubah persaingan menjadi ajang perebutan bagian pasar untuk perusahaan yang ingin melakukan ekspansi',
            'Biaya tetap atau biaya penyimpangan yang tinggi dari pesaing',
            'Ketiadaan diferensiasi atau biaya peralihan dari pesaing',
            'Penambahan kapasitas produksi dalam jumlah besar oleh pesaing',
            'Tata hubungan antara unit usaha dengan unit lain dalam perusahaan yang meliputi: citra, kemampuan pemasaran, akses ke pasar dana, dan fasilitas bersama akan menyebabkan perusahaan secara strategis sangat berkepentingan untuk tetap berada dalam bisnis tersebut',
            'Produk yang dihasilkan perusahaan akan menghadapi produk pengganti dari pesaing',
            'Perusahaan mempunyai kecenderungan untuk memiliki harga atau prestasi yang lebih baik dari produk pesaing',
            'Produk pesaing terdiferensiasi dan telah menciptakan biaya peralihan',
            'Pesaing memperlihatkan ancaman yang meyakinkan untuk melakukan integrasi maju',
            'Pembeli menunjukkan ancaman untuk melakukan integrasi balik',
            'Produk pesaing merupakan input penting bagi identifikasi ancaman bisnis',
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
    }
}