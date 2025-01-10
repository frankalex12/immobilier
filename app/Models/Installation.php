<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Installation extends Model
{
    use HasFactory;

    protected $fillable= ['installation'];

    function hotels():BelongsToMany{

        return $this->belongsToMany(Hotel::class);
    }
}
