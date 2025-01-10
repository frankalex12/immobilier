<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Appartement extends Model
{
    use HasFactory;

    protected $fillable = [
        'pieces',
        'superficie',
        'etage',
        'isAcenseur',
        'isBalcon',
        'isTerrasse',
        'MontantMensuel',
        'MontantGarantie',
        'typeBail',
        'PerformenceEnergie',
        'RisqueNaturel',
        'DebutBail',
        'FinBail',
        'CondRealisation',
        'isOccupe',
        'bien_id'
    ];

    public function bien(): BelongsTo
    {

        return $this->belongsTo(Bien::class);
    }


    public function panier(): MorphMany
    {
        return $this->morphMany(Panier::class,'panierable');
    }
}
