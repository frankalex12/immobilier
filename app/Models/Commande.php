<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = ['user_id' ,'status','amount',  'curency', 'email', 'name', 'surname','phone_number','addresse','city','contry', 'state', 'zip_code' ];

    public function paniers()  {

        return $this->belongsTo(Commande_panier::class);
    }

}
