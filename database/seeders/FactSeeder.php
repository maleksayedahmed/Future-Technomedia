<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fact;
use App\Models\FactSection;

class FactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the first active fact section
        $factSection = FactSection::first();

        if ($factSection) {
            $facts = [
                [
                    'fact_section_id' => $factSection->id,
                    'number' => 145,
                    'label' => 'Finished projects',
                    'order' => 1,
                    'is_active' => true,
                ],
                [
                    'fact_section_id' => $factSection->id,
                    'number' => 357,
                    'label' => 'Happy customers',
                    'order' => 2,
                    'is_active' => true,
                ],
                [
                    'fact_section_id' => $factSection->id,
                    'number' => 825,
                    'label' => 'Working hours',
                    'order' => 3,
                    'is_active' => true,
                ],
                [
                    'fact_section_id' => $factSection->id,
                    'number' => 1124,
                    'label' => 'Coffee Cups',
                    'order' => 4,
                    'is_active' => true,
                ],
            ];

            foreach ($facts as $factData) {
                Fact::create($factData);
            }
        }
    }
}
