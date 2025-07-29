<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\OperatorDashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
// Route kelola hasil lab - hanya untuk operator
Route::resource('kelola-hasil-lab', App\Http\Controllers\HasilLabController::class)->middleware(['auth', 'rolecustom:operator']);
// Route untuk hasil pengujian - redirect ke kelola hasil lab
Route::get('/hasil-pengujian', [App\Http\Controllers\HasilLabController::class, 'index'])->middleware('auth')->name('hasil.pengujian');

Route::resource('data-pengelolaan', App\Http\Controllers\PenelitianController::class)->middleware('auth');
Route::view('/laporan', 'laporan')->name('laporan');

Route::get('/admin', function() {
    return view('admin_panel');
})->middleware(['auth', 'role:admin'])->name('admin.panel');

Route::get('/download/{filename}', function ($filename) {
    
    $path = storage_path('app/public/lab_documents/' . $filename);
    if (!file_exists($path)) {
        abort(404);
    }
    return Response::download($path);
})->name('download.dokumen');
