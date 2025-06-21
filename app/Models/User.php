<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Check if user is admin
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Check if user is regular user
     */
    public function isUser(): bool
    {
        return $this->role === 'user';
    }

    /**
     * User's favorite faskes
     */
    public function favoritesFaskes()
    {
        return $this->belongsToMany(Faskes::class, 'faskes_favorites')->withTimestamps();
    }

    /**
     * Check if user has favorited a faskes
     */
    public function hasFavorited($faskesId)
    {
        return $this->favoritesFaskes()->where('faskes_id', $faskesId)->exists();
    }

    /**
     * User's ratings for faskes
     */
    public function faskesRatings()
    {
        return $this->hasMany(FaskesRating::class);
    }

    /**
     * Get user's rating for a specific faskes
     */
    public function getRatingForFaskes($faskesId)
    {
        return $this->faskesRatings()->where('faskes_id', $faskesId)->first();
    }
}
