<?php

namespace App\Http\Controllers;

use App\Models\Faskes;
use App\Models\Provinsi;
use App\Models\Kabkota;
use App\Models\JenisFaskes;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_faskes' => Faskes::count(),
            'total_provinsi' => Provinsi::count(),
            'total_kabkota' => Kabkota::count(),
            'total_users' => User::count(),
        ];

        $recentFaskes = Faskes::with(['kabkota.provinsi', 'jenisFaskes', 'kategori'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.index', compact('stats', 'recentFaskes'));
    }
}
