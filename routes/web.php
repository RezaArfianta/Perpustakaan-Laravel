<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentGroupController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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

Route::get('students/searchstudents', [StudentController::class, 'search'])->name('searchstudents');
Route::get('studentGrpups/searchstudentgroups', [StudentGroupController::class, 'search'])->name('searchstudentgroups');
Route::get('rayons/searchrayons', [RayonController::class, 'search'])->name('searchrayons');
Route::get('publishers/searchpublishers', [PublisherController::class, 'search'])->name('searchpublishers');
Route::get('books/searchbooks', [BookController::class, 'search'])->name('searchbooks');
Route::get('borrowings/searchborrowings', [BorrowingController::class, 'search'])->name('searchborrowings');
Route::resource('students', StudentController::class);
Route::resource('studentGroups', StudentGroupController::class);
Route::resource('rayons', RayonController::class);
Route::resource('publishers', PublisherController::class);
Route::resource('books', BookController::class);
Route::resource('borrowings', BorrowingController::class);

