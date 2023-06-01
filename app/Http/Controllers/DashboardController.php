<?php

namespace App\Http\Controllers;

use App\Models\Penyimpanan;
use App\Models\Perusahaan;
use App\Models\Posisi;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $penyimpananCount = Penyimpanan::count();
        $perusahaanCount = Perusahaan::count();
        $posisiCount = Posisi::count();
        return view('admin.dashboard', compact('userCount', 'penyimpananCount', 'perusahaanCount', 'posisiCount'));
    }


}