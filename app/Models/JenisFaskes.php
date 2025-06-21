<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisFaskes extends Model
{
    use HasFactory;

    protected $table = 'jenis_faskes';

    protected $fillable = [
        'nama',
    ];

    public function faskes()
    {
        return $this->hasMany(Faskes::class);
    }
}
