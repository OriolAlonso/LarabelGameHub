<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Joc extends Model
{
    use HasFactory;

    protected $fillable = ['titol', 'datallancament', 'descripcio'];

    /**
     * The users that belong to the Joc.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * The plataformas that belong to the Joc.
     */
    public function plataformas(): BelongsToMany
    {
        return $this->belongsToMany(Plataforma::class);
    }
}