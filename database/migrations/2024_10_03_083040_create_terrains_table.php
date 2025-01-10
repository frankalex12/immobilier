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
        Schema::create('terrains', function (Blueprint $table) {
            $table->id();
            $table->float('superficie');
            $table->string('orientation');
            $table->string('topographie');
            $table->text('NatureSol');
            $table->text('StatusConstuctible');
            $table->float('prix');
            $table->boolean('isNegociable');
            $table->string('typeBail');
            $table->text('performanceEnergie');
            $table->text('risqueNaturel');
            $table->boolean('isAcheter');
            $table->foreignId('bien_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terrains');
    }
};
