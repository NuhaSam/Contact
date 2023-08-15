<?php

use App\Http\Controllers\ContactContoller;
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

    Route::get('/contact/show',[ContactContoller::class,'show'])->name('contact.show');
    Route::get('/contact',[ContactContoller::class,'index'])->name('contact.view');
    Route::get('/contact/add',[ContactContoller::class,'create'])->name('contact.add');
    Route::post('/contact/store',[ContactContoller::class,'store'])->name('contact.store');
    Route::put('/contact/update/{id}',[ContactContoller::class,'update'])->name('contact.update');
    Route::post('/contact/update/{id}',[ContactContoller::class,'edit'])->name('contact.edit');
    Route::delete('/contact/delete/{id}',[ContactContoller::class,'delete'])->name('contact.delete');


    Route::post('/contact/sort', [ContactContoller::class,'sort'])->name('contact.sort');
    Route::post('/contact/search', [ContactContoller::class,'search'])->name('contact.search');
    Route::post('/contact/filter', [ContactContoller::class,'filter'])->name('contact.filter');
});
// Route::resource('contacts/',ContactContoller::class);

require __DIR__.'/auth.php';
