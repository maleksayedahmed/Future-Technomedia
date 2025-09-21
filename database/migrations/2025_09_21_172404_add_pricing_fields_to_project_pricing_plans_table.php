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
        Schema::table('project_pricing_plans', function (Blueprint $table) {
            $table->enum('pricing_type', ['fixed', 'per_user', 'both'])->default('fixed')->after('price');
            $table->decimal('per_user_price', 10, 2)->nullable()->after('pricing_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_pricing_plans', function (Blueprint $table) {
            $table->dropColumn(['pricing_type', 'per_user_price']);
        });
    }
};
