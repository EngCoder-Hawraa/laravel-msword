<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('users/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('users/word-export/{id}', [UserController::class, 'wordExport'])->name('user.wordExport');

    Route::get('/books', [BookController::class, 'index'])->name('book.index');
    Route::get('book/{id}', [BookController::class, 'show'])->name('book.show');
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/book/store', [BookController::class, 'store'])->name('books.store');
    Route::get('/book/edit/{id}', [BookController::class, 'edit'])->name('books.edit');
    Route::post('/book/update/{id}', [BookController::class, 'update'])->name('books.update');
    Route::get('/book/delete/{id}', [BookController::class, 'destroy'])->name('books.delete');
    Route::get('books/word-export/{id}', [BookController::class, 'wordExport'])->name('book.wordExport');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

require __DIR__.'/auth.php';
