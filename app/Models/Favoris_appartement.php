<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favoris_appartement extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','appartements_id'];

    public function appartement(): BelongsTo
    {
        return $this->belongsTo(Appartement::class);
    }
}
