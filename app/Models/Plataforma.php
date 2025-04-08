<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Plataforma extends Model
{
    use HasFactory;

    protected $fillable = ['nom']; // Campos que se pueden asignar masivamente

    /**
     * Get all of the users that are assigned this platform.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * The juegos that belong to the Plataforma.
     */
    public function juegos(): BelongsToMany
    {
        return $this->belongsToMany(Joc::class);
    }
}