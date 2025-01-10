<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BienImg extends Model
{
    use HasFactory;

    protected $fillable = ['path', 'name', 'bien_id'];

    public  function bien(): BelongsTo
    {
        return $this->belongsTo(Bien::class);
    }
}
