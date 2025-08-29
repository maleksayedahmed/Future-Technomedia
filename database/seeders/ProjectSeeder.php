<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Corporate Website',
                'description' => 'A modern corporate website with sleek design and responsive layout for a leading business.',
                'category' => 'Web Design',
                'project_url' => 'https://example.com/corporate',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Mobile App Interface',
                'description' => 'User-friendly mobile application interface with intuitive navigation and modern UI/UX design.',
                'category' => 'UI/UX',
                'project_url' => 'https://example.com/mobile-app',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'E-commerce Platform',
                'description' => 'Complete e-commerce solution with payment integration and inventory management system.',
                'category' => 'Development',
                'project_url' => 'https://example.com/ecommerce',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Brand Identity Design',
                'description' => 'Comprehensive branding package including logo design, color palette, and brand guidelines.',
                'category' => 'Branding',
                'project_url' => null,
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Fashion Agency Website',
                'description' => 'Elegant and sophisticated website for a fashion agency showcasing portfolio and services.',
                'category' => 'Web Design',
                'project_url' => 'https://example.com/fashion',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Real Estate Portal',
                'description' => 'Property listing portal with advanced search features and virtual tour integration.',
                'category' => 'Development',
                'project_url' => 'https://example.com/realestate',
                'order' => 6,
                'is_active' => false,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
