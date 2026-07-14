<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $packages = \App\Models\Package::with('destination')->where('status', 'active')->latest()->get();
    
    // Fetch exactly 3 destinations: prioritizing 'is_popular', then latest.
    $destinations = \App\Models\Destination::orderByDesc('is_popular')->latest()->take(3)->get();
    
    return view('pages.home', compact('packages', 'destinations'));
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/staff', function () {
    $staff = \App\Models\Staff::all();
    return view('pages.staff', compact('staff'));
});

Route::get('/gallery', function () {
    $images = \App\Models\Gallery::all();
    return view('pages.gallery', compact('images'));
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Auth::routes(['register' => false]); // Admin only, no public registration

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('packages', App\Http\Controllers\PackageController::class);
    Route::resource('destinations', App\Http\Controllers\DestinationController::class);
    Route::resource('staff', App\Http\Controllers\StaffController::class);
    Route::resource('gallery', App\Http\Controllers\GalleryController::class)->except(['show', 'edit', 'update']);
    Route::resource('bookings', App\Http\Controllers\BookingController::class);
    Route::get('contacts', [App\Http\Controllers\ContactController::class, 'index'])->name('contacts.index');
    Route::put('contacts/{contact}', [App\Http\Controllers\ContactController::class, 'update'])->name('contacts.update');
    
    // Profile
    Route::get('profile', [App\Http\Controllers\AdminProfileController::class, 'index'])->name('admin.profile');
    Route::put('profile/password', [App\Http\Controllers\AdminProfileController::class, 'updatePassword'])->name('admin.profile.password');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
