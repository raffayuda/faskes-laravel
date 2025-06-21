<?php

namespace App\Http\Controllers;

use App\Models\Kabkota;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KabkotaController extends Controller
{
    public function index(Request $request)
    {
        $query = Kabkota::with(['provinsi', 'faskes']);

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhereHas('provinsi', function($q) use ($search) {
                      $q->where('nama', 'like', "%{$search}%");
                  });
        }

        // Filter by provinsi
        if ($request->filled('provinsi_id')) {
            $query->where('provinsi_id', $request->provinsi_id);
        }

        // Sorting functionality
        $sortField = $request->get('sort', 'nama');
        $sortDirection = $request->get('direction', 'asc');
        
        if (in_array($sortField, ['nama', 'created_at'])) {
            $query->orderBy($sortField, $sortDirection);
        } else {
            $query->orderBy('nama', 'asc');
        }

        $kabkotas = $query->paginate(10)->withQueryString();
        $provinsis = Provinsi::all();
        
        return view('admin.kabkota.index', compact('kabkotas', 'provinsis'));
    }

    public function create()
    {
        if (!Auth::user() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat menambah data.');
        }
        $provinsis = Provinsi::all();
        return view('admin.kabkota.create', compact('provinsis'));
    }

    public function store(Request $request)
    {
        if (!Auth::user() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat menambah data.');
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'provinsi_id' => 'required|exists:provinsi,id',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        Kabkota::create($validated);

        return redirect()->route('kabkota.index')->with('success', 'Data kabupaten/kota berhasil ditambahkan.');
    }

    public function show(Kabkota $kabkotum)
    {
        $kabkotum->load(['provinsi', 'faskes.jenisFaskes', 'faskes.kategori']);
        return view('admin.kabkota.show', ['kabkota' => $kabkotum]);
    }

    public function edit(Kabkota $kabkotum)
    {
        if (!Auth::user() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengedit data.');
        }
        $provinsis = Provinsi::all();
        return view('admin.kabkota.edit', ['kabkota' => $kabkotum, 'provinsis' => $provinsis]);
    }

    public function update(Request $request, Kabkota $kabkotum)
    {
        if (!Auth::user() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengedit data.');
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'provinsi_id' => 'required|exists:provinsi,id',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $kabkotum->update($validated);

        return redirect()->route('kabkota.index')->with('success', 'Data kabupaten/kota berhasil diperbarui.');
    }

    public function destroy(Kabkota $kabkotum)
    {
        if (!Auth::user() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat menghapus data.');
        }

        if ($kabkotum->faskes()->count() > 0) {
            return redirect()->route('kabkota.index')->with('error', 'Tidak dapat menghapus kabupaten/kota yang masih memiliki faskes.');
        }

        $kabkotum->delete();

        return redirect()->route('kabkota.index')->with('success', 'Data kabupaten/kota berhasil dihapus.');
    }
}
