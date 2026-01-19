<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::middleware('is_adminMiddleware')->group(function () {
// Пользователи
        Route::get('/users', [UserController::class, 'index'])->name('users.index');

        Route::get('/users/{user}/update', [UserController::class, 'userUpdatePage'])->name('user.updatepage');
        Route::patch('/users/{user}/update', [UserController::class, 'userUpdate'])->name('user.update');

        Route::get('/users/store', [UserController::class, 'userStorePage'])->name('user.storepage');
        Route::post('/users/store', [UserController::class, 'userStore'])->name('user.store');

        Route::delete('/users/{user}', [UserController::class, 'userDelete'])->name('user.delete');
// Товары

        Route::get('/products', [ProductController::class, 'index'])->name('products.index');    

        Route::get('/products/{product}/update', [ProductController::class, 'productUpdatePage'])->name('product.updatepage');
        Route::patch('/products/{product}/update', [ProductController::class, 'productUpdate'])->name('product.update');

        Route::get('/products/store', [ProductController::class, 'productStorePage'])->name('product.storepage');
        Route::post('/products/store', [ProductController::class, 'productStore'])->name('product.store');
// Импорт CSV
        Route::post('/products/import', [ProductController::class, 'productImport'])->name('product.import');   

        Route::delete('/products/{product}', [ProductController::class, 'productDelete'])->name('product.delete');    
    });
// Клиенты
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
// Заказы
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
// Аккаунт
    Route::get('/account', [AccountController::class, 'index'])->name('account.index');
    Route::patch('/account', [AccountController::class, 'changepassword'])->name('account.changepassword');
// Выход из аккаунта
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('auth.login');
});