<?php

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
        Schema::create('chambres', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->float('superficie');
            $table->string('image');
            $table->float('prixJour');
            $table->float('prixNuit');
            $table->text('Offres');
            $table->float('reduction');
            $table->foreignId('hotel_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chambres');
    }
};
