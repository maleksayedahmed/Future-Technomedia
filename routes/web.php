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

Route::get('/', function () {
    $sliders = Slider::active()->ordered()->get();
    $features = Feature::active()->ordered()->get();
    $projects = Project::active()->ordered()->get();
    $testimonials = Testimonial::active()->ordered()->get();
    $clients = Client::active()->ordered()->get();
    return view('user.index', compact('sliders', 'features', 'projects', 'testimonials', 'clients'));
})->name('home');

Route::get('/project', function () {
    return view('user.project');
})->name('project');

Route::get('/project-show-new', function () {
    return view('user.project-show-new');
})->name('project');

Route::get('/contact', function () {
    return view('user.contact');
})->name('contact');

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
require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
