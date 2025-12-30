<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('menu_items', function (Blueprint $table) {
        $table->id();
        $table->string('title');            // e.g., "Home"
        $table->string('route')->nullable(); // e.g., "home" (The Laravel route name)
        $table->string('url')->nullable();   // e.g., "/about-us" (If not using named routes)
        $table->integer('order')->default(0); // To sort items (1, 2, 3...)
        $table->boolean('is_active')->default(true); // To enable/disable
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
