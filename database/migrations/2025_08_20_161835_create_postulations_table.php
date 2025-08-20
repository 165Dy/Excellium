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
        Schema::create('postulations', function (Blueprint $table) {
            $table->id();

            // UUID public unique (non modifiable)
            $table->uuid('uuid')->unique()->comment('Identifiant public et unique');

            // Lien vers emploi concerné (clé étrangère cascade)
            $table->foreignId('emploi_id')
                ->constrained('emplois')
                ->onDelete('cascade')
                ->comment('Offre d\'emploi liée');

            // Lien vers utilisateur (nullable si non connecté)
            $table->foreignId('user_id')->nullable()
                ->constrained('users')
                ->nullOnDelete()
                ->comment('Utilisateur postulant, si connecté');

            // Coordonnées / infos de contact (nom/prenom obligatoires)
            $table->string('nom', 80)->comment('Nom du postulant');
            $table->string('prenom', 80)->comment('Prénom du postulant');
            $table->string('email', 150)->comment('Email du postulant');
            $table->string('telephone', 25)->nullable()->comment('Téléphone du postulant');

            // Informations professionnelles
            $table->string('profession', 100)->nullable()->comment('Profession actuelle');
            $table->integer('experience_annees')->nullable()->comment('Années d\'expérience');
            $table->string('niveau_etude', 50)->nullable()->comment('Niveau d\'études');

            // Message, motivation ou lettre de motivation
            $table->text('message')->nullable()->comment('Message/Lettre de motivation du postulant');

            // Documents attachés (CV, lettre de motivation, etc.)
            $table->string('cv_path')->nullable()->comment('Chemin vers le CV uploadé');
            $table->string('lettre_motivation_path')->nullable()->comment('Chemin vers la lettre de motivation');
            $table->json('documents_supplementaires')->nullable()->comment('Documents supplémentaires (JSON)');

            // Statut du traitement (workflow de recrutement)
            $table->enum('statut', [
                'nouveau', 
                'en_cours', 
                'preselectionne', 
                'entretien_programme', 
                'entretien_realise',
                'accepte', 
                'rejete',
                'en_attente'
            ])->default('nouveau')->comment('Statut du traitement de candidature');

            // Évaluation et notes
            $table->integer('note_cv')->nullable()->comment('Note du CV (sur 10)');
            $table->text('commentaires_rh')->nullable()->comment('Commentaires des RH');
            $table->text('feedback_entretien')->nullable()->comment('Retour d\'entretien');

            // Marque si le traitement est fait automatiquement
            $table->boolean('traitement_automatique')->default(false)
                ->comment('Vrai si traitement automatisé');

            // Suivi d'ouverture / lecture
            $table->timestamp('viewed_at')->nullable()->comment('Date de consultation par le backoffice');
            $table->foreignId('viewed_by')->nullable()
                ->constrained('users')
                ->nullOnDelete()
                ->comment('Utilisateur ayant consulté la candidature');

            // Données de traçabilité
            $table->ipAddress('ip')->nullable()->comment('IP du postulant');
            $table->string('user_agent', 500)->nullable()->comment('User agent navigateur/device');

            // Source de la postulation
            $table->string('source', 100)->default('web')->comment('Source de postulation (web, mobile, campagne, etc.)');
            $table->string('utm_source', 50)->nullable()->comment('Source UTM de tracking');
            $table->string('utm_campaign', 50)->nullable()->comment('Campagne UTM de tracking');

            // Informations de matching automatique
            $table->decimal('score_matching', 5, 2)->nullable()->comment('Score de matching automatique (%)');
            $table->json('competences_detectees')->nullable()->comment('Compétences détectées automatiquement');

            // Dates importantes
            $table->timestamp('date_entretien')->nullable()->comment('Date prévue pour l\'entretien');
            $table->timestamp('date_reponse_prevue')->nullable()->comment('Date de réponse prévue au candidat');
            $table->timestamp('date_cloture')->nullable()->comment('Date de clôture du dossier');

            // Dates création / modification
            $table->timestamps();

            // Index pour accélérer les recherches fréquentes
            $table->index(['emploi_id', 'statut']);
            $table->index(['user_id', 'created_at']);
            $table->index(['email', 'emploi_id']);
            $table->index('uuid');
            $table->index('viewed_at');
            $table->index('statut');
            $table->index(['source', 'created_at']);
            $table->index('score_matching');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postulations');
    }
};
