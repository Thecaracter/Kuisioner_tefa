<?php

namespace App\Http\Controllers;

use App\Models\DetailPenyimpanan;
use App\Models\Penyimpanan;
use Illuminate\Http\Request;

class PenyimpananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyimpanan = Penyimpanan::with('posisi', 'perusahaan')->get();
        return view('admin.penyimpanan', compact('penyimpanan'));
    }

    public function destroy(string $id)
    {
        $posisi = Penyimpanan::findOrFail($id);

        // Delete associated records in the `detail_penyimpanan` table
        $posisi->detailPenyimpanan()->delete();

        // Delete the `penyimpanan` record
        $posisi->delete();

        return redirect()->route('penyimpanan.index')->with('success', 'Penyimpanan berhasil dihapus.');
    }

}