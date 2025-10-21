<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'What services do you offer?',
                'answer' => 'We offer a comprehensive range of digital services including web development, mobile app development, UI/UX design, digital marketing, e-commerce solutions, and custom software development. Our team specializes in creating tailored solutions that meet your specific business needs.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'question' => 'How long does a typical project take?',
                'answer' => 'Project timelines vary depending on the complexity and scope. A simple website might take 2-4 weeks, while a complex web application could take 3-6 months. We provide detailed timelines during our initial consultation and keep you updated throughout the development process.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'question' => 'Do you provide ongoing maintenance and support?',
                'answer' => 'Yes, we offer comprehensive maintenance and support packages. This includes regular updates, security monitoring, performance optimization, bug fixes, and technical support. We can customize a maintenance plan based on your specific needs.',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'question' => 'What is your development process?',
                'answer' => 'Our development process follows industry best practices: Discovery & Planning, Design & Prototyping, Development, Testing & Quality Assurance, Deployment, and Ongoing Support. We use agile methodologies to ensure transparency and regular communication throughout the project.',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'question' => 'Do you work with clients internationally?',
                'answer' => 'Absolutely! We work with clients worldwide and have successfully completed projects for businesses in various countries. We handle time zone differences professionally and use modern collaboration tools to ensure smooth communication regardless of location.',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'question' => 'What technologies do you specialize in?',
                'answer' => 'We specialize in modern web technologies including Laravel, React, Vue.js, Node.js, and various database systems. We stay updated with the latest technologies and tools to provide cutting-edge solutions for our clients.',
                'order' => 6,
                'is_active' => true,
            ],
            [
                'question' => 'How do you handle project pricing?',
                'answer' => 'Our pricing depends on project complexity, timeline, and specific requirements. We offer both fixed-price and hourly-based pricing models. After understanding your needs, we provide a detailed quote with transparent pricing breakdown.',
                'order' => 7,
                'is_active' => true,
            ],
            [
                'question' => 'Can you work with our existing systems?',
                'answer' => 'Yes, we have extensive experience integrating with existing systems and third-party services. Whether you need API integrations, database migrations, or legacy system modernization, we can help ensure seamless integration.',
                'order' => 8,
                'is_active' => true,
            ],
        ];

        foreach ($faqs as $faqData) {
            Faq::create($faqData);
        }
    }
}