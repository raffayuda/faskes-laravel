<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabkota extends Model
{
    use HasFactory;

    protected $table = 'kabkota';

    protected $fillable = [
        'nama',
        'latitude',
        'longitude',
        'provinsi_id',
    ];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function faskes()
    {
        return $this->hasMany(Faskes::class);
    }
}
