<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Chambre extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'superficie',
        'image',
        'prixJour',
        'prixNuit',
        'Offres',
        'reduction',
        'hotel_id'
    ];

    public function hotel()
    {

        return $this->belongsTo(Hotel::class);
    }

    public function panier(): MorphMany
    {
        return $this->morphMany(Panier::class,'panierable');
    }

}
