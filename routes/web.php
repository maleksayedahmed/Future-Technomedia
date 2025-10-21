<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProjectPublicController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\ProfileController;
use App\Models\Slider;
use App\Models\Feature;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\Client;
use App\Models\Fact;
use App\Models\FactSection;
use App\Models\Setting;
use App\Models\Category;

Route::get('/', function () {
    $sliders = Slider::active()->ordered()->get();
    $features = Feature::active()->ordered()->get();
    $projects = Project::with('category')->active()->ordered()->get();
    $testimonials = Testimonial::active()->ordered()->get();
    $clients = Client::active()->ordered()->get();
    $factSection = FactSection::getActiveSection();
    $locationSettings = Setting::getByGroup('location');
    return view('user.index', compact('sliders', 'features', 'projects', 'testimonials', 'clients', 'factSection', 'locationSettings'));
})->name('home');

Route::get('/project', function () {
    return view('user.project');
})->name('project');

Route::get('/projects', function () {
    $categories = Category::active()->ordered()->withCount('projects')->get();
    $projects = Project::with(['category', 'media'])->active()->ordered()->get();
    $selectedCategory = request('category');
    return view('user.projects', compact('categories', 'projects', 'selectedCategory'));
})->name('projects');

Route::get('/project-show-new', function () {
    return view('user.project-show-new');
})->name('project-show-new');

Route::get('/contact', function () {
    $contactSettings = \App\Models\Setting::getByGroup('contact');
    $socialSettings = \App\Models\Setting::getByGroup('social');
    return view('user.contact', compact('contactSettings', 'socialSettings'));
})->name('contact');


//blog routes
Route::get('/blogs', [App\Http\Controllers\BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('blogs.show');
Route::post('/blogs/{slug}/comments', [App\Http\Controllers\BlogController::class, 'storeComment'])->name('blogs.comments.store');

// FAQ routes
Route::get('/faq', [App\Http\Controllers\FaqController::class, 'index'])->name('faq');

// about us routes
Route::get('/about-us', function () {
    $about = \App\Models\About::active()->with('media')->first();
    return view('user.about-us', compact('about'));
})->name('about-us');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Public Project routes
Route::get('/projects/{project}', [ProjectPublicController::class, 'show'])->name('projects.show');
Route::get('/projects/{project}/brochure/preview', [ProjectPublicController::class, 'previewBrochure'])->name('projects.brochure.preview');
Route::get('/projects/{project}/brochure', [ProjectPublicController::class, 'viewBrochure'])->name('projects.brochure');
Route::get('/projects/{project}/brochure/download', [ProjectPublicController::class, 'downloadBrochure'])->name('projects.brochure.download');
Route::post('/projects/{project}/request-demo', [ProjectPublicController::class, 'requestDemo'])->name('projects.request-demo');

// Contact routes
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
