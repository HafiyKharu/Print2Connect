<?php

use App\Http\Controllers\ExploreController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrintRequestController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\AdminController;


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
     return view('welcome');
});

Route::resource('home', PrintRequestController::class);
Route::get('users/{user:username}', [UserController::class, 'show'])
     ->middleware('auth')
     ->name('users.show');
Route::post('users/{user:username}/follow', [FollowController::class, 'store'])
     ->middleware('auth');
Route::get('users/{user:username}/edit', [userController::class, 'edit'])
     ->middleware('auth')
     ->name('users.edit');
Route::patch('users/{user:username}', [userController::class, 'update'])
     ->middleware('auth')
     ->name('users.update');
// Print Requests
Route::get('/post_print_requests', [PrintRequestController::class, 'index'])->name('post_print_requests.index');
Route::post('/post_print_requests', [PrintRequestController::class, 'store'])->name('post_print_requests.store');
Route::patch('/post_print_requests/accept/{postPrintRequest}/{userId}', [PrintRequestController::class, 'accept'])->name('post_print_requests.accept');
// Comments
Route::post('/post_print_requests/{postPrintRequest}/comments', [CommentController::class, 'store'])
     ->name('comments.store');

// Catalogues
Route::middleware(['auth'])->group(function () {
     Route::get('/catalogues', [CatalogueController::class, 'index'])->name('catalogues.index');
     Route::post('/catalogues', [CatalogueController::class, 'store'])->name('catalogues.store');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
     Route::get('/admin/approve-printshop', [AdminController::class, 'approvePrintshopIndex'])
          ->name('admin.approvePrintshop.index');
     Route::post('/admin/approve-printshop/{id}', [AdminController::class, 'approvePrintshop'])
          ->name('admin.approvePrintshop.update');
     Route::get('/admin/approve-printshop/{id}', [AdminController::class, 'showPrintshop'])
          ->name('admin.approvePrintshop.show');
     Route::post('/admin/reject-printshop/{id}', [AdminController::class, 'rejectPrintshop'])
          ->name('admin.rejectPrintshop');
});

Route::get('/explore', [ExploreController::class, 'index'])->name('explore.index');

require __DIR__ . '/auth.php';