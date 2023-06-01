<?php

namespace App\Http\Controllers;

use App\Models\DetailPenyimpanan;
use App\Models\Detail_Quisioner;
use App\Models\Penyimpanan;
use App\Models\Perusahaan;
use App\Models\Posisi;
use App\Models\Quisioner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $quisioners = Quisioner::where('status', 1)->get();
        $selectedQuisionerId = $request->input('quisioner');
        $posisi = Posisi::all();
        $perusahaan = Perusahaan::all();

        return view('landing.landingpage', compact('quisioners', 'selectedQuisionerId', 'posisi', 'perusahaan'));
    }

    public function getQuisioner(Request $request)
    {
        $quisionerId = $request->input('quisioner_id');
        $quisionerajax = Detail_Quisioner::where('quisioner_id', $quisionerId)->get();

        return response()->json($quisionerajax);
    }


    public function store(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'umur' => 'required|numeric',
            'telepon' => 'required',
            'posisi' => 'required',
            'perusahaan' => 'required',
            'quisioner' => 'required',
            'detail_quisioner.*' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Store personal information
        $penyimpanan = new Penyimpanan();
        $penyimpanan->nama = $request->input('nama');
        $penyimpanan->alamat = $request->input('alamat');
        $penyimpanan->umur = $request->input('umur');
        $penyimpanan->no_telepon = $request->input('telepon');
        $penyimpanan->posisi_id = $request->input('posisi');
        $penyimpanan->perusahaan_id = $request->input('perusahaan');
        $penyimpanan->tanggal = now();
        $penyimpanan->save();

        // Store questionnaire details
        $quisionerId = $request->input('quisioner');
        $detailQuisioners = $request->input('detail_quisioner');

        if ($quisionerId && $detailQuisioners) {
            foreach ($detailQuisioners as $detailQuisionerId => $jawaban) {
                $detailPenyimpanan = new DetailPenyimpanan();
                $detailPenyimpanan->penyimpanan_id = $penyimpanan->id;
                $detailPenyimpanan->detail_quisioner_id = $detailQuisionerId;
                $detailPenyimpanan->jawaban = $jawaban;
                $detailPenyimpanan->save();
            }
        }

        return response()->json(['message' => 'Data saved successfully']);
    }

}