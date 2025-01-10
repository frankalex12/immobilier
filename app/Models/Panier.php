<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Panier extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','fin','panierable_type','panierable_id','debut','prix'];

    public function panierable() : MorphTo {

        return $this->morphTo();
    }


}
