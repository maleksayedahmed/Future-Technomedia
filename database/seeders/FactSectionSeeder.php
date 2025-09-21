<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FactSection;

class FactSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $factSection = FactSection::create([
            'title' => 'Some Interesting Facts About Me',
            'subtitle' => 'Numbers',
            'description' => 'We have a wide range of pneumatic and vacuum components and conveyor belts and systems specifically suiting the precise needs of the print and packaging industry.',
            'order' => 0,
            'is_active' => true,
        ]);

        // Optionally add a default background image if it exists
        // You can uncomment and modify this if you want to add a default image
        /*
        if (file_exists(public_path('images/bg/1.jpg'))) {
            $factSection->addMedia(public_path('images/bg/1.jpg'))
                ->toMediaCollection('background_images');
        }
        */
    }
}
