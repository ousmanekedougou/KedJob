<?php

use Illuminate\Support\Facades\Auth;
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

Route::resource('/','App\Http\Controllers\User\HomeController');
Route::resource('/company','App\Http\Controllers\User\CompanyController');
Route::get('/detail/{slug}', [App\Http\Controllers\User\CompanyController::class, 'detail'])->name('company.detail');
Route::get('/contact', [App\Http\Controllers\User\ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/store', [App\Http\Controllers\User\ContactController::class, 'store'])->name('contact.store');
Route::get('/blog', [App\Http\Controllers\User\BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/show/{slug}', [App\Http\Controllers\User\BlogController::class, 'show'])->name('blog.show');


Auth::routes();
Route::get('/confirm/{id}/{token}','App\Http\Controllers\Auth\RegisterController@confirm');

Route::prefix('/admin')->name('admin.')->group(function() 
{
    Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
    Route::resource('/admin', 'App\Http\Controllers\Admin\AdminController');
    Route::resource('/job', 'App\Http\Controllers\Admin\JobController');
    Route::get('/stage', [App\Http\Controllers\Admin\JobController::class, 'stage'])->name('job.stage');
    Route::get('/employe', [App\Http\Controllers\Admin\JobController::class, 'employe'])->name('job.employe');
    Route::get('/stagiare', [App\Http\Controllers\Admin\JobController::class, 'stagiare'])->name('job.stagiare');
    Route::get('/annonce', [App\Http\Controllers\Admin\JobController::class, 'annonce'])->name('job.annonce');
    Route::resource('/localite', 'App\Http\Controllers\Admin\LocaliteController');
    Route::get('/commune', [App\Http\Controllers\Admin\LocaliteController::class, 'commune'])->name('localite.commune');
    Route::resource('/contact', 'App\Http\Controllers\Admin\ContactController');
    Route::get('/temoignage', [App\Http\Controllers\Admin\ContactController::class, 'temoignage'])->name('contact.temoignage');
    Route::get('/aboner', [App\Http\Controllers\Admin\ContactController::class, 'aboner'])->name('contact.aboner');
    Route::resource('/blog', 'App\Http\Controllers\Admin\BlogController');
    Route::resource('/category', 'App\Http\Controllers\Admin\CategoryController');
    Route::resource('/tag', 'App\Http\Controllers\Admin\TagController');

});