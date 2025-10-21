<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds for content pages.
     */
    public function run(): void
    {
        $this->call([
            AboutSeeder::class,
            BlogSeeder::class,
            BlogsPageContentSeeder::class,
            FaqSeeder::class,
        ]);
    }
}
