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

            $table->uuid('uuid')->unique();

            $table->enum('statut', ['en_attente', 'accepte', 'refuse'])->default('en_attente');

            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();

            $table->foreignId('opportunite_id')->constrained('opportunites')->onDelete('cascade');

            $table->timestamps();

            $table->index(['user_id', 'created_at']);
            $table->index(['user_id', 'opportunite_id']);
            $table->index('uuid');
            $table->index('statut');
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
