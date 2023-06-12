<?php

namespace App\Http\Controllers;

use App\Models\Penyimpanan;
use App\Models\Perusahaan;
use App\Models\Posisi;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index()
    {
        $userCount = User::count();
        $penyimpananCount = Penyimpanan::count();
        $perusahaanCount = Perusahaan::count();
        $posisiCount = Posisi::count();

        // Mengambil data jumlah penyimpanan berdasarkan bulan
        $data = Penyimpanan::select(
            DB::raw('DATE_FORMAT(tanggal, "%Y-%m") as month'),
            DB::raw('COUNT(*) as total')
        )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Mengelompokkan data berdasarkan bulan
        $chartData = [];
        foreach ($data as $item) {
            $month = Carbon::createFromFormat('Y-m', $item->month)->format('F Y');
            $chartData[] = [
                'month' => $month,
                'total' => $item->total
            ];
        }

        // Mengonversi data ke dalam format yang diperlukan oleh charting library (misalnya, JSON)
        $chartDataJson = json_encode($chartData);

        return view('admin.dashboard', compact('userCount', 'penyimpananCount', 'perusahaanCount', 'posisiCount', 'chartDataJson'));
    }



}