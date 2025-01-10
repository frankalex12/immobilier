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
        Schema::create('produit_snacks', function (Blueprint $table) {
            $table->id();
            $table->string('produit');
            $table->string('photo')->nullable();
            $table->float('prix');
            $table->text('description');
            $table->boolean('isPublier')->default(0);
            $table->foreignId('snack_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit_snacks');
    }
};
