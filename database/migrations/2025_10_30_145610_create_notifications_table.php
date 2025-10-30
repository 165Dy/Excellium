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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            
            // Type de notification
            $table->enum('type', [
                'formation_inscription',
                'formation_statut',
                'candidature_nouvelle',
                'candidature_statut',
                'postulation_nouvelle',
                'postulation_statut',
                'service_inscription',
                'service_statut',
                'produit_selection',
                'system',
                'autre'
            ]);
            
            // Titre et contenu
            $table->string('title');
            $table->text('message');
            
            // Données liées
            $table->foreignId('user_id')->nullable()->comment('Utilisateur concerné')->constrained('users')->nullOnDelete();
            $table->string('user_name')->nullable()->comment('Nom de l\'utilisateur si user_id null');
            $table->string('user_email')->nullable()->comment('Email de l\'utilisateur');
            
            // Référence vers l'entité concernée (polymorphique)
            $table->string('related_type')->nullable()->comment('Type d\'entité (Formation, Emploi, etc.)');
            $table->unsignedBigInteger('related_id')->nullable()->comment('ID de l\'entité');
            
            // Métadonnées
            $table->json('data')->nullable()->comment('Données supplémentaires (JSON)');
            
            // URL d'action
            $table->string('action_url', 500)->nullable()->comment('Lien vers l\'action');
            $table->string('action_text')->nullable()->comment('Texte du bouton d\'action');
            
            // Statut de lecture
            $table->boolean('is_read')->default(false);
            $table->timestamp('read_at')->nullable();
            
            // Priorité
            $table->enum('priority', ['low', 'normal', 'high'])->default('normal');
            
            // Icône/Badge
            $table->string('icon')->nullable()->comment('Classe d\'icône Remix Icon');
            $table->string('badge_color')->default('primary')->comment('Couleur du badge');
            
            $table->timestamps();
            
            // Index pour performances
            $table->index(['is_read', 'created_at']);
            $table->index(['user_id', 'is_read']);
            $table->index('type');
            $table->index(['related_type', 'related_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
