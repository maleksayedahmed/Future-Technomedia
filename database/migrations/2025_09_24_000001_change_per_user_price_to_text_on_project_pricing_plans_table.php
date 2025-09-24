<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $connection = config('database.default');
        $driver = config("database.connections.$connection.driver");

        if ($driver === 'sqlite') {
            // SQLite doesn't support altering column types directly
            Schema::table('project_pricing_plans', function (Blueprint $table) {
                // Ensure the new columns exist where needed in case of partial schemas
            });

            Schema::create('project_pricing_plans_tmp', function (Blueprint $table) {
                $table->id();
                $table->foreignId('project_id')->constrained()->onDelete('cascade');
                $table->string('title');
                $table->string('subtitle')->nullable();
                $table->decimal('price', 10, 2);
                $table->enum('pricing_type', ['fixed', 'per_user', 'both'])->default('fixed');
                $table->text('per_user_price')->nullable();
                $table->json('features');
                $table->boolean('is_popular')->default(false);
                $table->integer('order')->default(0);
                $table->timestamps();
            });

            // Copy data casting per_user_price to text
            DB::statement('INSERT INTO project_pricing_plans_tmp (id, project_id, title, subtitle, price, pricing_type, per_user_price, features, is_popular, "order", created_at, updated_at)
                SELECT id, project_id, title, subtitle, price, pricing_type, per_user_price, features, is_popular, "order", created_at, updated_at FROM project_pricing_plans');

            Schema::drop('project_pricing_plans');
            Schema::rename('project_pricing_plans_tmp', 'project_pricing_plans');
        } else {
            // Use driver-specific SQL to avoid requiring doctrine/dbal
            if ($driver === 'mysql' || $driver === 'mariadb') {
                DB::statement('ALTER TABLE project_pricing_plans MODIFY per_user_price TEXT NULL');
            } elseif ($driver === 'pgsql') {
                DB::statement('ALTER TABLE project_pricing_plans ALTER COLUMN per_user_price TYPE TEXT');
            } elseif ($driver === 'sqlsrv') {
                DB::statement('ALTER TABLE project_pricing_plans ALTER COLUMN per_user_price NVARCHAR(MAX) NULL');
            } else {
                // Fallback: try schema change (may require doctrine/dbal)
                Schema::table('project_pricing_plans', function (Blueprint $table) {
                    $table->text('per_user_price')->nullable()->change();
                });
            }
        }
    }

    public function down(): void
    {
        $connection = config('database.default');
        $driver = config("database.connections.$connection.driver");

        if ($driver === 'sqlite') {
            Schema::create('project_pricing_plans_tmp', function (Blueprint $table) {
                $table->id();
                $table->foreignId('project_id')->constrained()->onDelete('cascade');
                $table->string('title');
                $table->string('subtitle')->nullable();
                $table->decimal('price', 10, 2)->nullable();
                $table->enum('pricing_type', ['fixed', 'per_user', 'both'])->default('fixed');
                $table->decimal('per_user_price', 10, 2)->nullable();
                $table->json('features');
                $table->boolean('is_popular')->default(false);
                $table->integer('order')->default(0);
                $table->timestamps();
            });

            DB::statement('INSERT INTO project_pricing_plans_tmp (id, project_id, title, subtitle, price, pricing_type, per_user_price, features, is_popular, "order", created_at, updated_at)
                SELECT id, project_id, title, subtitle, price, pricing_type, per_user_price, features, is_popular, "order", created_at, updated_at FROM project_pricing_plans');

            Schema::drop('project_pricing_plans');
            Schema::rename('project_pricing_plans_tmp', 'project_pricing_plans');
        } else {
            if ($driver === 'mysql' || $driver === 'mariadb') {
                DB::statement('ALTER TABLE project_pricing_plans MODIFY per_user_price DECIMAL(10,2) NULL');
            } elseif ($driver === 'pgsql') {
                DB::statement('ALTER TABLE project_pricing_plans ALTER COLUMN per_user_price TYPE NUMERIC(10,2) USING NULLIF(per_user_price, \'\')::numeric');
            } elseif ($driver === 'sqlsrv') {
                DB::statement('ALTER TABLE project_pricing_plans ALTER COLUMN per_user_price DECIMAL(10,2) NULL');
            } else {
                Schema::table('project_pricing_plans', function (Blueprint $table) {
                    $table->decimal('per_user_price', 10, 2)->nullable()->change();
                });
            }
        }
    }
};
