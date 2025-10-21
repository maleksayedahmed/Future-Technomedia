<?php

namespace Database\Seeders;

use App\Models\BlogsPageContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogsPageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BlogsPageContent::create([
            'hero_title' => 'My <span>Last news</span> and<br>Updates',
            'hero_description' => 'If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.',
            'hero_subtitle' => 'Journal',
            'hero_scroll_text' => 'Let\'s Start',
            'is_active' => true,
            'meta_title' => 'Blog - Latest News and Updates',
            'meta_description' => 'Stay updated with our latest news, insights, and updates on web development, technology, and industry trends.',
            'meta_keywords' => 'blog, news, updates, web development, technology, insights'
        ]);
    }
}
