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

            $data[$jenisPertanyaan]['pilihan_1'] += $detail->jawaban === 1 ? 1 : 0;
            $data[$jenisPertanyaan]['pilihan_2'] += $detail->jawaban === 2 ? 1 : 0;
            $data[$jenisPertanyaan]['pilihan_3'] += $detail->jawaban === 3 ? 1 : 0;
            $data[$jenisPertanyaan]['pilihan_4'] += $detail->jawaban === 4 ? 1 : 0;
            $data[$jenisPertanyaan]['pilihan_5'] += $detail->jawaban === 5 ? 1 : 0;
        }

        return response()->json($data);
    }

}