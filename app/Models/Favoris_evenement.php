<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Favoris_evenement extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','evenement_snack_id'];

    public function evenement(): BelongsTo
    {
        return $this->belongsTo(EvenementSnack::class);
    }

    public function panier(): MorphMany
    {
        return $this->morphMany(Panier::class,'panierable');
    }
}
