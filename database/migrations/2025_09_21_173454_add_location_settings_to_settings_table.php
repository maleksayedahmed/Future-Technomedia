<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use App\Models\Setting;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $locationSettings = [
            [
                'key' => 'hero_latitude',
                'value' => '40.7143528',
                'type' => 'text',
                'group' => 'location',
                'label' => 'Latitude',
                'description' => 'Latitude coordinate for the hero location display',
                'order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'hero_longitude',
                'value' => '-74.0059731',
                'type' => 'text',
                'group' => 'location',
                'label' => 'Longitude',
                'description' => 'Longitude coordinate for the hero location display',
                'order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'hero_location_name',
                'value' => 'Based In NewYork',
                'type' => 'text',
                'group' => 'location',
                'label' => 'Location Name',
                'description' => 'Display name for the location in hero section',
                'order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'hero_maps_url',
                'value' => 'https://www.google.com/maps/',
                'type' => 'url',
                'group' => 'location',
                'label' => 'Google Maps URL',
                'description' => 'URL to open when clicking on the location tooltip',
                'order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($locationSettings as $setting) {
            Setting::create($setting);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Setting::whereIn('key', [
            'hero_latitude',
            'hero_longitude',
            'hero_location_name',
            'hero_maps_url'
        ])->delete();
    }
};
