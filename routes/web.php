<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;

/**
 * Public Routes
 */
Route::get('/', [HomeController::class, 'home']);
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/why', [HomeController::class, 'why'])->name('why');
Route::get('/testimonial', [HomeController::class, 'testimonial'])->name('testimonial');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/product_details/{slug}', [HomeController::class, 'product_details'])->name('product.details');
Route::post('/sendmail', [MailController::class, 'sendEmail'])->name('sendmail');

/**
 * Authenticated User Routes
 */
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'login_home'])->name('dashboard');
    Route::get('/mycart', [HomeController::class, 'mycart'])->name('cart');
    Route::get('/myorders', [HomeController::class, 'myorders'])->name('orders');
    Route::get('/add_cart/{id}', [HomeController::class, 'add_cart'])->name('add.cart');
    Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart'])->name('remove.cart');
    Route::post('/confirm_order', [HomeController::class, 'confirm_order'])->name('confirm.order');

    Route::controller(HomeController::class)->group(function(){
        Route::get('/stripe/{value}', 'stripe')->name('stripe');
        Route::post('/stripe/{value}', 'stripePost')->name('stripe.post');
    });

    // Profile Routes
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });
});

/**
 * Admin Routes
 */
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    
    // Category Management
    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/', [AdminController::class, 'view_category'])->name('view');
        Route::post('/add', [AdminController::class, 'add_category'])->name('add');
        Route::get('/delete/{id}', [AdminController::class, 'delete_category'])->name('delete');
        Route::get('/edit/{id}', [AdminController::class, 'edit_category'])->name('edit');
        Route::post('/update/{id}', [AdminController::class, 'update_category'])->name('update');
    });

    // Product Management
    Route::prefix('product')->name('product.')->group(function () {
        Route::get('/add', [AdminController::class, 'add_product'])->name('add');
        Route::post('/upload', [AdminController::class, 'upload_product'])->name('upload');
        Route::get('/view', [AdminController::class, 'view_product'])->name('view');
        Route::get('/delete/{id}', [AdminController::class, 'delete_product'])->name('delete');
        Route::get('/update/{slug}', [AdminController::class, 'update_product'])->name('update');
        Route::post('/edit/{id}', [AdminController::class, 'edit_product'])->name('edit');
        Route::get('/search', [AdminController::class, 'product_search'])->name('search');
    });

    // Order Management
    Route::prefix('order')->name('order.')->group(function () {
        Route::get('/view', [AdminController::class, 'view_order'])->name('view');
        Route::get('/on_the_way/{id}', [AdminController::class, 'on_the_way'])->name('on_the_way');
        Route::get('/delivered/{id}', [AdminController::class, 'delivered'])->name('delivered');
        Route::get('/print_pdf/{id}', [AdminController::class, 'print_pdf'])->name('print_pdf');
    });
});

// Include the default auth routes
require __DIR__.'/auth.php';

