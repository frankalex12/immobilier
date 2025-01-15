<?php

use App\Http\Controllers\Api\V1\ServiceController;
use App\Http\Controllers\Api\V1\ApparementController;
use App\Http\Controllers\Api\V1\AppartementImageController;
use App\Http\Controllers\Api\V1\AppartementShowController;
use App\Http\Controllers\Api\V1\Geust\AppartementController as GeustAppartementController;
use App\Http\Controllers\Api\V1\ChambreController;
use App\Http\Controllers\Api\V1\ChambreImageController;
use App\Http\Controllers\Api\V1\ChambreShowController;
use App\Http\Controllers\Api\V1\CommandeDetailController;
use App\Http\Controllers\Api\V1\DeleteBienImageController;
use App\Http\Controllers\Api\V1\EquipementController;
use App\Http\Controllers\Api\V1\EvenementSnackController;
use App\Http\Controllers\Api\V1\FavorisAppartementController;
use App\Http\Controllers\Api\V1\FavorisChambreController;
use App\Http\Controllers\Api\V1\FavorisEvenementController;
use App\Http\Controllers\Api\V1\FavorisProuitController;
use App\Http\Controllers\Api\V1\FavorisTerrainController;
use App\Http\Controllers\Api\V1\Geust\ChambreController as GeustChambreController;
use App\Http\Controllers\Api\V1\Geust\HotelController as GeustHotelController;
use App\Http\Controllers\Api\V1\Geust\HotelShowController;
use App\Http\Controllers\Api\V1\Geust\PackController;
use App\Http\Controllers\Api\V1\Geust\PackShowController;
use App\Http\Controllers\Api\V1\Geust\SnackController;
use App\Http\Controllers\Api\V1\Geust\TerrainController as GeustTerrainController;
use App\Http\Controllers\Api\V1\HoraireSnackController;
use App\Http\Controllers\Api\V1\HotelController;
use App\Http\Controllers\Api\V1\HotelImageController;
use App\Http\Controllers\Api\V1\InstallationController;
use App\Http\Controllers\Api\V1\PackHotelController;
use App\Http\Controllers\Api\V1\PackItemsController;
use App\Http\Controllers\Api\V1\PanierAppartementController;
use App\Http\Controllers\Api\V1\PanierChambreController;
use App\Http\Controllers\Api\V1\PanierEvenementController;
use App\Http\Controllers\Api\V1\PanierPackController;
use App\Http\Controllers\Api\V1\PanierProuitController;
use App\Http\Controllers\Api\V1\ProduitSnackController;
use App\Http\Controllers\Api\V1\SanckController;
use App\Http\Controllers\Api\V1\SnackimageController;
use App\Http\Controllers\Api\V1\SnackShowController;
use App\Http\Controllers\Api\V1\TerrainController;
use App\Http\Controllers\Api\V1\TerrainImageController;
use App\Http\Controllers\Api\V1\TerrainShowController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ProfilController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommandeAdminController;
use App\Http\Controllers\CommandeController;
use Illuminate\Support\Facades\Route;

