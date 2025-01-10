<?php

namespace Database\Seeders;

use App\Models\Appartement;
use App\Models\Bien;
use App\Models\BienImg;
use App\Models\Chambre;
use App\Models\Equipement;
use App\Models\EvenementSnack;
use App\Models\Horaire;
use App\Models\Hotel;
use App\Models\Installation;
use App\Models\Panier;
use App\Models\ProduitSnack;
use App\Models\Proprietaire;
use App\Models\Role;
use App\Models\Service;
use App\Models\Snack;
use App\Models\Terrain;
use App\Models\User;
use Database\Factories\ImageFactory;
use Illuminate\Database\Eloquent\Factories\Sequence;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Service::factory(10)->create();
        // Bien::factory(10)->create();

        Service::factory(5)->state(new Sequence(
            ['service'=>'Transport'],
            ['service'=>'Menager'],
            ['service'=>'Compteur Eneo'],
            ['service'=>'Prepaye'],
            ['service'=>'Forage'],
        ))->create();

        Installation::factory(5)->state(new Sequence(
            ['installation'=>'Restaurant'],
            ['installation'=>'Spa'],
            ['installation'=>'Piscine'],
            ['installation'=>'Salle de Sport'],
            ['installation'=>'Bar'],
        ))->create();

        Equipement::factory(5)->state(new Sequence(
            ['equipement'=>'Wifi'],
            ['equipement'=>'Tv'],
            ['equipement'=>'minibar'],
            ['equipement'=>'Climatiser'],
        ))->create();



        // Role::factory(2)->state(new Sequence(
        //     ['role'=>'user'],
        //     ['role'=>'admin']
        // ))->has(
        User::factory()->count(3)->create();

        Proprietaire::factory(5)->has(Bien::factory()->count(5)->has(Terrain::factory()->count(5)))->create();
        Proprietaire::factory(5)->has(Bien::factory()->count(5)->has(Hotel::factory()->has(Chambre::factory()->count(5))))->create();
        Proprietaire::factory(5)->has(Bien::factory()->count(5)->has(Appartement::factory()->count(5)))->create();
        Proprietaire::factory(5)->has(Bien::factory()->count(5)->has(Snack::factory()->count(5)->has(Horaire::factory()->count(5))))->create();
        Proprietaire::factory(5)->has(Bien::factory()->count(5)->has(Snack::factory()->count(5)->has(ProduitSnack::factory()->count(5))))->create();
        Proprietaire::factory(5)->has(Bien::factory()->count(5)->has(Snack::factory()->count(5)->has(EvenementSnack::factory()->count(5))))->create();
        // Bien::factory()->has(BienImg::factory()->count(20))->create();
        // Bien::factory()->has(Appartement::factory()->count(5))->create();
        // Proprietaire::factory(5)->has(Bien::factory()->count(5)->has(Hotel::factory()->has(Installation::factory()->count(5))))->create();



    }
}
