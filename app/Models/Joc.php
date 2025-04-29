<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Joc extends Model
{
    use HasFactory;

    protected $fillable = ['titol', 'descripcio', 'datallancament'];

    public function usuaris(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'usuaris_jocs');
    }
    
}