// Authentification ok
Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);
// user routes
Route::middleware('auth:sanctum')->prefix('user/')
    ->group(function () {
        Route::get('logout', [LogoutController::class, 'Logout']);
        Route::get('profil', [ProfilController::class, 'profil']);
        // appartements
        Route::post('favoris-appartement', [FavorisAppartementController::class, 'store']);
        Route::get('favoris-appartement', [FavorisAppartementController::class, 'index']);
        Route::delete('favoris-appartement/{favoris_appartement}', [FavorisAppartementController::class, 'destroy']);
        // chambres
        Route::post('favoris-chambre', [FavorisChambreController::class, 'store']);
        Route::get('favoris-chambre', [FavorisChambreController::class, 'index']);
        Route::delete('favoris-chambre/{favoris_chambre}', [FavorisChambreController::class, 'destroy']);
        // terrains
        Route::post('favoris-terrain', [FavorisTerrainController::class, 'store']);
        Route::get('favoris-terrain', [FavorisTerrainController::class, 'index']);
        Route::delete('favoris-terrain/{favoris_terrain}', [FavorisTerrainController::class, 'destroy']);
        // produits
        Route::post('favoris-produit', [FavorisProuitController::class, 'store']);
        Route::get('favoris-produit', [FavorisProuitController::class, 'index']);
        Route::delete('favoris-produit/{favoris_produit}', [FavorisProuitController::class, 'destroy']);
        // evenements
        Route::post('favoris-evenement', [FavorisEvenementController::class, 'store']);
        Route::get('favoris-evenement', [FavorisEvenementController::class, 'index']);
        Route::delete('favoris-evenement/{favoris_evenement}', [FavorisEvenementController::class, 'destroy']);
        // panier
        Route::get('panier/evenementSnack/{evenementSnack}',PanierEvenementController::class);//ok
        Route::post('panier/pack/{pack}',PanierPackController::class);//ok
        Route::post('panier/appartements/{appartement}',PanierAppartementController::class);//ok
        Route::post('panier/chambres/{chambre}',PanierChambreController::class);//ok
        Route::post('panier/produits/{produitSnack}',[PanierProuitController::class,'store']);//ok
        Route::get('panier',[PanierProuitController::class,'index']); //ok //liste les elements panier
        Route::delete('panier/{panier}/delete',[PanierProuitController::class,'destroy']);//ok //supprimer panier
        // commande
        Route::post('commande',[CommandeController::class,'store']);//ok
        Route::get('commande',[CommandeController::class,'index']);//ok
        Route::get('commande/{commande}/annuler',[CommandeController::class,'annuler']);//ok
        Route::get('/commandes/{commande}', CommandeDetailController::class);

    });


// routes admin finalisees
Route::middleware(['auth:sanctum','admin'])->prefix('/admin')
    ->group(function () {
        Route::apiResource('/services', ServiceController::class);
        Route::apiResource('/equipements', EquipementController::class);
        Route::apiResource('/installations', InstallationController::class);
        Route::apiResource('/appartements', ApparementController::class);
        Route::apiResource('/hotels', HotelController::class);
        Route::apiResource('hotels/{hotel}/chambres', ChambreController::class);
        Route::apiResource('hotels/{hotel}/packs', PackHotelController::class);
        // update delete
        Route::apiResource('hotels/{hotel}/packs/{pack}/packitems', PackItemsController::class);
        Route::apiResource('/terrains', TerrainController::class);
        // update
        Route::apiResource('/snacks', SanckController::class);
        Route::apiResource('/snacks/{snack}/produits', ProduitSnackController::class);
        Route::apiResource('/snacks/{snack}/evenements', EvenementSnackController::class);
        Route::apiResource('/snacks/{snack}/horaires', HoraireSnackController::class);
        //images bien  store et delete ok
        Route::post('/terrains/{terrain}/images', TerrainImageController::class);
        Route::post('/hotels/{hotel}/images',HotelImageController::class);
        Route::post('/appartements/{appartement}/images',AppartementImageController::class);
        Route::post('/snacks/{snack}/images', SnackimageController::class);
        Route::delete('/bien/{bienImg}/images', DeleteBienImageController::class);
        Route::get('/commandes', CommandeAdminController::class);

        // Route::post('/hotels/{hotel}/chambres/{chambre}/images',ChambreImageController::class);
    });
// routes Visiteurs finalisees et fonctionnelles
Route::prefix('geust/')->group(function () {
    Route::get('terrains', GeustTerrainController::class);
    Route::get('terrains/{terrains}', TerrainShowController::class);
    Route::get('locations', GeustAppartementController::class);
    Route::get('locations/{location}', AppartementShowController::class);
    Route::get('chambres', GeustChambreController::class);
    Route::get('chambres/{chambre}', ChambreShowController::class);
    Route::get('snacks', SnackController::class);
    Route::get('snacks/{snack}', SnackShowController::class);
    Route::get('packs', PackController::class);
    Route::get('packs/{pack}', PackShowController::class);
    Route::get('hotels', GeustHotelController::class);
    Route::get('hotels/{hotel}', HotelShowController::class);
});


