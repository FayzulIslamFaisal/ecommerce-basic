<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/',[HomeController::class,'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth','verified');
Route::get('/view_category',[AdminController::class,'view_category'])->name('view_category');
Route::get('/delete_category/{id}',[AdminController::class,'delete_category'])->name('delete_category');
Route::post('/add_category',[AdminController::class,'add_category'])->name('add_category');
// ================================
// ======      product      =======
// ================================
Route::get('/view_product',[AdminController::class,'view_product'])->name('view_product');

Route::post('/add_product',[AdminController::class,'add_product'])->name('add_product');
Route::get('/show_product',[AdminController::class,'show_product'])->name('show_product');
Route::get('/delete_product/{id}',[AdminController::class,'delete_product'])->name('delete_product');
Route::get('/update_product/{id}',[AdminController::class,'update_product'])->name('update_product');

Route::post('/update_product_confirm/{id}',[AdminController::class,'update_product_confirm'])->name('update_product_confirm');
Route::get('/product_details/{id}',[HomeController::class,'product_details'])->name('product_details');
// -------------------------add to cart Route---------------------------------
Route::post('/add_cart/{id}',[HomeController::class,'add_cart'])->name('add_cart');
Route::get('/show_cart',[HomeController::class,'show_cart'])->name('show_cart');
Route::get('/remove_cart/{id}',[HomeController::class,'remove_cart'])->name('remove_cart');
// -------------------------Order Route---------------------------------
Route::get('/cash_order',[HomeController::class,'cash_order'])->name('cash_order');
// -------------------------stripe Route---------------------------------
Route::get('stripe/{totalprice}', [HomeController::class, 'stripe'])->name('stripe');
Route::post('stripe', [HomeController::class, 'stripePost'])->name('stripe.post');
// -------------------------Order Admin Route ---------------------------------
Route::get('/order', [AdminController::class, 'orderFunction'])->name('order');
Route::get('/delivered/{id}', [AdminController::class, 'deliveredFunction'])->name('delivered');
Route::get('/print_pdf/{id}', [AdminController::class, 'print_pdfFunction'])->name('print_pdf');
Route::get('/search', [AdminController::class, 'searchFunction'])->name('search');
// -------------------------Show Order Home Route ---------------------------------
Route::get('/show_order',[HomeController::class,'show_order'])->name('show_order');
Route::get('/cancel_order/{id}',[HomeController::class,'cancel_order'])->name('cancel_order');

// -------------------------add comment Home Route ---------------------------------
Route::post('/add_comment',[HomeController::class,'add_comment'])->name('add_comment');

Route::post('/add_reply',[HomeController::class,'add_reply'])->name('add_reply');
