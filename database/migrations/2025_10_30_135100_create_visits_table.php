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
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('url', 500);
            $table->string('ip', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->string('referrer', 500)->nullable();
            $table->string('device', 50)->nullable(); // mobile, desktop, tablet
            $table->string('browser', 50)->nullable();
            $table->string('platform', 50)->nullable(); // windows, mac, linux, etc
            $table->string('country', 3)->nullable(); // ISO code
            $table->timestamp('visited_at');
            $table->index('visited_at');
            $table->index('url');
            $table->index(['visited_at', 'url']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
