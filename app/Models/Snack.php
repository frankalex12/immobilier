<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Snack extends Model
{
    use HasFactory;

    // protected $table = 'snacks';

    // protected $primaryKey = 'snack_id';

    protected $fillable = [
        'ambience',
        'style',
        'particularite',
        'Annulation_politique',
        'Modification_politique',
        'proposition_annulation_politique',
        'parking_infos',
        'bien_id',
        'logo'
    ];

    public function bien(): BelongsTo
    {
        return $this->belongsTo(Bien::class);
    }

    public function horaires(): HasMany
    {
        return $this->hasMany(Horaire::class);
    }
    public function produitSnacks(): HasMany
    {
        return $this->hasMany(ProduitSnack::class);
    }
    public function evenementSnack(): HasMany
    {
        return $this->hasMany(EvenementSnack::class);
    }


}
