<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favoris_terrain extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','terrain_id'];

    public function terrain(): BelongsTo
    {
        return $this->belongsTo(Terrain::class);
    }
}
