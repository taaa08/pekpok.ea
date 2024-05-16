<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\CustomerCareController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('landing.home');

Route::get('/menu', [MenuController::class, 'index'])->name('landing.menu');

Route::post('/menu', [MenuController::class, 'search'])->name('landing.search');

Route::get('/about', [AboutController::class, 'index'])->name('landing.about');

Route::get('/contact', [CustomerCareController::class, 'index'])->name('landing.contact');

Route::post('/contact', [CustomerCareController::class, 'store'])->name('customercare.store');


Route::group(['middleware' => 'auth'], function () {

    // DASHBOARD

    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');

    // PROFILE

    Route::get('/your-profile', [ProfileController::class, 'index'])->name('admin.profile');

    Route::patch('/your-profile', [ProfileController::class, 'edit'])->name('profile.edit');

    // MENU

    Route::get('/admin-menu', [MenuController::class, 'create'])->name('admin.menu');

    Route::post('/admin-menu', [MenuController::class, 'store'])->name('menu.store');

    Route::get('/menu/edit/{menu}', [MenuController::class, 'show'])->name('menu.show');

    Route::patch('/menu/edit/{menu}', [MenuController::class, 'edit'])->name('menu.edit');

    Route::delete('/menu/delete/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');

    // PROMO

    Route::get('/admin-promo', [PromoController::class, 'create'])->name('admin.promo');

    Route::post('/admin-promo', [PromoController::class, 'store'])->name('promo.store');

    Route::get('/promo/edit/{promo}', [PromoController::class, 'show'])->name('promo.show');

    Route::patch('/promo/edit/{promo}', [PromoController::class, 'edit'])->name('promo.edit');

    Route::delete('/promo/delete/{promo}', [PromoController::class, 'destroy'])->name('promo.destroy');

    // ABOUT

    Route::get('/admin-about', [AboutController::class, 'create'])->name('admin.about');

    Route::post('/admin-about', [AboutController::class, 'store'])->name('about.store');

    Route::get('/about/edit/{about}', [AboutController::class, 'show'])->name('about.show');

    Route::patch('/about/edit/{about}', [AboutController::class, 'edit'])->name('about.edit');

    Route::delete('/about/delete/{about}', [AboutController::class, 'destroy'])->name('about.destroy');

    // TESTIMONIAL

    Route::get('/admin-testimonial', [TestimoniController::class, 'create'])->name('admin.testimonial');

    Route::post('/admin-testimonial', [TestimoniController::class, 'store'])->name('testimonial.store');

    Route::get('/testimonial/edit/{testimoni}', [TestimoniController::class, 'show'])->name('testimonial.show');

    Route::patch('/testimonial/edit/{testimoni}', [TestimoniController::class, 'edit'])->name('testimonial.edit');

    Route::delete('/testimonial/delete/{testimoni}', [TestimoniController::class, 'destroy'])->name('testimonial.destroy');

    // CUSTOMERCARE

    Route::get('/admin-customercare', [CustomerCareController::class, 'create'])->name('admin.customercare');

    Route::delete('/customercare/delete/{customercare}', [CustomerCareController::class, 'destroy'])->name('customercare.destroy');
});
Auth::routes(['register' => false, 'reset' => false]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
