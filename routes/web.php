<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
// Helper function to get shared data for all frontend pages
function getSharedData() {
    return [
        'main_settings' => [
            'facebook_link' => '#',
            'twitter_link' => '#',
            'instagram_link' => '#',
            'linkedin_link' => '#',
            'site_email' => 'info@example.com',
            'site_phone' => '+012 345 67890',
        ],
        'sliders' => [
            (object)[
                'image_link' => 'sliders/default-slider.jpg',
                'top_sub_heading' => 'Welcome to Electra',
                'heading' => 'Professional Electrical Services',
                'bottom_sub_heading' => 'We provide top-quality electrical solutions for your home and business',
                'more_info_link' => '#',
            ],
            (object)[
                'image_link' => 'sliders/default-slider-2.jpg',
                'top_sub_heading' => 'Expert Solutions',
                'heading' => 'Powering Your Future',
                'bottom_sub_heading' => 'Trusted electrical services with 25+ years of experience',
                'more_info_link' => '#',
            ],
        ],
        'testimonials' => [
            (object)[
                'image' => 'testimonials/default-avatar.jpg',
                'name' => 'John Doe',
                'profession' => 'Business Owner',
                'description' => 'Excellent service! The team was professional and completed the work on time. Highly recommended for any electrical needs.',
            ],
            (object)[
                'image' => 'testimonials/default-avatar-2.jpg',
                'name' => 'Jane Smith',
                'profession' => 'Homeowner',
                'description' => 'Very satisfied with their work. They were efficient, clean, and the pricing was fair. Will definitely use them again.',
            ],
        ],
    ];
}

Route::get('/', function () {
    return view('Frontend.Home', getSharedData());
});

Route::get('/about', function () {
    return view('Frontend.About', getSharedData());
});

Route::get('/service', function () {
    return view('Frontend.Service', getSharedData());
});

Route::get('/blog', function () {
    return view('Frontend.Blog', getSharedData());
});

Route::get('/contact', function () {
    return view('Frontend.Contact', getSharedData());
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
 
require __DIR__.'/auth.php';
