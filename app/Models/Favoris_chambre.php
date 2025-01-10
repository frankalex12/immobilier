<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Favoris_chambre extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'chambre_id'];



    public function chambre(): BelongsTo
    {
        return $this->belongsTo(Chambre::class);
    }
}
