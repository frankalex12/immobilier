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
        Schema::create('evenement_snacks', function (Blueprint $table) {
            $table->id();
            $table->string('evenement');
            $table->text('Description');
            $table->string('Affiche')->nullable();
            $table->float('prix');
            $table->date('date')->nullable();
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
        Schema::dropIfExists('evenement_snacks');
    }
};
