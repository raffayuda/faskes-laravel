<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faskes;
use App\Models\FaskesRating;
use Illuminate\Support\Facades\Auth;

class FaskesRatingController extends Controller
{
    public function store(Request $request, Faskes $faskes)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login untuk memberikan rating.');
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:1000'
        ]);

        // Check if user has already rated this faskes
        $existingRating = FaskesRating::where('user_id', Auth::id())
                                    ->where('faskes_id', $faskes->id)
                                    ->first();

        if ($existingRating) {
            // Update existing rating
            $existingRating->update([
                'rating' => $request->rating,
                'review' => $request->review
            ]);
            $message = 'Rating Anda berhasil diperbarui!';
        } else {
            // Create new rating
            FaskesRating::create([
                'user_id' => Auth::id(),
                'faskes_id' => $faskes->id,
                'rating' => $request->rating,
                'review' => $request->review
            ]);
            $message = 'Rating berhasil diberikan!';
        }

        return back()->with('success', $message);
    }

    public function destroy(Faskes $faskes)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login untuk menghapus rating.');
        }

        $rating = FaskesRating::where('user_id', Auth::id())
                             ->where('faskes_id', $faskes->id)
                             ->first();

        if ($rating) {
            $rating->delete();
            return back()->with('success', 'Rating berhasil dihapus!');
        }

        return back()->with('error', 'Rating tidak ditemukan.');
    }
}
