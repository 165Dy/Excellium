<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('opportunites', function (Blueprint $table) {
            $table->id();

            // Titre de l'opportunité (ex: appel d'offre, projet...)
            $table->string('titre', 255);

            // Description détaillée
            $table->text('description')->nullable();

            // Slug pour URL friendly
            $table->string('slug')->unique();

            // Catégorie liée (ex: type d'opportunité)
            $table->foreignId('categorie_id')->nullable()->constrained('categories')->nullOnDelete();

            // Statut de l'opportunité (ex: actif, fermé, en attente)
            $table->enum('statut', ['brouillon', 'en_ligne', 'ferme', 'archive'])->default('brouillon');

            // Date de début (publication)
            $table->dateTime('date_debut')->nullable();

            // Date de fin (cloture des candidatures)
            $table->dateTime('date_fin')->nullable();

            // Lieu / Zone géographique (optionnel)
            $table->string('lieu')->nullable();

            // Contact ou coordonnés pour questions (optionnel)
            $table->string('contact_email')->nullable();

            // Champ JSON pour critères supplémentaires (ex : compétences requises, budget)
            $table->json('criteres')->nullable();

            // Information complémentaire (ex : jointures fichiers, liens)
            $table->json('informations')->nullable();

            $table->string('fichier_joint')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('opportunites');
    }
};
