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
        Schema::create('project_pricing_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->string('title'); // e.g., "Basic", "Standard", "Premium"
            $table->string('subtitle')->nullable(); // Short description
            $table->decimal('price', 10, 2);
            $table->json('features'); // Array of features included in this plan
            $table->boolean('is_popular')->default(false);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_pricing_plans');
    }
};
