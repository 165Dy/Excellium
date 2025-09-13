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
            $table->string('lettre_motivation')->nullable();
            $table->text('message')->nullable(); // Message de candidature
            $table->enum('statut', [
                'nouveau', 
                'en_cours', 
                'preselectionne', 
                'entretien_programme', 
                'entretien_realise',
                'accepte', 
                'rejete',            
                'en_attente'
            ])->default('nouveau');
            
            // Évaluation et notes
            $table->integer('note_cv')->nullable()->comment('Note du CV (sur 10)');
            $table->text('commentaires_rh')->nullable()->comment('Commentaires des RH');
            $table->text('feedback_entretien')->nullable()->comment('Retour d\'entretien');
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
