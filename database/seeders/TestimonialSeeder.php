<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Sarah Johnson',
                'position' => 'Marketing Director',
                'company' => 'TechCorp Solutions',
                'message' => 'Working with Future Technomedia was an absolute pleasure. They delivered our project on time and exceeded our expectations. Their attention to detail and creative approach made all the difference.',
                'rating' => 5,
                'platform' => 'LinkedIn',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Michael Chen',
                'position' => 'CEO',
                'company' => 'Innovation Labs',
                'message' => 'The team at Future Technomedia transformed our digital presence completely. Their expertise in web development and design is unmatched. Highly recommended for any business looking to grow online.',
                'rating' => 5,
                'platform' => 'Google Reviews',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Emily Rodriguez',
                'position' => 'Project Manager',
                'company' => 'Creative Agency',
                'message' => 'Exceptional service and outstanding results! The communication was clear throughout the project, and they delivered exactly what we envisioned. Will definitely work with them again.',
                'rating' => 4,
                'platform' => 'Facebook',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'David Thompson',
                'position' => 'Founder',
                'company' => 'StartupX',
                'message' => 'Future Technomedia helped us launch our startup with a stunning website and brand identity. Their creative solutions and technical expertise were exactly what we needed to make an impact.',
                'rating' => 5,
                'platform' => 'Trustpilot',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Lisa Park',
                'position' => 'Operations Manager',
                'company' => 'Global Enterprises',
                'message' => 'Professional, reliable, and creative - everything you want in a digital partner. They took our vision and brought it to life with amazing results. The ROI has been incredible.',
                'rating' => 5,
                'platform' => 'LinkedIn',
                'order' => 5,
                'is_active' => false,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
