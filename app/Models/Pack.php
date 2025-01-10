<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Pack extends Model
{
    use HasFactory;

    protected $fillable = [
        'prix',
        'type',
        'path',
        'App\Models\Hotel',
    ];

    public function packitems()  {

        return $this->hasMany(PackItems::class);
    }

    public function panier(): MorphMany
    {
        return $this->morphMany(Panier::class,'panierable');
    }
    public function hotel()  {
        return $this->belongsTo(Hotel::class);
    }

}
