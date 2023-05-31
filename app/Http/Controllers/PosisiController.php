<?php

namespace App\Http\Controllers;

use App\Models\Posisi;
use Illuminate\Http\Request;

class PosisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posisi = Posisi::all();
        return view('admin.posisi', compact('posisi'));
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
            'nama' => 'required|string|max:255',
        ]);

        Posisi::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('posisi.index')->with('success', 'Quisioner berhasil ditambahkan.');
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
            'nama' => 'required|string|max:255',
        ]);

        $posisi = Posisi::findOrFail($id);

        $posisi->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('posisi.index')->with('success', 'Quisioner berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $posisi = Posisi::findOrFail($id);
        $posisi->delete();

        return redirect()->route('posisi.index')->with('success', 'Quisioner berhasil dihapus.');
    }
}