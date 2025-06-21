<?php

namespace App\Http\Controllers;

use App\Models\JenisFaskes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JenisFaskesController extends Controller
{
    public function index(Request $request)
    {
        $query = JenisFaskes::with('faskes');

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('nama', 'like', "%{$search}%");
        }

        // Sorting functionality
        $sortField = $request->get('sort', 'nama');
        $sortDirection = $request->get('direction', 'asc');
        
        if (in_array($sortField, ['nama', 'created_at'])) {
            $query->orderBy($sortField, $sortDirection);
        } else {
            $query->orderBy('nama', 'asc');
        }

        $jenisFaskes = $query->paginate(10)->withQueryString();
        
        return view('admin.jenis_faskes.index', compact('jenisFaskes'));
    }

    public function create()
    {
        if (!Auth::user() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat menambah data.');
        }
        return view('admin.jenis_faskes.create');
    }

    public function store(Request $request)
    {
        if (!Auth::user() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat menambah data.');
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:45|unique:jenis_faskes,nama',
        ]);

        JenisFaskes::create($validated);

        return redirect()->route('jenis-faskes.index')->with('success', 'Data jenis faskes berhasil ditambahkan.');
    }

    public function show(JenisFaskes $jenis_faske)
    {
        $jenis_faske->load(['faskes.kabkota.provinsi', 'faskes.kategori']);
        return view('admin.jenis_faskes.show', ['jenisFaskes' => $jenis_faske]);
    }

    public function edit(JenisFaskes $jenis_faske)
    {
        if (!Auth::user() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengedit data.');
        }
        return view('admin.jenis_faskes.edit', ['jenisFaskes' => $jenis_faske]);
    }

    public function update(Request $request, JenisFaskes $jenis_faske)
    {
        if (!Auth::user() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengedit data.');
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:45|unique:jenis_faskes,nama,' . $jenis_faske->id,
        ]);

        $jenis_faske->update($validated);

        return redirect()->route('jenis-faskes.index')->with('success', 'Data jenis faskes berhasil diperbarui.');
    }

    public function destroy(JenisFaskes $jenis_faske)
    {
        if (!Auth::user() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat menghapus data.');
        }

        if ($jenis_faske->faskes()->count() > 0) {
            return redirect()->route('jenis-faskes.index')->with('error', 'Tidak dapat menghapus jenis faskes yang masih digunakan.');
        }

        $jenis_faske->delete();

        return redirect()->route('jenis-faskes.index')->with('success', 'Data jenis faskes berhasil dihapus.');
    }
}
