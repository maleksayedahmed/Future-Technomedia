<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $about = About::create([
            'hero_title' => 'About Our Company',
            'hero_subtitle' => '// About Us',
            'hero_description' => 'We are a creative digital agency specializing in web design, development, and digital marketing solutions. Our team of passionate professionals delivers innovative and effective solutions that help businesses grow and succeed in the digital world.',

            'services_title' => 'Our Services',
            'services_subtitle' => '// What We Do',

            'services' => [
                [
                    'title' => 'نبذة عن الشركة',
                    'icon' => 'fal fa-building',
                    'description' => 'تعرف على شركتنا وتاريخنا في تقديم حلول تقنية مبتكرة.',
                    'features' => ['تأسيس الشركة', 'الخبرة', 'الفريق', 'الإنجازات'],
                    'image_url' => 'images/services/1.jpg'
                ],
                [
                    'title' => 'الرؤية',
                    'icon' => 'fal fa-eye',
                    'description' => 'اكتشف رؤيتنا المستقبلية وأهدافنا في مجال التكنولوجيا والابتكار.',
                    'features' => ['الأهداف المستقبلية', 'الابتكار', 'التميز', 'النمو'],
                    'image_url' => 'images/services/1.jpg'
                ]
            ],

            'video_title' => 'Our Story in Motion',
            'video_description' => 'Watch our journey and see how we transform ideas into digital realities. Our team\'s passion and expertise come together to create innovative solutions for our clients.',
            'video_button_text' => 'Watch Our Story',
            'video_button_url' => '#',

            'cta_title' => 'Ready To Start Your Project?',
            'cta_button_text' => 'Get In Touch',
            'cta_button_url' => '#contact',

            'is_active' => true,
            'order' => 0,
        ]);
    }
}
