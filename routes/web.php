<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StockMovementController;


// Logout Route


Auth::routes();

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login'); // Redirect to the login page after logout
})->name('logout');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');


Route::middleware(['auth'])->group(function () {
    // Routes accessible to both admins and superadmins
    Route::get('stockmovements/{stockmovement}/edit', [StockMovementController::class, 'edit'])->name('stockmovements.edit');

    Route::resource('stockmovements', StockMovementController::class);
    Route::resource('products', ProductController::class);
    // Route for creating a new category
 Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
 Route::get('/reports/inventory', [ReportController::class, 'generateInventoryReport'])->name('reports.inventory');;
 // Route for editing/updating an existing category

 
    Route::resource('categories', CategoryController::class);
    Route::resource('reports', ReportController::class);
    Route::resource('suppliers', SupplierController::class);
 
    // web.php
 
 
 
 
 
 
  
   // Route accessible only to admins
    Route::group(['middleware' => function ($request, $next) {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }
        return redirect()->route('dashboard')->with('error', 'Access denied.');
    }], function () {
        Route::resource('users', UserController::class);
    });
  });
 


// Route::resource('profile', ProfileController::class)->middleware('auth'); //->name('profile');


// Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// In routes/web.php
// use App\Http\Controllers\AccountController;

// Route::middleware('auth')->group(function () {
//     Route::resource('/accounts', [AccountController::class]);//->name('accounts.index');
// //     Route::post('/accounts/deposit', [AccountController::class, 'deposit'])->name('accounts.deposit');
// //     Route::post('/accounts/withdraw', [AccountController::class, 'withdraw'])->name('accounts.withdraw');
// // Route::get('/accounts/{id}', [AccountController::class, 'show'])->name('accounts.show');    
// });



// Resource Routes (protected by auth middleware)







// use App\Http\Controllers\TransactionController;
