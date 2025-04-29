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
        Schema::create('inscriptions_formations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('formation_id')->constrained('formations');
            $table->foreignId('user_id')->constrained('users');
            $table->enum('statut', ['attente','accepte','refuse'])->default('attente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions_formations');
    }
};
