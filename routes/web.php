<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestBookController;

use App\Http\Controllers\MockApiController;
use App\Http\Controllers\CodingProjectController;
use App\Http\Controllers\PostController;

// Portfolio Routes
Route::get('/', [PortfolioController::class, 'home'])->name('portfolio.home');
Route::get('/about', [PortfolioController::class, 'about'])->name('portfolio.about');
Route::get('/skills', [PortfolioController::class, 'skills'])->name('portfolio.skills');
Route::get('/experience', [PortfolioController::class, 'experience'])->name('portfolio.experience');
Route::get('/guestbook', [PortfolioController::class, 'guestbook'])->name('portfolio.guestbook');
Route::post('/testimonial', [PortfolioController::class, 'storeTestimonial'])->name('testimonial.store');

// Public Mock API Endpoint
Route::match(['get', 'post'], '/api/v1/{path}', [MockApiController::class, 'handleRequest'])->where('path', '.*');

use App\Http\Controllers\Admin\AuthController;
use App\Http\Middleware\AdminAuthMiddleware;

// Admin Auth Routes (Public)
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Admin Protected Routes
Route::prefix('admin')->name('admin.')->middleware(AdminAuthMiddleware::class)->group(function () {
    // Testimonials
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::patch('/testimonials/{testimonial}/approve', [DashboardController::class, 'approve'])->name('testimonials.approve');
    Route::patch('/testimonials/{testimonial}/reject', [DashboardController::class, 'reject'])->name('testimonials.reject');
    Route::delete('/testimonials/{testimonial}', [DashboardController::class, 'delete'])->name('testimonials.delete');
    
    // Guestbook
    Route::get('/guestbook', [GuestBookController::class, 'adminIndex'])->name('guestbook.index');
    Route::delete('/guestbook/{guestbook}', [GuestBookController::class, 'destroy'])->name('guestbook.delete');
    
    // Mock APIs
    Route::get('/mock-apis', [MockApiController::class, 'index'])->name('mock_apis.index');
    Route::post('/mock-apis', [MockApiController::class, 'store'])->name('mock_apis.store');
    Route::put('/mock-apis/{mockApi}', [MockApiController::class, 'update'])->name('mock_apis.update');
    Route::delete('/mock-apis/{mockApi}', [MockApiController::class, 'destroy'])->name('mock_apis.delete');
    
    // Coding Projects
    Route::get('/coding-projects', [CodingProjectController::class, 'index'])->name('coding_projects.index');
    Route::post('/coding-projects', [CodingProjectController::class, 'store'])->name('coding_projects.store');
    Route::put('/coding-projects/{codingProject}', [CodingProjectController::class, 'update'])->name('coding_projects.update');
    Route::delete('/coding-projects/{codingProject}', [CodingProjectController::class, 'destroy'])->name('coding_projects.delete');
    
    // Blog Posts
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.delete');

    // Project Details
    Route::get('/project-details', [App\Http\Controllers\Admin\ProjectDetailController::class, 'index'])->name('project-details.index');
    Route::get('/project-details/{codingProject}/edit', [App\Http\Controllers\Admin\ProjectDetailController::class, 'edit'])->name('project-details.edit');
    Route::put('/project-details/{codingProject}', [App\Http\Controllers\Admin\ProjectDetailController::class, 'update'])->name('project-details.update');
});

// Guest Book Public Route
Route::post('/guestbook', [GuestBookController::class, 'store'])->name('guestbook.store');

// Legacy route redirect
Route::get('/index', function () {
    return redirect()->route('portfolio.home');
})->name('portfolio.index');
Route::get('/portfolio', function () {
    return redirect()->route('portfolio.home');
});
