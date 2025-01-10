<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'App\Models\Pack',
        'path',
        'items_name'
    ];

    public function pack()  {

        return $this->belongsTo(Pack::class);
    }
}
