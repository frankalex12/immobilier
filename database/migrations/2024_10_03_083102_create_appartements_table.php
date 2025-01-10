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
        Schema::create('appartements', function (Blueprint $table) {
            $table->id();
            $table->integer('pieces');
            $table->float('superficie');
            $table->integer('etage');
            $table->boolean('isAcenseur');
            $table->boolean('isBalcon');
            $table->boolean('isTerrasse');
            $table->float('MontantMensuel');
            $table->float('MontantGarantie');
            $table->string('typeBail');
            $table->text('PerformenceEnergie');
            $table->text('RisqueNaturel');
            $table->date('DebutBail');
            $table->date('FinBail');
            $table->text('CondRealisation');
            $table->boolean('isOccupe');
            $table->foreignId('bien_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appartements');
    }
};
