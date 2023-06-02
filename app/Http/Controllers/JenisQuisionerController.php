<?php

namespace App\Http\Controllers;

use App\Models\JenisQuisioner;
use Illuminate\Http\Request;

class JenisQuisionerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis = JenisQuisioner::all();
        return view('admin.jenis_quisioner', compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|string|max:255',
        ]);

        JenisQuisioner::create([
            'jenis' => $request->jenis,
        ]);

        return redirect()->route('jenisq.index')->with('success', 'Quisioner berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'jenis' => 'required|string|max:255',
        ]);

        $perusahaan = JenisQuisioner::findOrFail($id);

        $perusahaan->update([
            'jenis' => $request->jenis,
        ]);

        return redirect()->route('jenisq.index')->with('success', 'Quisioner berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $perusahaan = JenisQuisioner::findOrFail($id);
        $perusahaan->delete();

        return redirect()->route('jenisq.index')->with('success', 'Quisioner berhasil dihapus.');
    }
}