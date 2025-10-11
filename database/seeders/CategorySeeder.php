<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Web Development',
                'slug' => 'web-development',
                'description' => 'Full-stack web applications and websites',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Mobile Apps',
                'slug' => 'mobile-apps',
                'description' => 'iOS and Android mobile applications',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'E-Commerce',
                'slug' => 'e-commerce',
                'description' => 'Online stores and shopping platforms',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'CMS & Dashboards',
                'slug' => 'cms-dashboards',
                'description' => 'Content management systems and admin panels',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'UI/UX Design',
                'slug' => 'ui-ux-design',
                'description' => 'User interface and experience design projects',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'API Development',
                'slug' => 'api-development',
                'description' => 'RESTful and GraphQL API services',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
