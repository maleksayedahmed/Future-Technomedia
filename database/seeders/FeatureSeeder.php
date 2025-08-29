<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Feature;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            [
                'title' => 'Web Development',
                'description' => 'We create responsive, modern websites using the latest technologies and frameworks to ensure optimal performance and user experience.',
                'icon' => 'fal fa-desktop',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Mobile App Development',
                'description' => 'Our team develops native and cross-platform mobile applications that provide seamless user experiences across all devices.',
                'icon' => 'fal fa-mobile-android',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'UI/UX Design',
                'description' => 'We design intuitive and engaging user interfaces that prioritize user experience and conversion optimization.',
                'icon' => 'fal fa-palette',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'E-commerce Solutions',
                'description' => 'Complete e-commerce platforms with secure payment processing, inventory management, and customer analytics.',
                'icon' => 'fal fa-shopping-bag',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Cloud Services',
                'description' => 'Scalable cloud infrastructure and deployment solutions to ensure your applications run smoothly and efficiently.',
                'icon' => 'fal fa-cloud',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Digital Marketing',
                'description' => 'Comprehensive digital marketing strategies including SEO, social media management, and content marketing.',
                'icon' => 'fal fa-chart-line',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($features as $featureData) {
            Feature::create($featureData);
        }
    }
}
