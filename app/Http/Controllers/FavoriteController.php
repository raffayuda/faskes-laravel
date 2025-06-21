<?php

namespace App\Http\Controllers;

use App\Models\Faskes;
use App\Models\FaskesFavorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Auth::user()->favoritesFaskes()
            ->with(['kabkota.provinsi', 'jenisFaskes', 'kategori', 'ratings'])
            ->paginate(10);

        return view('favorites.index', compact('favorites'));
    }

    public function toggle(Request $request, Faskes $faskes)
    {
        $user = Auth::user();
        
        $favorite = FaskesFavorite::where('user_id', $user->id)
            ->where('faskes_id', $faskes->id)
            ->first();

        if ($favorite) {
            $favorite->delete();
            $message = 'Faskes dihapus dari favorit';
            $isFavorited = false;
        } else {
            FaskesFavorite::create([
                'user_id' => $user->id,
                'faskes_id' => $faskes->id,
            ]);
            $message = 'Faskes ditambahkan ke favorit';
            $isFavorited = true;
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'is_favorited' => $isFavorited
            ]);
        }

        return back()->with('success', $message);
    }

    public function destroy(Faskes $faskes)
    {
        $user = Auth::user();
        
        FaskesFavorite::where('user_id', $user->id)
            ->where('faskes_id', $faskes->id)
            ->delete();

        return back()->with('success', 'Faskes dihapus dari favorit');
    }
}
