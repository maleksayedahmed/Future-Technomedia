<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\Setting;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $contactSettings = [
            // Hero Section
            [
                'key' => 'contact_hero_title',
                'value' => 'Contact',
                'type' => 'text',
                'group' => 'contact',
                'label' => 'Hero Title',
                'description' => 'Main title for contact page hero section',
                'order' => 1,
            ],
            [
                'key' => 'contact_hero_description',
                'value' => 'If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.',
                'type' => 'textarea',
                'group' => 'contact',
                'label' => 'Hero Description',
                'description' => 'Description text for contact page hero section',
                'order' => 2,
            ],
            [
                'key' => 'contact_hero_subtitle',
                'value' => 'Contacts',
                'type' => 'text',
                'group' => 'contact',
                'label' => 'Hero Subtitle',
                'description' => 'Subtitle for contact page hero section',
                'order' => 3,
            ],

            // Contact Details Section
            [
                'key' => 'contact_details_title',
                'value' => 'Contact Details',
                'type' => 'text',
                'group' => 'contact',
                'label' => 'Contact Details Title',
                'description' => 'Title for contact details section',
                'order' => 10,
            ],
            [
                'key' => 'contact_details_subtitle',
                'value' => 'Lorem Ipsum generators on the Internet king this the first true generator',
                'type' => 'textarea',
                'group' => 'contact',
                'label' => 'Contact Details Subtitle',
                'description' => 'Subtitle for contact details section',
                'order' => 11,
            ],

            // Contact Form Section
            [
                'key' => 'contact_form_title',
                'value' => 'Get In Touch',
                'type' => 'text',
                'group' => 'contact',
                'label' => 'Contact Form Title',
                'description' => 'Title for contact form section',
                'order' => 20,
            ],
            [
                'key' => 'contact_form_subtitle',
                'value' => 'Lorem Ipsum generators on the Internet king this the first true generator',
                'type' => 'textarea',
                'group' => 'contact',
                'label' => 'Contact Form Subtitle',
                'description' => 'Subtitle for contact form section',
                'order' => 21,
            ],

            // Map Section
            [
                'key' => 'contact_map_latitude',
                'value' => '24.7136',
                'type' => 'text',
                'group' => 'contact',
                'label' => 'Map Latitude',
                'description' => 'Latitude coordinate for contact page map',
                'order' => 30,
            ],
            [
                'key' => 'contact_map_longitude',
                'value' => '46.6753',
                'type' => 'text',
                'group' => 'contact',
                'label' => 'Map Longitude',
                'description' => 'Longitude coordinate for contact page map',
                'order' => 31,
            ],
            [
                'key' => 'contact_map_embed_url',
                'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d924237.7098003947!2d46.28065179453125!3d24.72422534946569!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f03890d489399%3A0xba974d1c98e79fd5!2sRiyadh%20Saudi%20Arabia!5e0!3m2!1sen!2s!4v1234567890123!5m2!1sen!2s',
                'type' => 'url',
                'group' => 'contact',
                'label' => 'Map Embed URL',
                'description' => 'Google Maps embed URL for contact page (get from Google Maps > Share > Embed a map)',
                'order' => 32,
            ],

            // Social Section
            [
                'key' => 'contact_social_title',
                'value' => 'Find me on social networks :',
                'type' => 'text',
                'group' => 'contact',
                'label' => 'Social Section Title',
                'description' => 'Title for social networks section',
                'order' => 40,
            ],
        ];

        foreach ($contactSettings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                array_merge($setting, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Setting::whereIn('key', [
            'contact_hero_title',
            'contact_hero_description',
            'contact_hero_subtitle',
            'contact_details_title',
            'contact_details_subtitle',
            'contact_form_title',
            'contact_form_subtitle',
            'contact_map_latitude',
            'contact_map_longitude',
            'contact_map_embed_url',
            'contact_social_title',
        ])->delete();
    }
};
