<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faskes;
use App\Models\Provinsi;
use App\Models\JenisFaskes;
use App\Models\Kategori;

class LandingController extends Controller
{
    public function index()
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

    public function faq()
    {
        $faqs = [
            [
                'question' => 'Apa itu Faskes Indonesia?',
                'answer' => 'Faskes Indonesia adalah platform digital yang menyediakan informasi lengkap tentang fasilitas kesehatan di seluruh Indonesia. Platform ini membantu masyarakat untuk menemukan fasilitas kesehatan terdekat dan mendapatkan informasi yang akurat.'
            ],
            [
                'question' => 'Bagaimana cara menggunakan platform ini?',
                'answer' => 'Anda dapat menggunakan fitur pencarian untuk menemukan fasilitas kesehatan berdasarkan lokasi, jenis, atau kategori. Setelah mendaftar, Anda juga dapat menyimpan fasilitas favorit dan mengakses fitur-fitur tambahan.'
            ],
            [
                'question' => 'Apakah data yang disediakan akurat?',
                'answer' => 'Kami berkomitmen untuk menyediakan data yang akurat dan selalu ter-update. Data bersumber dari instansi resmi dan diverifikasi secara berkala oleh tim kami.'
            ],
            [
                'question' => 'Bagaimana cara melaporkan informasi yang tidak akurat?',
                'answer' => 'Anda dapat menghubungi kami melalui halaman kontak atau email support@faskes-indonesia.id untuk melaporkan informasi yang tidak akurat. Tim kami akan segera memverifikasi dan memperbaiki data.'
            ],
            [
                'question' => 'Apakah ada biaya untuk menggunakan layanan ini?',
                'answer' => 'Kami menyediakan paket gratis dengan fitur dasar. Untuk akses fitur lengkap dan layanan premium, tersedia paket berbayar dengan harga yang terjangkau.'
            ]
        ];

        return view('landing.faq', compact('faqs'));
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string',
            'message' => 'required|string|max:2000',
            'privacy' => 'required|accepted',
        ]);

        // Here you would typically send an email or save to database
        // For now, we'll just return a success message
        
        return back()->with('success', 'Terima kasih! Pesan Anda telah berhasil dikirim. Tim kami akan segera menghubungi Anda.');
    }
}
