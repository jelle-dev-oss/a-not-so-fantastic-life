
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AuthController;

// Redirect homepage to login
Route::get('/', function () {
    return redirect()->route('login');
});

// Routes accessible only to guests
Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.post');

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.post');

});

// Routes accessible only to authenticated users
Route::middleware('auth')->group(function () {

    Route::get('/books', [BookController::class, 'index'])
        ->name('books.index');

    Route::get('/books/create', [BookController::class, 'create'])
        ->name('books.create');

    Route::post('/books', [BookController::class, 'store'])
        ->name('books.store');

    Route::get('/members', [MemberController::class, 'index'])
        ->name('members.index');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

});
