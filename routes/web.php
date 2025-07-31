<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PageContentController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\HomeContentController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produk', [HomeController::class, 'produk'])->name('product');
Route::get('/produk/{id}', [HomeController::class, 'detail'])->name('detail_produk');
Route::get('/about', [PageContentController::class, 'about'])->name('about');

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'doLogin']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Admin Management Routes
|--------------------------------------------------------------------------
*/

Route::match(['get', 'post'], '/admin/manage-about', [AboutController::class, 'manage'])->name('manage_about');
Route::match(['get', 'post'], '/admin/manage-footer', [FooterController::class, 'manage'])->name('manage_footer');
Route::match(['get', 'post'], '/admin/manage-home', [HomeContentController::class, 'manage'])->name('manage_home');
Route::match(['get', 'post'], '/admin/manage/{slug}', [PageContentController::class, 'manage'])->name('manage_page');

/*
|--------------------------------------------------------------------------
| Admin Product Management
|--------------------------------------------------------------------------
*/

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/admin/product/create', [ProductController::class, 'create'])->name('admin.product.create');
// Ini udah ada sebelumnya:
Route::get('/admin/product/create', [ProductController::class, 'create'])->name('admin.product.create');
Route::get('/admin/product/{id}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');

use App\Http\Controllers\AdminController;

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard');
Route::post('/admin/product', [ProductController::class, 'store'])->name('admin.product.store');
Route::delete('/admin/product/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');
Route::put('/admin/product/{id}', [ProductController::class, 'update'])->name('admin.product.update');
Route::get('/admin/manage/{slug}', [PageContentController::class, 'manage'])->name('manage_page');
