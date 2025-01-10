<?php

namespace App\Models;
use Laravel\Sanctum\HasApiTokens;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'identifiant',
        'email',
        'email_verified_at',
        'password',
        'role',
        'photo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        // 'role',
        'email_verified_at',
        'identifiant'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function favoris_appartements(): HasMany{
        return $this->hasMany(Favoris_appartement::class);
    }

    function favoris_chambres() : HasMany {
        return $this->hasMany(Favoris_chambre::class);
    }
    function favoris_terrains() : HasMany {
        return $this->hasMany(Favoris_terrain::class);
    }
    function Favoris_produits() : HasMany {
        return $this->hasMany(Favoris_produit::class);
    }
    function Favoris_evenements() : HasMany {
        return $this->hasMany(Favoris_evenement::class);
    }
    function paniers() : HasMany {
        return $this->hasMany(Panier::class);
    }

}
