<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Livewire\Blog;
use App\Livewire\ProductCategories;
use App\Livewire\ProductIndex;

Route::get('/', [FrontController::class, 'index'])->name('front.index');

Route::controller(PageController::class)->group(function () {
    Route::get('/about-us', 'about')->name('page.about');
    Route::get('/contact-us', 'contact')->name('page.contact');
    Route::get('/privacy-policy', 'privacyPolicy')->name('page.privacy_policy');
    Route::get('/terms-and-conditions', 'termsConditions')->name('page.terms_conditions');
    Route::get('/article/{slug}', 'article')->name('page.article');
});

// Livewire Route
Route::get('/articles', Blog::class)->name('page.blog');
Route::get('/product/category/{category:slug}', ProductCategories::class)->name('product.category');
Route::get('/product', ProductIndex::class)->name('product.index');

Route::get('/product/{stone:slug}', [FrontController::class, 'details'])->name('product.details');
Route::get('/browse/category', [FrontController::class, 'category'])->name('front.category');

Route::post('/order/begin/{stone:slug}', [OrderController::class, 'saveOrder'])->name('front.save_order');

Route::get('/track-order', [OrderController::class, 'checkOrder'])->name('order.tracking');
Route::post('/track-order/details', [OrderController::class, 'checkOrderDetails'])->name('order.tracking_details');

Route::get('/order/checkout', [OrderController::class, 'checkout'])->name('front.booking');

Route::get('/order/booking/customer-data', [OrderController::class, 'customerData'])->name('front.customer_data');

Route::post('/order/booking/customer-data/save', [OrderController::class, 'saveCustomerData'])->name('front.save_customer_data');

Route::get('/order/payment', [OrderController::class, 'payment'])->name('front.payment');

Route::post('/order/payment/confirm', [OrderController::class, 'paymentConfirm'])->name('front.payment_confirm');

Route::get('/order/finished/{productTransaction:id}', [OrderController::class, 'orderFinished'])->name('order.finished');
