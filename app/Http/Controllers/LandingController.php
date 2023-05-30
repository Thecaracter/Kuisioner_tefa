<?php

namespace App\Http\Controllers;

use App\Models\Quisioner;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Facades\Province;


class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $quisioners = Quisioner::all();


        return view('landing.landingpage', compact('quisioners'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}