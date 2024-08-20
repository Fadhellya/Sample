<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

// Menampilkan daftar semua karyawan
Route::get('/', [EmployeeController::class, 'index'])->name('employees.index');

// Menampilkan formulir untuk menambahkan karyawan baru
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');

// Menyimpan karyawan baru
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');

// Menampilkan detail karyawan berdasarkan ID
Route::get('/employees/{id}', [EmployeeController::class, 'show'])->name('employees.show');

// Menampilkan formulir untuk mengedit karyawan
Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');

// Mengupdate karyawan yang ada berdasarkan ID
Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');

// Menghapus karyawan berdasarkan ID
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
