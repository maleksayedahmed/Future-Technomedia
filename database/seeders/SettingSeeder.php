<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // General Company Information
            [
                'key' => 'company_name',
                'value' => 'Future Technomedia',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Company Name',
                'description' => 'The name of the company',
                'order' => 1,
            ],
            [
                'key' => 'company_description',
                'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.',
                'type' => 'textarea',
                'group' => 'general',
                'label' => 'Company Description',
                'description' => 'Brief description about the company for footer',
                'order' => 2,
            ],
            [
                'key' => 'logo',
                'value' => null,
                'type' => 'image',
                'group' => 'general',
                'label' => 'Company Logo',
                'description' => 'Main company logo (white version for header)',
                'order' => 3,
            ],

            // Contact Information
            [
                'key' => 'contact_phone',
                'value' => '+489756412322',
                'type' => 'text',
                'group' => 'contact',
                'label' => 'Phone Number',
                'description' => 'Main contact phone number',
                'order' => 1,
            ],
            [
                'key' => 'contact_email',
                'value' => 'yourmail@domain.com',
                'type' => 'text',
                'group' => 'contact',
                'label' => 'Email Address',
                'description' => 'Main contact email address',
                'order' => 2,
            ],
            [
                'key' => 'contact_address',
                'value' => 'USA 27TH Brooklyn NY',
                'type' => 'text',
                'group' => 'contact',
                'label' => 'Address',
                'description' => 'Company address',
                'order' => 3,
            ],

            // Social Media Links
            [
                'key' => 'social_facebook',
                'value' => '#',
                'type' => 'url',
                'group' => 'social',
                'label' => 'Facebook URL',
                'description' => 'Facebook page URL',
                'order' => 1,
            ],
            [
                'key' => 'social_instagram',
                'value' => '#',
                'type' => 'url',
                'group' => 'social',
                'label' => 'Instagram URL',
                'description' => 'Instagram profile URL',
                'order' => 2,
            ],
            [
                'key' => 'social_twitter',
                'value' => '#',
                'type' => 'url',
                'group' => 'social',
                'label' => 'Twitter URL',
                'description' => 'Twitter profile URL',
                'order' => 3,
            ],
            [
                'key' => 'social_vk',
                'value' => '#',
                'type' => 'url',
                'group' => 'social',
                'label' => 'VK URL',
                'description' => 'VK profile URL',
                'order' => 4,
            ],

            // Footer Settings
            [
                'key' => 'footer_copyright',
                'value' => '© 2018 / All rights reserved.',
                'type' => 'text',
                'group' => 'footer',
                'label' => 'Copyright Text',
                'description' => 'Copyright text displayed in footer',
                'order' => 1,
            ],
            [
                'key' => 'footer_newsletter_title',
                'value' => 'Subscribe / Contacts',
                'type' => 'text',
                'group' => 'footer',
                'label' => 'Newsletter Section Title',
                'description' => 'Title for newsletter subscription section',
                'order' => 2,
            ],
            [
                'key' => 'footer_newsletter_description',
                'value' => 'Want to be notified when we launch a new template or an udpate. Just sign up and we\'ll send you a notification by email.',
                'type' => 'textarea',
                'group' => 'footer',
                'label' => 'Newsletter Description',
                'description' => 'Description text for newsletter subscription',
                'order' => 3,
            ],
            [
                'key' => 'footer_about_title',
                'value' => 'About Company',
                'type' => 'text',
                'group' => 'footer',
                'label' => 'About Section Title',
                'description' => 'Title for about company section in footer',
                'order' => 4,
            ],

            // Location Settings for Hero Section
            [
                'key' => 'hero_latitude',
                'value' => '40.7143528',
                'type' => 'text',
                'group' => 'location',
                'label' => 'Latitude',
                'description' => 'Latitude coordinate for the hero location display',
                'order' => 1,
            ],
            [
                'key' => 'hero_longitude',
                'value' => '-74.0059731',
                'type' => 'text',
                'group' => 'location',
                'label' => 'Longitude',
                'description' => 'Longitude coordinate for the hero location display',
                'order' => 2,
            ],
            [
                'key' => 'hero_location_name',
                'value' => 'Based In NewYork',
                'type' => 'text',
                'group' => 'location',
                'label' => 'Location Name',
                'description' => 'Display name for the location in hero section',
                'order' => 3,
            ],
            [
                'key' => 'hero_maps_url',
                'value' => 'https://www.google.com/maps/',
                'type' => 'url',
                'group' => 'location',
                'label' => 'Google Maps URL',
                'description' => 'URL to open when clicking on the location tooltip',
                'order' => 4,
            ],

            // Other Settings
            [
                'key' => 'contact_button_text',
                'value' => 'Get in Touch',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Contact Button Text',
                'description' => 'Text for the contact button',
                'order' => 4,
            ],
            [
                'key' => 'contact_button_link',
                'value' => 'contacts.html',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Contact Button Link',
                'description' => 'URL for the contact button',
                'order' => 5,
            ],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
