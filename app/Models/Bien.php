<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Bien extends Model
{
    use HasFactory;


    protected $fillable = [
        'titre',
        'quatier',
        'adress',
        'accessService',
        'ImageAvant',
        'proprietaire_id'
    ];

    public function terrain(): HasOne
    {

        return $this->hasOne(Terrain::class);
    }
    public function snacks()
    {

        return $this->hasMany(Snack::class);
    }


    function appartement(): HasOne
    {
        return $this->hasOne(Appartement::class);
    }

    function hotel(): HasOne
    {
        return $this->hasOne(Hotel::class);
    }

    public function images(): HasMany
    {

        return $this->hasMany(BienImg::class);
    }


    // relation de retour
    public function proprietaire(): BelongsTo
    {

        return $this->belongsTo(Proprietaire::class);
    }

    public function user(): BelongsTo
    {

        return $this->belongsTo(User::class);
    }


}
