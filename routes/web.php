<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// ✅ Registrasi manual (tanpa Breeze form)
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// ✅ Dashboard akan menampilkan semua data buku
Route::get('/dashboard', function () {
    return redirect('/buku');
})->middleware(['auth'])->name('dashboard');


// ✅ CRUD Buku hanya bisa diakses setelah login
Route::middleware(['auth'])->group(function () {
    Route::resource('/buku', BukuController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Auth default Breeze (login/logout)
require __DIR__.'/auth.php';
