<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Horaire extends Model
{
    use HasFactory;

    protected $table = 'horaires';
    // protected $primaryKey = 'snack_id';
    // protected $foreignKey = 'snack_id';


    protected $fillable = [
        'jour',
        'ouverture',
        'fermeture',
        'snack_id'
    ];
    public function snack(): BelongsTo
    {
        return $this->BelongsTo(Snack::class);
    }
}
