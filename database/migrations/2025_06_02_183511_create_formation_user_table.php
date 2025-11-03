<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('formation_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('formation_id')->constrained('formations')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users'); // nullable pour inscriptions publiques
            
            // Colonnes pour inscriptions publiques (sans compte utilisateur)
            $table->string('nom')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone', 20)->nullable();
            
            $table->text('message')->nullable();
            $table->enum('statut', ['en_attente', 'confirme', 'refuse'])->default('en_attente');
            $table->timestamps();
            
            $table->unique(['formation_id', 'email'], 'unique_formation_user');
            // La vérification des doublons se fera au niveau applicatif (formation_id + email)
        });
    }

    public function down()
    {
        Schema::dropIfExists('formation_user');
    }
};
