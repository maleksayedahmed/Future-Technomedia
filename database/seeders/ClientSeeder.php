<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = [
            [
                'name' => 'TechCorp Solutions',
                'website_url' => 'https://techcorp.example.com',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Innovation Labs',
                'website_url' => 'https://innovationlabs.example.com',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Creative Agency',
                'website_url' => 'https://creativeagency.example.com',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Global Enterprises',
                'website_url' => 'https://globalenterprises.example.com',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'StartupX',
                'website_url' => 'https://startupx.example.com',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Digital Solutions Inc',
                'website_url' => null,
                'order' => 6,
                'is_active' => false,
            ],
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}
