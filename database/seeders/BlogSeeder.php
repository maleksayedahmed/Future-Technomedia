<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the first user as the author (assuming there's at least one user)
        $author = User::first();

        if (!$author) {
            // Create a default author if none exists
            $author = User::create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]);
        }

        // Create blog categories
        $categories = [
            [
                'name' => 'Web Development',
                'slug' => 'web-development',
                'description' => 'Articles about web development technologies and practices',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Design',
                'slug' => 'design',
                'description' => 'UI/UX design tips and trends',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Technology',
                'slug' => 'technology',
                'description' => 'Latest technology news and insights',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Business',
                'slug' => 'business',
                'description' => 'Business strategies and digital marketing',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            BlogCategory::create($category);
        }

        // Create blog tags
        $tags = [
            ['name' => 'Laravel', 'slug' => 'laravel', 'is_active' => true],
            ['name' => 'React', 'slug' => 'react', 'is_active' => true],
            ['name' => 'Vue.js', 'slug' => 'vue-js', 'is_active' => true],
            ['name' => 'JavaScript', 'slug' => 'javascript', 'is_active' => true],
            ['name' => 'PHP', 'slug' => 'php', 'is_active' => true],
            ['name' => 'UI/UX', 'slug' => 'ui-ux', 'is_active' => true],
            ['name' => 'SEO', 'slug' => 'seo', 'is_active' => true],
            ['name' => 'Performance', 'slug' => 'performance', 'is_active' => true],
            ['name' => 'Security', 'slug' => 'security', 'is_active' => true],
            ['name' => 'Mobile', 'slug' => 'mobile', 'is_active' => true],
        ];

        foreach ($tags as $tag) {
            BlogTag::create($tag);
        }

        // Create sample blog posts
        $blogs = [
            [
                'title' => 'Getting Started with Laravel 11',
                'slug' => 'getting-started-with-laravel-11',
                'excerpt' => 'Learn the fundamentals of Laravel 11 and build your first application with the latest features.',
                'content' => '<p>Laravel 11 brings exciting new features and improvements to the PHP framework ecosystem. In this comprehensive guide, we\'ll explore the key features and get you started with building modern web applications.</p>

                <h2>What\'s New in Laravel 11</h2>
                <p>Laravel 11 introduces several performance improvements and new features that make development faster and more efficient.</p>

                <h3>Improved Performance</h3>
                <p>The framework now includes optimized routing and caching mechanisms that can significantly improve your application\'s response time.</p>

                <blockquote>
                <p>"Laravel 11 represents a significant milestone in the evolution of PHP web development frameworks."</p>
                </blockquote>

                <p>With these improvements, developers can build more robust and scalable applications with less effort.</p>',
                'status' => 'published',
                'published_at' => Carbon::now()->subDays(7),
                'author_id' => $author->id,
                'view_count' => 1250,
                'comment_count' => 8,
                'is_featured' => true,
                'meta_title' => 'Getting Started with Laravel 11 - Complete Guide',
                'meta_description' => 'Learn Laravel 11 fundamentals, new features, and build your first application with this comprehensive tutorial.',
                'meta_keywords' => 'laravel, php, framework, tutorial, web development',
                'categories' => ['Web Development'],
                'tags' => ['Laravel', 'PHP', 'Web Development']
            ],
            [
                'title' => 'Modern UI/UX Design Principles',
                'slug' => 'modern-ui-ux-design-principles',
                'excerpt' => 'Discover the essential principles of modern user interface and user experience design that create exceptional digital experiences.',
                'content' => '<p>In today\'s digital landscape, creating intuitive and engaging user experiences is crucial for the success of any web application. This article explores the fundamental principles that guide modern UI/UX design.</p>

                <h2>The Importance of User-Centered Design</h2>
                <p>User-centered design puts the needs and preferences of users at the forefront of the design process. This approach ensures that digital products are not only visually appealing but also functional and easy to use.</p>

                <h3>Key Principles</h3>
                <ul>
                <li><strong>Simplicity:</strong> Keep interfaces clean and uncluttered</li>
                <li><strong>Consistency:</strong> Maintain uniform design patterns</li>
                <li><strong>Accessibility:</strong> Ensure designs work for all users</li>
                <li><strong>Feedback:</strong> Provide clear user feedback</li>
                </ul>

                <p>By following these principles, designers can create more effective and user-friendly interfaces.</p>',
                'status' => 'published',
                'published_at' => Carbon::now()->subDays(5),
                'author_id' => $author->id,
                'view_count' => 980,
                'comment_count' => 12,
                'is_featured' => false,
                'meta_title' => 'Modern UI/UX Design Principles - Essential Guide',
                'meta_description' => 'Learn the fundamental principles of modern UI/UX design to create exceptional user experiences.',
                'meta_keywords' => 'ui design, ux design, user experience, interface design',
                'categories' => ['Design'],
                'tags' => ['UI/UX', 'Design']
            ],
            [
                'title' => 'React 18 New Features and Improvements',
                'slug' => 'react-18-new-features-and-improvements',
                'excerpt' => 'Explore the latest features in React 18 including concurrent rendering, automatic batching, and improved performance.',
                'content' => '<p>React 18 introduces groundbreaking changes that improve performance and developer experience. This article covers the most important updates and how to leverage them in your projects.</p>

                <h2>Concurrent Rendering</h2>
                <p>Concurrent rendering allows React to prepare multiple versions of your UI at the same time, enabling smoother user experiences even during heavy computations.</p>

                <h3>Automatic Batching</h3>
                <p>React now automatically batches state updates, reducing the number of re-renders and improving performance.</p>

                <p>These improvements make React applications faster and more responsive than ever before.</p>',
                'status' => 'published',
                'published_at' => Carbon::now()->subDays(3),
                'author_id' => $author->id,
                'view_count' => 1540,
                'comment_count' => 15,
                'is_featured' => true,
                'meta_title' => 'React 18 Features - What\'s New and Improved',
                'meta_description' => 'Discover React 18\'s new features including concurrent rendering, automatic batching, and performance improvements.',
                'meta_keywords' => 'react, javascript, frontend, concurrent rendering',
                'categories' => ['Web Development', 'Technology'],
                'tags' => ['React', 'JavaScript', 'Performance']
            ],
            [
                'title' => 'SEO Best Practices for Modern Websites',
                'slug' => 'seo-best-practices-for-modern-websites',
                'excerpt' => 'Master the essential SEO techniques that will help your website rank higher in search engine results.',
                'content' => '<p>Search engine optimization (SEO) is crucial for driving organic traffic to your website. This comprehensive guide covers the most effective SEO strategies for modern web development.</p>

                <h2>Technical SEO Fundamentals</h2>
                <p>Technical SEO focuses on the backend elements that affect your site\'s visibility to search engines.</p>

                <h3>On-Page Optimization</h3>
                <ul>
                <li>Optimize title tags and meta descriptions</li>
                <li>Use semantic HTML structure</li>
                <li>Ensure mobile-friendly design</li>
                <li>Optimize images and media</li>
                </ul>

                <h2>Content Strategy</h2>
                <p>High-quality, relevant content remains the cornerstone of effective SEO strategies.</p>',
                'status' => 'published',
                'published_at' => Carbon::now()->subDays(1),
                'author_id' => $author->id,
                'view_count' => 756,
                'comment_count' => 6,
                'is_featured' => false,
                'meta_title' => 'SEO Best Practices for Modern Websites',
                'meta_description' => 'Learn essential SEO techniques to improve your website\'s search engine rankings and drive more organic traffic.',
                'meta_keywords' => 'seo, search engine optimization, web development, digital marketing',
                'categories' => ['Business', 'Technology'],
                'tags' => ['SEO', 'Business', 'Web Development']
            ],
            [
                'title' => 'Building Secure Web Applications',
                'slug' => 'building-secure-web-applications',
                'excerpt' => 'Learn essential security practices to protect your web applications from common vulnerabilities and threats.',
                'content' => '<p>Web application security is paramount in today\'s threat landscape. This article covers essential security practices that every developer should implement.</p>

                <h2>Common Security Vulnerabilities</h2>
                <p>Understanding common vulnerabilities is the first step toward building secure applications.</p>

                <h3>Prevention Strategies</h3>
                <ul>
                <li>Input validation and sanitization</li>
                <li>SQL injection prevention</li>
                <li>Cross-site scripting (XSS) protection</li>
                <li>Secure authentication mechanisms</li>
                </ul>

                <p>Implementing these security measures will significantly reduce your application\'s vulnerability to attacks.</p>',
                'status' => 'draft',
                'published_at' => null,
                'author_id' => $author->id,
                'view_count' => 0,
                'comment_count' => 0,
                'is_featured' => false,
                'meta_title' => 'Building Secure Web Applications - Security Best Practices',
                'meta_description' => 'Essential security practices for web developers to protect applications from vulnerabilities and cyber threats.',
                'meta_keywords' => 'security, web development, cybersecurity, application security',
                'categories' => ['Web Development', 'Technology'],
                'tags' => ['Security', 'Web Development']
            ]
        ];

        foreach ($blogs as $blogData) {
            $categories = $blogData['categories'] ?? [];
            $tags = $blogData['tags'] ?? [];

            unset($blogData['categories'], $blogData['tags']);

            $blog = Blog::create($blogData);

            // Attach categories
            if (!empty($categories)) {
                $categoryIds = BlogCategory::whereIn('name', $categories)->pluck('id');
                $blog->categories()->attach($categoryIds);
            }

            // Attach tags
            if (!empty($tags)) {
                $tagIds = BlogTag::whereIn('name', $tags)->pluck('id');
                $blog->tags()->attach($tagIds);
            }
        }
    }
}
