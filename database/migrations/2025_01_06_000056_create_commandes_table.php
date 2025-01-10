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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('amount');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('curency')->default('XAF');
            $table->string('email');
            $table->string('name');
            $table->string('surname');
            $table->string('phone_number');
            $table->string('addresse');
            $table->string('city');
            $table->string('contry')->nullable();
            $table->string('state')->default('commander');
            $table->string('zip_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
