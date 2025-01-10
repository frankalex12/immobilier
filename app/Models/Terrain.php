<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Terrain extends Model
{
    use HasFactory;

    protected $fillable = [
        'superficie',
        'orientation',
        'topographie',
        'NatureSol',
        'StatusConstuctible',
        'prix',
        'isNegociable',
        'typeBail',
        'performanceEnergie',
        'risqueNaturel',
        'isAcheter',
        'bien_id'
    ];

    public function bien(): BelongsTo
    {

        return $this->belongsTo(Bien::class);
    }


    public function favoris(): MorphMany
    {
        return $this->morphMany(Favoris::class,'favoriable');
    }
}
