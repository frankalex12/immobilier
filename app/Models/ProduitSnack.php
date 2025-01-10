<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class ProduitSnack extends Model
{
    use HasFactory;

    protected $fillable = [
        'produit',
        'photo',
        'prix',
        'description',
        'isPublier',
        'snack_id'
    ];

    public function snack(): BelongsTo
    {
        return $this->BelongsTo(Snack::class);
    }

    public function panier(): MorphMany
    {
        return $this->morphMany(Panier::class, 'panierable');
    }
}
