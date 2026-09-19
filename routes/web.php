<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WorkController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Zytrixon V2 — Web Routes
|--------------------------------------------------------------------------
| Per docs/18-page-specifications.md and implementation plan Phase 5.
*/

// Homepage
Route::get('/', HomeController::class)->name('home');

// Services Hub & Detail
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

// Work / Portfolio Hub & Detail
Route::get('/work', [WorkController::class, 'index'])->name('work.index');
Route::get('/work/{slug}', [WorkController::class, 'show'])->name('work.show');

// About
Route::get('/about', AboutController::class)->name('about');

// Contact
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])
    ->middleware('throttle:6,1') // Rate limit 6 requests per minute per IP
    ->name('contact.submit');

// SEO XML Sitemap
Route::get('/sitemap.xml', \App\Http\Controllers\SitemapController::class)->name('sitemap');
