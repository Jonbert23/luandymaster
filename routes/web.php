<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::redirect('/dashboard', '/business/dashboard')->middleware('auth');

// Business Routes
Route::middleware('auth')->prefix('business')->name('business.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [BusinessController::class, 'dashboard'])->name('dashboard');
    
    // Analytics
    Route::get('/analytics', [BusinessController::class, 'analytics'])->name('analytics');
    
    // Orders
    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/', [BusinessController::class, 'ordersIndex'])->name('index');
        Route::get('/create', [BusinessController::class, 'ordersCreate'])->name('create');
        Route::get('/{id}/edit', [BusinessController::class, 'ordersEdit'])->name('edit');
        Route::get('/{id}', [BusinessController::class, 'ordersView'])->name('view');
    });
    
    // POS
    Route::prefix('pos')->name('pos.')->group(function () {
        Route::get('/', [BusinessController::class, 'posIndex'])->name('index');
    });
    
    // Branches
    Route::prefix('branches')->name('branches.')->group(function () {
        Route::get('/', [BusinessController::class, 'branchesIndex'])->name('index');
        Route::get('/create', [BusinessController::class, 'branchesCreate'])->name('create');
        Route::get('/{id}/edit', [BusinessController::class, 'branchesEdit'])->name('edit');
        Route::get('/{id}', [BusinessController::class, 'branchesView'])->name('view');
    });
    
    // Staff
    Route::prefix('staff')->name('staff.')->group(function () {
        Route::get('/', [BusinessController::class, 'staffIndex'])->name('index');
        Route::get('/create', [BusinessController::class, 'staffCreate'])->name('create');
        Route::get('/{id}/edit', [BusinessController::class, 'staffEdit'])->name('edit');
        Route::get('/{id}', [BusinessController::class, 'staffView'])->name('view');
    });
    
    // Services
    Route::prefix('services')->name('services.')->group(function () {
        Route::get('/', [BusinessController::class, 'servicesIndex'])->name('index');
        Route::get('/create', [BusinessController::class, 'servicesCreate'])->name('create');
        Route::get('/{id}/edit', [BusinessController::class, 'servicesEdit'])->name('edit');
        Route::get('/{id}', [BusinessController::class, 'servicesView'])->name('view');
    });
    
    // Products
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [BusinessController::class, 'productsIndex'])->name('index');
        Route::get('/create', [BusinessController::class, 'productsCreate'])->name('create');
        Route::get('/{id}/edit', [BusinessController::class, 'productsEdit'])->name('edit');
        Route::get('/{id}', [BusinessController::class, 'productsView'])->name('view');
    });
    
    // Inventory
    Route::prefix('inventory')->name('inventory.')->group(function () {
        Route::get('/', [BusinessController::class, 'inventoryIndex'])->name('index');
        Route::get('/create', [BusinessController::class, 'inventoryCreate'])->name('create');
        Route::get('/{id}/edit', [BusinessController::class, 'inventoryEdit'])->name('edit');
        Route::get('/{id}', [BusinessController::class, 'inventoryView'])->name('view');
    });
    
    // Sales
    Route::prefix('sales')->name('sales.')->group(function () {
        Route::get('/', [BusinessController::class, 'salesIndex'])->name('index');
    });
    
    // Expenses
    Route::prefix('expenses')->name('expenses.')->group(function () {
        Route::get('/', [BusinessController::class, 'expensesIndex'])->name('index');
        Route::get('/create', [BusinessController::class, 'expensesCreate'])->name('create');
        Route::get('/{id}/edit', [BusinessController::class, 'expensesEdit'])->name('edit');
        Route::get('/{id}', [BusinessController::class, 'expensesView'])->name('view');
    });
    
    // Settings
    Route::get('/settings', [BusinessController::class, 'settings'])->name('settings');
});
