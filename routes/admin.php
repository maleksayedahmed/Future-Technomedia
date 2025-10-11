<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\FactController;
use App\Http\Controllers\Admin\FactSectionController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('features', FeatureController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('fact-sections', FactSectionController::class);
    Route::resource('facts', FactController::class);

    // Contact management routes
    Route::resource('contacts', App\Http\Controllers\Admin\ContactController::class)->only(['index', 'show', 'destroy']);
    Route::patch('contacts/{contact}/mark-read', [App\Http\Controllers\Admin\ContactController::class, 'markAsRead'])->name('contacts.mark-read');
    Route::patch('contacts/{contact}/mark-unread', [App\Http\Controllers\Admin\ContactController::class, 'markAsUnread'])->name('contacts.mark-unread');
    Route::post('contacts/bulk-action', [App\Http\Controllers\Admin\ContactController::class, 'bulkAction'])->name('contacts.bulk-action');

    // Bulk update route for settings form (used in admin settings index view)
    Route::patch('settings/bulk-update', [SettingController::class, 'bulkUpdate'])->name('settings.bulk-update');
});
