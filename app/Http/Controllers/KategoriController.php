<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::with('faskes')->paginate(10);
        return view('admin.kategori.index', compact('kategoris'));
    }

    public function create()
    {
        if (!Auth::user() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat menambah data.');
        }
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        if (!Auth::user() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat menambah data.');
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:50|unique:kategori,nama',
        ]);

        Kategori::create($validated);

        return redirect()->route('kategori.index')->with('success', 'Data kategori berhasil ditambahkan.');
    }

    public function show(Kategori $kategori)
    {
        $kategori->load(['faskes.jenisFaskes', 'faskes.kabkota.provinsi']);
        return view('admin.kategori.show', compact('kategori'));
    }

    public function edit(Kategori $kategori)
    {
        if (!Auth::user() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengedit data.');
        }
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        if (!Auth::user() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengedit data.');
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:50|unique:kategori,nama,' . $kategori->id,
        ]);

        $kategori->update($validated);

        return redirect()->route('kategori.index')->with('success', 'Data kategori berhasil diperbarui.');
    }

    public function destroy(Kategori $kategori)
    {
        if (!Auth::user() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat menghapus data.');
        }

        if ($kategori->faskes()->count() > 0) {
            return redirect()->route('kategori.index')->with('error', 'Tidak dapat menghapus kategori yang masih digunakan.');
        }

        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Data kategori berhasil dihapus.');
    }
}
