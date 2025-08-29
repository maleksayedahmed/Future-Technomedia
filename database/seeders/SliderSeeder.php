<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sliders = [
            [
                'title' => 'Hey there !<br>Its Future Technomedia<br>Innovative <span>Software Company</span>',
                'description' => 'We create innovative digital solutions with cutting-edge technology and professional expertise.',
                'button_text' => "Let's Start",
                'button_link' => '#sec2',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Innovate<br>Smart and Powerful<br><span>Digital Solutions</span>',
                'description' => 'Transform your business with our comprehensive digital solutions and expert development services.',
                'button_text' => 'View Portfolio',
                'button_link' => '/portfolio',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Smart Digital<br>Solutions<br>With Scalable <span>Software Power</span>',
                'description' => 'Build scalable applications that grow with your business needs and future requirements.',
                'button_text' => 'Our Services',
                'button_link' => '/services',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($sliders as $sliderData) {
            Slider::create($sliderData);
        }
    }
}
