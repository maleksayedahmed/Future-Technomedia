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
        Schema::create('fact_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(); // Section main title
            $table->string('subtitle')->nullable(); // Section subtitle (like "Numbers")
            $table->text('description')->nullable(); // Optional description
            $table->boolean('is_active')->default(true); // Section visibility
            $table->integer('order')->default(0); // Display order
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fact_sections');
    }
};
