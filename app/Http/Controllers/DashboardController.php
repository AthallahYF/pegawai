<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employees;
use App\Models\UnitKerja;

class DashboardController extends Controller
{
    public function index()
    {
        $employees = Employees::with([
            'jabatan',
            'agama',
            'position.jabatan',
            'position.unitKerja',
        ])->latest()->take(5)->get();

        $pegawaiPerBulan = Employees::select(
            DB::raw("DATE_FORMAT(created_at, '%M %Y') as bulan"),
            DB::raw('COUNT(*) as total')
        )
        ->groupBy('bulan')
        ->orderByRaw("MIN(created_at)")
        ->get();

        $unitTerbanyak = UnitKerja::withCount('positions')
            ->orderByDesc('positions_count')
            ->first();

        $totalPegawai = Employees::count();

        return view('dashboard.index', compact('employees', 'unitTerbanyak', 'totalPegawai', 'pegawaiPerBulan'));
    }
}
