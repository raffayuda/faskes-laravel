<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProvinsiController extends Controller
{
    public function index()
    {
        $provinsis = Provinsi::with('kabkotas')->paginate(10);
        return view('admin.provinsi.index', compact('provinsis'));
    }

    public function create()
    {
        if (!Auth::user() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat menambah data.');
        }
        return view('admin.provinsi.create');
    }

    public function store(Request $request)
    {
        if (!Auth::user() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat menambah data.');
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:45|unique:provinsi,nama',
            'ibukota' => 'nullable|string|max:45',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        Provinsi::create($validated);

        return redirect()->route('provinsi.index')->with('success', 'Data provinsi berhasil ditambahkan.');
    }

    public function show(Provinsi $provinsi)
    {
        $provinsi->load(['kabkotas.faskes']);
        return view('admin.provinsi.show', compact('provinsi'));
    }

    public function edit(Provinsi $provinsi)
    {
        if (!Auth::user() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengedit data.');
        }
        return view('admin.provinsi.edit', compact('provinsi'));
    }

    public function update(Request $request, Provinsi $provinsi)
    {
        if (!Auth::user() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengedit data.');
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:45|unique:provinsi,nama,' . $provinsi->id,
            'ibukota' => 'nullable|string|max:45',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
        ]);

        $provinsi->update($validated);

        return redirect()->route('provinsi.index')->with('success', 'Data provinsi berhasil diperbarui.');
    }

    public function destroy(Provinsi $provinsi)
    {
        if (!Auth::user() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat menghapus data.');
        }

        if ($provinsi->kabkotas()->count() > 0) {
            return redirect()->route('provinsi.index')->with('error', 'Tidak dapat menghapus provinsi yang masih memiliki kabupaten/kota.');
        }

        $provinsi->delete();

        return redirect()->route('provinsi.index')->with('success', 'Data provinsi berhasil dihapus.');
    }
}
