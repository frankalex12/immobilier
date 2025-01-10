<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande_panier extends Model
{
    use HasFactory;

    protected $fillable = ['App\Models\Commande', 'App\Models\Panier'];
}
