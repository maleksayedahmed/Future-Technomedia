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
        Schema::table('projects', function (Blueprint $table) {
            // Add new fields for enhanced project structure
            $table->string('video_url')->nullable()->after('description');
            $table->string('pdf_file')->nullable()->after('video_url');
            
            // Pricing structure fields
            $table->enum('pricing_type', ['fixed', 'plans', 'none'])->default('none')->after('pdf_file');
            $table->decimal('fixed_price', 10, 2)->nullable()->after('pricing_type');
            $table->decimal('discount_amount', 10, 2)->nullable()->after('fixed_price');
            $table->enum('discount_type', ['percentage', 'amount'])->nullable()->after('discount_amount');
            
            // Update existing fields
            $table->renameColumn('category', 'project_category');
            $table->renameColumn('project_url', 'live_url');
            $table->string('github_url')->nullable()->after('live_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Remove new columns
            $table->dropColumn([
                'video_url',
                'pdf_file', 
                'pricing_type',
                'fixed_price',
                'discount_amount',
                'discount_type',
                'github_url'
            ]);
            
            // Revert column renames
            $table->renameColumn('project_category', 'category');
            $table->renameColumn('live_url', 'project_url');
        });
    }
};
