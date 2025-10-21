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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();

            // Hero Section
            $table->string('hero_title')->nullable();
            $table->string('hero_subtitle')->nullable();
            $table->text('hero_description')->nullable();

            // Services Section
            $table->string('services_title')->nullable();
            $table->string('services_subtitle')->nullable();
            $table->json('services')->nullable(); // Array of services with title, description, icon, etc.

            // Video Section
            $table->string('video_title')->nullable();
            $table->text('video_description')->nullable();
            $table->string('video_button_text')->nullable();
            $table->string('video_button_url')->nullable();

            // CTA Section
            $table->string('cta_title')->nullable();
            $table->string('cta_button_text')->nullable();
            $table->string('cta_button_url')->nullable();

            // Meta
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
