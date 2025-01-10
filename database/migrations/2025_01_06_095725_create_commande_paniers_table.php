<?php

use App\Models\Commande;
use App\Models\Panier;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commande_paniers', function (Blueprint $table) {
            $table->id();
            $table->foreignId(Commande::class);
            $table->foreignId(Panier::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande_paniers');
    }
};
