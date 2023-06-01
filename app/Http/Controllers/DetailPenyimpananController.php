<?php

namespace App\Http\Controllers;

use App\Models\DetailPenyimpanan;
use Illuminate\Http\Request;

class DetailPenyimpananController extends Controller
{

    public function index($id)
    {
        $detailPenyimpanan = DetailPenyimpanan::join('penyimpanan', 'detail_penyimpanan.penyimpanan_id', '=', 'penyimpanan.id')
            ->join('detail_quisioner', 'detail_penyimpanan.detail_quisioner_id', '=', 'detail_quisioner.id')
            ->select('detail_penyimpanan.*', 'penyimpanan.nama AS nama_penyimpanan', 'detail_quisioner.pertanyaan')
            ->where('penyimpanan_id', $id)
            ->get();

        if (!$detailPenyimpanan) {
            abort(404);
        }

        return view('admin.detail', compact('detailPenyimpanan'));
        // return response()->json($detailPenyimpanan);

    }
}