<?php

use App\Http\Controllers\Admin\Content\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\Content\FaqController;
use App\Http\Controllers\Admin\Content\MenuController;
use App\Http\Controllers\Admin\Content\PageController;
use App\Http\Controllers\Admin\Ticket\TicketController;
use App\Http\Controllers\Admin\Content\CommentController;
use App\Http\Controllers\Admin\Market\BrandController;
use App\Http\Controllers\Admin\Market\ProductCategoryController;
use App\Http\Controllers\Admin\Market\ProductController;
use App\Http\Controllers\Admin\Market\ProductImageController;
use App\Http\Controllers\Admin\Ticket\TicketAdminController;
use App\Http\Controllers\Admin\Ticket\TicketCategoryController;

Route::get('/', function () {
    return view('welcome');
});


require __DIR__.'/auth.php';

Route::prefix('admin')->name('admin.')->group(function() {

    Route::prefix('content')->name('content.')->group(function() {
        Route::resource('menu', MenuController::class);
        Route::resource('faq', FaqController::class);
        Route::resource('page', PageController::class);
        Route::resource('comment', CommentController::class);
        Route::resource('blog', BlogController::class);
    });

    Route::prefix('tickets')->name('tickets.')->group(function() {
        Route::resource('ticket-category', TicketCategoryController::class);
        Route::resource('ticket-admin', TicketAdminController::class);
        Route::resource('ticket', TicketController::class);

    });

    Route::prefix('market')->name('market.')->group(function() {
        Route::resource('product-category', ProductCategoryController::class);
        Route::resource('brand', BrandController::class);
        Route::resource('product', ProductController::class);
        Route::resource('product-image/{product}', ProductImageController::class);
    });

});
