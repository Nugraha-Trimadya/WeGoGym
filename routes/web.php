<?php

use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MemberController;

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


Route::get('/', [PageController::class, 'index'])->name('home');

Route::prefix('/visit')->name('visit.')->group(function () {
    Route::get('/', [VisitController::class, 'index'])->name('data_visit'); // Menampilkan data
    Route::get('/create', [VisitController::class, 'create'])->name('create_data_visit'); // Form create
    Route::post('/store', [VisitController::class, 'store'])->name('store_data_visit'); // Menyimpan data baru (POST)
    Route::get('/{visit}/edit', [VisitController::class, 'edit'])->name('edit_data_visit'); // Form edit
    Route::patch('/update/{visit}', [VisitController::class, 'update'])->name('update_data_visit'); // Memperbarui data (PATCH)
    Route::delete('/delete/{visit}', [VisitController::class, 'destroy'])->name('delete_data_visit'); // Hapus data
});

Route::prefix('members')->name('member.')->group(function () {
    Route::get('/', [MemberController::class, 'index'])->name('data_member'); // Menampilkan daftar member
    Route::get('/create', [MemberController::class, 'create'])->name('create_data_member'); // Form create
    Route::post('/store', [MemberController::class, 'store'])->name('store_data_member'); // Menyimpan data baru
    Route::get('/edit/{member}', [MemberController::class, 'edit'])->name('edit_data_member'); // Form edit
    Route::patch('/update/{member}', [MemberController::class, 'update'])->name('update_data_member'); // Update data
    Route::delete('/delete/{member}', [MemberController::class, 'destroy'])->name('delete_data_member'); // Hapus data
});