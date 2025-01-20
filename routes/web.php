<?php

use App\Http\Controllers\Admin\Content\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\Content\FaqController;
use App\Http\Controllers\Admin\Content\MenuController;
use App\Http\Controllers\Admin\Content\PageController;
use App\Http\Controllers\Admin\Ticket\TicketController;
use App\Http\Controllers\Admin\Content\CommentController;
use App\Http\Controllers\Admin\DashbordController;
use App\Http\Controllers\Admin\Market\BrandController;
use App\Http\Controllers\Admin\Market\DeliveryController;
use App\Http\Controllers\Admin\Market\PeymentController;
use App\Http\Controllers\Admin\Market\ProductCategoryController;
use App\Http\Controllers\Admin\Market\ProductController;
use App\Http\Controllers\Admin\Market\ProductImageController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\Ticket\TicketAdminController;
use App\Http\Controllers\Admin\Ticket\TicketCategoryController;
use App\Http\Controllers\Home\Customer\AddressController;
use App\Models\Market\Coupan;

Route::get('/', function () {
    return view('welcome');
});


require __DIR__.'/auth.php';

Route::prefix('admin')->name('admin.')->group(function() {

    Route::get('/', DashbordController::class);

    Route::prefix('setting')->name('setting.')->group(function() {
        Route::get('/', [SettingController::class, 'index'])->name('index');
        Route::get('/create', [SettingController::class, 'create'])->name('create');
        Route::post('/store', [SettingController::class, 'storeOrUpdate'])->name('store');
    });

    Route::prefix('content')->name('content.')->group(function() {
        Route::resource('menu', MenuController::class);
        Route::resource('faq', FaqController::class);
        Route::resource('page', PageController::class);
        Route::resource('comment', CommentController::class);
        Route::get('comment/approved/{comment}', [CommentController::class, 'approved'])->name('comment.approved');
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
        Route::get('product-image/{product}', [ProductImageController::class, 'index'])->name('product-image.index');
        Route::get('product-image/{product}/store', [ProductImageController::class, 'create'])->name('product-image.create');
        Route::post('product-image/{product}/store', [ProductImageController::class, 'store'])->name('product-image.store');
        Route::get('product-image/{productImage}/{product}/edit', [ProductImageController::class, 'edit'])->name('product-image.edit');
        Route::put('product-image/{productImage}/{product}/edit', [ProductImageController::class, 'update'])->name('product-image.update');
        Route::delete('product-image/{productImage}/destroy', [ProductImageController::class, 'destroy'])->name('product-image.destroy');
        Route::resource('coupan', Coupan::class);
        Route::resource('delivery', DeliveryController::class);
        Route::resource('peyment', PeymentController::class);
    });

});


Route::prefix('customer')->name('customer.')->group(function() {
    Route::resource('address', AddressController::class);
});
