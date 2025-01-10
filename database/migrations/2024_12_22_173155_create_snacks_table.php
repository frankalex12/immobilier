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
        Schema::create('snacks', function (Blueprint $table) {
            $table->id();
            $table->text('ambience');
            $table->text('style');
            $table->string('logo');
            $table->text('particularite');
            $table->text('Annulation_politique');
            $table->text('Modification_politique');
            $table->text('proposition_annulation_politique');
            $table->text('parking_infos');
            $table->foreignId('bien_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('snacks');
    }
};
