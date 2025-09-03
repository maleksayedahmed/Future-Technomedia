<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    
    Route::resource('sliders', SliderController::class);
    Route::resource('features', FeatureController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('settings', SettingController::class);
});
