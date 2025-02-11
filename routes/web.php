<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

// Route untuk halaman landing page
Route::get('/', function () {
    return view('landing');
});

// Route untuk login selection (admin atau customer)
Route::get('/login', function () {
    return view('auth.login_selection'); // Tampilan untuk memilih login sebagai customer atau admin
})->name('login');

// Route untuk login sebagai customer
Route::prefix('login/customer')->name('login.customer.')->group(function () {
    Route::get('/', function () {
        return view('auth.login_customer'); // View: resources/views/auth/login_customer.blade.php
    })->name('form');
    Route::post('/', [UserAuthController::class, 'login'])->name('post');
});

// Route untuk login sebagai admin
Route::prefix('login/admin')->name('login.admin.')->group(function () {
    Route::get('/', function () {
        return view('auth.login_admin'); // View: resources/views/auth/login_admin.blade.php
    })->name('form');
    Route::post('/', [AdminAuthController::class, 'login'])->name('post');
});

// Route untuk logout
Route::post('/logout', function () {
    if (Auth::guard('admin')->check()) {
        Auth::guard('admin')->logout();
        return redirect()->route('login.admin.form');
    } else {
        Auth::guard('web')->logout();
        return redirect()->route('login.customer.form');
    }
})->name('logout');

// Route untuk dashboard pelanggan
Route::middleware(['auth:web'])->group(function () {
    // Halaman Dashboard
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

    // Produk
    Route::get('/user/products', [UserController::class, 'indexProducts'])->name('user.products');

    // Tambah Pesanan
    Route::post('/user/products/{id}/order', [UserController::class, 'addToOrder'])->name('user.order.add');

    // Melihat Daftar Pesanan
    Route::get('/user/orders', [UserController::class, 'viewOrders'])->name('user.orders');
});

// Route untuk dashboard admin
Route::middleware(['auth:admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        // Dashboard Admin
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

        // ================== Rute Products ==================
        Route::prefix('/products')->name('products.')->group(function () {
            Route::get('/', [AdminController::class, 'indexProducts'])->name('index');
            Route::get('/{id}', [AdminController::class, 'showProduct'])->name('show')->where('id', '[0-9]+');
            Route::get('/create', [AdminController::class, 'create'])->name('create');
            Route::post('/', [AdminController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [AdminController::class, 'edit'])->name('edit')->where('id', '[0-9]+');
            Route::put('/{id}', [AdminController::class, 'update'])->name('update')->where('id', '[0-9]+');
            Route::delete('/{id}', [AdminController::class, 'destroy'])->name('destroy')->where('id', '[0-9]+');
        });

        // ================== Rute Users ==================
        Route::prefix('/users')->name('users.')->group(function () {
            Route::get('/', [AdminController::class, 'indexUsers'])->name('index');
            Route::get('/create', [AdminController::class, 'createUser'])->name('create');
            Route::post('/', [AdminController::class, 'storeUser'])->name('store');
            Route::get('/{id}/edit', [AdminController::class, 'editUser'])->name('edit')->where('id', '[0-9]+');
            Route::put('/{id}', [AdminController::class, 'updateUser'])->name('update')->where('id', '[0-9]+');
            Route::delete('/{id}', [AdminController::class, 'destroyUser'])->name('destroy')->where('id', '[0-9]+');
        });

        // ================== Rute Orders ==================
        Route::prefix('/orders')->name('orders.')->group(function () {
            Route::get('/', [AdminController::class, 'indexOrders'])->name('index');
            Route::get('/{id}', [AdminController::class, 'showOrder'])->name('show')->where('id', '[0-9]+');
            Route::put('/{id}/status', [AdminController::class, 'updateOrderStatus'])->name('updateStatus')->where('id', '[0-9]+');
            Route::delete('/{id}', [AdminController::class, 'destroyOrder'])->name('destroy')->where('id', '[0-9]+');
        });
    });
});
