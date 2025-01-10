<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'isCertifications',
        'annulation',
        'isAnimal',
        'isAreasFumeurs',
        'bien_id'
    ];

    function chambres(): HasMany
    {
        return $this->hasMany(Chambre::class);
    }

    // return relationship function

    function bien(): BelongsTo
    {
        return $this->belongsTo(Bien::class);
    }


    function installations(): BelongsToMany{

        return $this->belongsToMany(Installation::class);
    }

    function packs(): HasMany
    {
        return $this->hasMany(Pack::class);
    }

}
