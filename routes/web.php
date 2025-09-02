<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\SettingController;
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
});
Route::get('/project' , function(){ return view('user.ProjectDetails'); });

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('sliders', SliderController::class);
    Route::resource('features', FeatureController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('settings', SettingController::class);
    Route::patch('settings/bulk-update', [SettingController::class, 'bulkUpdate'])->name('settings.bulk-update');
});


