<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\SupplierController;

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

Route::group(['middleware'=>'guest'],function(){
// This route defines the route for accessing the login page.
Route::get('login',[AuthController::class,'index'])->name('login');
Route::post('login',[AuthController::class,'login'])->name('login')->middleware('throttle:2,1');

// This route defines the route for accessing the registration page.
Route::get('register',[AuthController::class,'register_view'])->name('register');
Route::post('register',[AuthController::class,'register'])->name('register')->middleware('throttle:2,1');;

 // Route for forget password
 Route::get('/forget', [AuthController::class, 'forgetpasswordload']);
 Route::post('/forgetpassword', [AuthController::class, 'forgetpassword'])->name('forgetpassword');

 // Route for reset password
 Route::get('/reset/{token}', [AuthController::class, 'resetpasswordload']);
 Route::post('/reset/{token}', [AuthController::class, 'resetpassword'])->name('resetPassword');

});


Route::group(['middleware'=>'auth'],function(){
Route::get('home',[AuthController::class,'home'])->name('home');
Route::get('logout',[AuthController::class,'logout'])->name('logout');
Route::get('admindashboard',[dashboardController::class,'admin'])->name('admindashboard');
Route::get('cashierdashboard',[dashboardController::class,'cashier'])->name('cashierdashboard');
 // Route for forget password
 Route::get('/forget', [AuthController::class, 'forgetpasswordload']);
 Route::post('/forgetpassword', [AuthController::class, 'forgetpassword'])->name('forgetpassword');
//  uers
Route::get('user',[UserController::class,'user'])->name('user');
Route::delete('/deleteuser/{id}',[UserController::class,'deleteuser'])->name('deleteuser');
//Route For Product
Route::get('/product.index', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
// Route to show the edit form for a specific product
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
// Route to delete a specific product
Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

//Supplier

Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
Route::post('/supplier', [SupplierController::class, 'store'])->name('supplier.store');
Route::get('/supplier/{id}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
Route::put('/supplier/{id}', [SupplierController::class, 'update'])->name('supplier.update');
Route::delete('/supplier/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');

Route::get('/company',[CompanyController::class,'index'])->name('company');
Route::get('/transaction',[TransactionController::class,'index'])->name('transaction.index'); 
Route::get('/transactions/filter/{interval}', [TransactionController::class, 'filter'])->name('transaction.filter');




Route::get('/order.index', [OrderController::class, 'index'])->name('order.index');
Route::post('/orders.store', [OrderController::class, 'store'])->name('orders.store');
Route::get('/reports.receipt', [OrderController::class, 'receipt'])->name('reports.receipt');
Route::get('products/print_all', 'App\Http\Controllers\ProductController@printAll')->name('products.print_all');

});

