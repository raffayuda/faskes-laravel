<?php

namespace App\Http\Controllers;

use App\Models\Faskes;
use App\Models\Kabkota;
use App\Models\JenisFaskes;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaskesController extends Controller
{
    public function index()
    {
        $faskes = Faskes::with(['kabkota.provinsi', 'jenisFaskes', 'kategori'])
            ->paginate(10);

        return view('faskes.index', compact('faskes'));
    }

    public function create()
    {
        if (!Auth::user() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat menambah data.');
        }

        $kabkota = Kabkota::with('provinsi')->get();
        $jenisFaskes = JenisFaskes::all();
        $kategori = Kategori::all();

        return view('faskes.create', compact('kabkota', 'jenisFaskes', 'kategori'));
    }

    public function store(Request $request)
    {
        if (!Auth::user() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat menambah data.');
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_pengelola' => 'nullable|string|max:45',
            'alamat' => 'nullable|string|max:100',
            'website' => 'nullable|string|max:45',
            'email' => 'nullable|email|max:45',
            'kabkota_id' => 'nullable|exists:kabkota,id',
            'rating' => 'nullable|integer|min:1|max:5',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'jenis_faskes_id' => 'nullable|exists:jenis_faskes,id',
            'kategori_id' => 'nullable|exists:kategori,id',
        ]);

        // Handle file upload
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('uploads/faskes'), $filename);
            $validated['foto'] = $filename;
        }

        Faskes::create($validated);

        return redirect()->route('faskes.index')->with('success', 'Data faskes berhasil ditambahkan.');
    }

    public function show(Faskes $faskes)
    {
        $faskes->load(['kabkota.provinsi', 'jenisFaskes', 'kategori']);
        return view('faskes.show', compact('faskes'));
    }

    public function edit(Faskes $faskes)
    {
        if (!Auth::user() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengedit data.');
        }

        $kabkota = Kabkota::with('provinsi')->get();
        $jenisFaskes = JenisFaskes::all();
        $kategori = Kategori::all();

        return view('faskes.edit', compact('faskes', 'kabkota', 'jenisFaskes', 'kategori'));
    }

    public function update(Request $request, Faskes $faskes)
    {
        if (!Auth::user() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengedit data.');
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_pengelola' => 'nullable|string|max:45',
            'alamat' => 'nullable|string|max:100',
            'website' => 'nullable|string|max:45',
            'email' => 'nullable|email|max:45',
            'kabkota_id' => 'nullable|exists:kabkota,id',
            'rating' => 'nullable|integer|min:1|max:5',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'jenis_faskes_id' => 'nullable|exists:jenis_faskes,id',
            'kategori_id' => 'nullable|exists:kategori,id',
        ]);

        // Handle file upload
        if ($request->hasFile('foto')) {
            // Delete old photo if exists
            if ($faskes->foto && file_exists(public_path('uploads/faskes/' . $faskes->foto))) {
                unlink(public_path('uploads/faskes/' . $faskes->foto));
            }
            
            $foto = $request->file('foto');
            $filename = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('uploads/faskes'), $filename);
            $validated['foto'] = $filename;
        }

        $faskes->update($validated);

        return redirect()->route('faskes.index')->with('success', 'Data faskes berhasil diperbarui.');
    }

    public function destroy(Faskes $faskes)
    {
        if (!Auth::user() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat menghapus data.');
        }

        $faskes->delete();

        return redirect()->route('faskes.index')->with('success', 'Data faskes berhasil dihapus.');
    }
}
