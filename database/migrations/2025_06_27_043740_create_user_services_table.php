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
        Schema::create('users_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
            $table->text('description');
            $table->decimal('prix_indicatif', 10, 2)->nullable();
            $table->integer('duree_estimee')->nullable();
            $table->json('caracteristiques')->nullable();
            $table->enum('type_contrat', [
                'mensuel_renouvelable', 
                'factuel_objectif', 
                'annuel', 
                'ponctuel'
            ])->default('mensuel_renouvelable');

            $table->enum('statut', [
                'brouillon', 
                'en_negociation', 
                'valide', 
                'en_cours', 
                'suspendu', 
                'termine', 
                'annule'
            ])->default('brouillon');

            $table->date('date_debut')->nullable();
            $table->date('date_fin_prevue')->nullable();
            $table->date('date_fin_reelle')->nullable();
            $table->date('prochaine_echeance')->nullable();

            $table->enum('frequence_facturation', [
                'mensuelle', 
                'trimestrielle', 
                'fin_mission', 
                'sur_mesure'
            ])->default('mensuelle');
            
            $table->text('objectifs')->nullable();
            $table->boolean('renouvellement_auto')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_services');
    }
};
