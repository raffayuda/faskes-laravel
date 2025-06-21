<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaskesRating extends Model
{
    protected $fillable = [
        'user_id',
        'faskes_id',
        'rating',
        'review'
    ];

    protected $casts = [
        'rating' => 'integer'
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function faskes()
    {
        return $this->belongsTo(Faskes::class);
    }
}
