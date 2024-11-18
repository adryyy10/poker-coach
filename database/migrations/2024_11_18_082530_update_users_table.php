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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_coach')->default(false);
            $table->text('bio')->nullable();
            $table->json('specialty')->nullable();
            $table->json('stakes')->nullable();
            $table->float('price_per_hour')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['is_coach', 'bio', 'specialty', 'stakes', 'price_per_hour']);
        });
    }
};
