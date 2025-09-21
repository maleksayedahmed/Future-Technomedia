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
        Schema::create('facts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(); // For the main section title
            $table->integer('number')->default(0); // The animated number
            $table->string('label'); // The text below the number
            $table->integer('order')->default(0); // For ordering facts
            $table->boolean('is_active')->default(true); // To show/hide facts
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facts');
    }
};
