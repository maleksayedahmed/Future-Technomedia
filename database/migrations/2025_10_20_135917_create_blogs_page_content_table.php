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
        Schema::create('blogs_page_contents', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title')->default('My Last news and Updates');
            $table->text('hero_description')->nullable();
            $table->string('hero_subtitle')->default('Journal');
            $table->string('hero_background_image')->nullable();
            $table->string('hero_scroll_text')->default("Let's Start");
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs_page_contents');
    }
};
