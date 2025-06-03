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
            $table->string('nom');
            $table->string('email');
            $table->string('telephone')->nullable();
            $table->text('message')->nullable();
            $table->enum('statut', ['en_attente', 'confirme', 'refuse'])->default('en_attente');
            $table->timestamps();
            
            // Éviter les doublons (même email pour même formation)
            $table->unique(['formation_id', 'email']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('formation_user');
    }
};
