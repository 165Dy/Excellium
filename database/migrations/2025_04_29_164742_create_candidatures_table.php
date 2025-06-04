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
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emploi_id')->constrained()->onDelete('cascade');
            $table->string('nom');
            $table->string('email');
            $table->string('telephone');
            $table->string('cv_path')->nullable();
            $table->text('lettre_motivation')->nullable();
            $table->text('message')->nullable(); // Message de candidature
            $table->enum('statut', ['en_attente', 'accepte', 'refuse'])->default('en_attente');
            $table->timestamps();
            
            // Éviter les doublons
            $table->unique(['email', 'emploi_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatures');
    }
};
