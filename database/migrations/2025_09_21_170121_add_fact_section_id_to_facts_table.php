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
        Schema::table('facts', function (Blueprint $table) {
            $table->foreignId('fact_section_id')->nullable()->constrained('fact_sections')->onDelete('cascade');
            $table->dropColumn('title'); // Remove the title column as it's now in fact_sections
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('facts', function (Blueprint $table) {
            $table->dropForeign(['fact_section_id']);
            $table->dropColumn('fact_section_id');
            $table->string('title')->nullable(); // Restore the title column
        });
    }
};
