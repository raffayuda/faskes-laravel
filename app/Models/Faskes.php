<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faskes extends Model
{
    use HasFactory;

    protected $table = 'faskes';

    protected $fillable = [
        'nama',
        'foto',
        'nama_pengelola',
        'alamat',
        'website',
        'email',
        'kabkota_id',
        'rating',
        'latitude',
        'longitude',
        'jenis_faskes_id',
        'kategori_id',
    ];

    public function kabkota()
    {
        return $this->belongsTo(Kabkota::class);
    }

    public function jenisFaskes()
    {
        return $this->belongsTo(JenisFaskes::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    /**
     * Users who favorited this faskes
     */
    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'faskes_favorites')->withTimestamps();
    }

    /**
     * Ratings for this faskes
     */
    public function ratings()
    {
        return $this->hasMany(FaskesRating::class);
    }

    /**
     * Get average rating
     */
    public function getAverageRating()
    {
        return $this->ratings()->avg('rating');
    }

    /**
     * Get total ratings count
     */
    public function getTotalRatings()
    {
        return $this->ratings()->count();
    }
}
