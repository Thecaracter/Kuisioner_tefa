<?php

namespace App\Http\Controllers;

use App\Models\DetailPenyimpanan;
use App\Models\Quisioner;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $quisioners = Quisioner::all();
        return view('admin.laporan', compact('quisioners'));
    }
    public function getDetailPenyimpanan($quisionerId)
    {
        $detailPenyimpanan = DetailPenyimpanan::whereHas('detailQuisioner', function ($query) use ($quisionerId) {
            $query->where('quisioner_id', $quisionerId);
        })->get();

        $data = [];

        foreach ($detailPenyimpanan as $index => $detail) {
            $jenisPertanyaan = $detail->detailQuisioner->jenisQuisioner->jenis;

            if (!isset($data[$jenisPertanyaan])) {
                $data[$jenisPertanyaan] = [
                    'pilihan_1' => 0,
                    'pilihan_2' => 0,
                    'pilihan_3' => 0,
                    'pilihan_4' => 0,
                    'pilihan_5' => 0,
                ];
            }

            // Perbaikan pada bagian ini
            switch ($detail->jawaban) {
                case 1:
                    $data[$jenisPertanyaan]['pilihan_1']++;
                    break;
                case 2:
                    $data[$jenisPertanyaan]['pilihan_2']++;
                    break;
                case 3:
                    $data[$jenisPertanyaan]['pilihan_3']++;
                    break;
                case 4:
                    $data[$jenisPertanyaan]['pilihan_4']++;
                    break;
                case 5:
                    $data[$jenisPertanyaan]['pilihan_5']++;
                    break;
                default:
                    break;
            }
        }

        return response()->json($data);
    }
}