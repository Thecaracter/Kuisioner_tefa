<?php
namespace App\Http\Controllers;

use App\Models\Penyimpanan;
use App\Models\Perusahaan;
use App\Models\Posisi;
use App\Models\DetailPenyimpanan;
use App\Models\Quisioner;
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
        $quisioners = Quisioner::all();

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

        return view('admin.dashboard', compact('userCount', 'penyimpananCount', 'perusahaanCount', 'posisiCount', 'chartDataJson', 'quisioners'));
    }

    public function getChartData($quisionerId)
    {
        $detailPenyimpanan = DetailPenyimpanan::whereHas('detailQuisioner', function ($query) use ($quisionerId) {
            $query->where('quisioner_id', $quisionerId);
        })->get();

        $totalJawaban = $detailPenyimpanan->count();

        $data = [
            'labels' => ['Pilihan 1', 'Pilihan 2', 'Pilihan 3', 'Pilihan 4', 'Pilihan 5'],
            'data' => [0, 0, 0, 0, 0],
            'backgroundColor' => ['#FF6384', '#36A2EB', '#FFCE56', '#8DFF75', '#FFA456'],
        ];

        foreach ($detailPenyimpanan as $detail) {
            $jawaban = $detail->jawaban;
            if ($jawaban >= 1 && $jawaban <= 5) {
                $data['data'][$jawaban - 1]++;
            }
        }

        return response()->json($data);
    }
}