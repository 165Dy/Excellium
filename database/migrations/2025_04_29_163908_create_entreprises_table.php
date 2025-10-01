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
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('activite')->nullable();
            $table->string('image')->nullable();
            $table->string('situation_geographique')->nullable();
            $table->string('rccm', 50)->nullable();
            $table->string('ncc', 50)->nullable();
            $table->string('nom_dirigeant', 150)->nullable();
            $table->string('tdu', 50)->nullable();
            $table->boolean('assist')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entreprises');
    }
};
