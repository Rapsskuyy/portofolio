<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestBookController;

// Portfolio Routes
Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.home');
Route::post('/testimonial', [PortfolioController::class, 'storeTestimonial'])->name('testimonial.store');

// Admin Dashboard Routes (Testimoni Management)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::patch('/testimonials/{testimonial}/approve', [DashboardController::class, 'approve'])->name('testimonials.approve');
    Route::patch('/testimonials/{testimonial}/reject', [DashboardController::class, 'reject'])->name('testimonials.reject');
    Route::delete('/testimonials/{testimonial}', [DashboardController::class, 'delete'])->name('testimonials.delete');
});

// Guest Book Routes
Route::post('/guestbook', [GuestBookController::class, 'store'])->name('guestbook.store');
Route::get('/admin/guestbook', [GuestBookController::class, 'adminIndex'])->name('admin.guestbook.index');
Route::delete('/admin/guestbook/{guestbook}', [GuestBookController::class, 'destroy'])->name('admin.guestbook.delete');

// Legacy route
Route::get('/index', function () {
    return view('index');
});
