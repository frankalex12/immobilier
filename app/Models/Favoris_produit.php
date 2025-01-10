<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favoris_produit extends Model
{
    use HasFactory;

    protected $fillable =['user_id','produit_snack_id'];

    public function produit(): BelongsTo
    {
        return $this->belongsTo(ProduitSnack::class);
    }
}
