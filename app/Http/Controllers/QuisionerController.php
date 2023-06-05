<?php

namespace App\Http\Controllers;

use App\Models\Quisioner;
use Illuminate\Http\Request;

class QuisionerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quisioners = Quisioner::all();
        return view('admin.quisioner', compact('quisioners'));
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
        $validatedData = $request->validate([
            'nama' => 'required',
            'status' => 'required|in:1,2',
        ]);

        Quisioner::create($validatedData);

        return redirect()->route('quisioner.index')->with('success', 'Quisioner berhasil ditambahkan');
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
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'status' => 'required',
        ]);

        $quisioner = Quisioner::findOrFail($id);
        $quisioner->update($validatedData);

        return redirect()->route('quisioner.index')->with('success', 'Quisioner updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $quisioner = Quisioner::findOrFail($id);
        $quisioner->delete();

        return redirect()->route('quisioner.index')->with('success', 'Quisioner berhasil dihapus');
    }
}