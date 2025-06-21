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
}
