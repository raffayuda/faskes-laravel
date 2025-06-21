<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faskes;
use App\Models\Provinsi;
use App\Models\JenisFaskes;
use App\Models\Kategori;

class LandingController extends Controller
{
    public function home()
    {
        $totalFaskes = Faskes::count();
        $totalProvinsi = Provinsi::count();
        $totalJenisFaskes = JenisFaskes::count();
        
        return view('landing.home', compact('totalFaskes', 'totalProvinsi', 'totalJenisFaskes'));
    }

    public function about()
    {
        return view('landing.about');
    }

    public function services()
    {
        $jenisFaskes = JenisFaskes::withCount('faskes')->get();
        $kategoris = Kategori::withCount('faskes')->get();
        
        return view('landing.services', compact('jenisFaskes', 'kategoris'));
    }

    public function contact()
    {
        return view('landing.contact');
    }

    public function search(Request $request)
    {
        $query = Faskes::with(['kabkota.provinsi', 'jenisFaskes', 'kategori']);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhere('alamat', 'like', "%{$search}%")
                  ->orWhereHas('kabkota', function($q) use ($search) {
                      $q->where('nama', 'like', "%{$search}%");
                  })
                  ->orWhereHas('provinsi', function($q) use ($search) {
                      $q->where('nama', 'like', "%{$search}%");
                  });
        }

        if ($request->filled('provinsi_id')) {
            $query->whereHas('kabkota', function($q) use ($request) {
                $q->where('provinsi_id', $request->provinsi_id);
            });
        }

        if ($request->filled('jenis_faskes_id')) {
            $query->where('jenis_faskes_id', $request->jenis_faskes_id);
        }

        $faskes = $query->paginate(12)->withQueryString();
        $provinsis = Provinsi::all();
        $jenisFaskes = JenisFaskes::all();

        return view('landing.search', compact('faskes', 'provinsis', 'jenisFaskes'));
    }
}
