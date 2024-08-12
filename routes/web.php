<?php

use App\Http\Controllers\AmountController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/currencies', [CurrencyController::class, 'index'])->middleware(['auth', 'verified'])->name('currencies.index');
Route::post('/currencies', [CurrencyController::class, 'store'])->name('currencies.store');
Route::delete('/currencies/{currency}', [CurrencyController::class, 'destroy'])->name('currencies.destroy');

Route::get('/amounts', [AmountController::class, 'index'])->middleware(['auth', 'verified'])->name('amounts.index');
Route::get('/all_exchange_amounts', [AmountController::class, 'all_exchange_amounts'])->name('amounts.exchange.amount');
Route::post('/amounts', [AmountController::class, 'store'])->name('amounts.store');
Route::post('/amounts/{id}', [AmountController::class, 'update'])->name('amounts.update');
Route::delete('/amounts/{id}', [AmountController::class, 'destroy'])->name('amounts.destroy');


require __DIR__.'/auth.php';
