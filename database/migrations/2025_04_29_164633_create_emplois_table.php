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
        Schema::create('emplois', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');
            $table->string('entreprise');
            $table->enum('type_contrat', ['CDI', 'CDD', 'Stage', 'Freelance', 'Alternance']);
            $table->decimal('salaire_min', 10, 2)->nullable();
            $table->decimal('salaire_max', 10, 2)->nullable();
            $table->string('localisation');
            $table->text('competences_requises')->nullable();
            $table->string('experience_requise')->nullable(); // "Débutant", "1-3 ans", "3-5 ans", "5+ ans"
            $table->string('niveau_etude')->nullable(); // "Bac", "Bac+2", "Bac+3", "Bac+5", etc.
            $table->integer('nombre_postes')->default(1);
            $table->date('date_expiration');
            $table->enum('statut', ['active', 'fermee', 'pourvue'])->default('active');
            $table->string('contact_email')->nullable();
            $table->string('contact_telephone')->nullable();
            $table->text('avantages')->nullable(); // Avantages du poste
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emplois');
    }
};
