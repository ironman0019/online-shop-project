<?php

use App\Http\Controllers\Admin\Content\AdsBannerController;
use App\Http\Controllers\Admin\Content\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\Content\FaqController;
use App\Http\Controllers\Admin\Content\MenuController;
use App\Http\Controllers\Admin\Content\PageController;
use App\Http\Controllers\Admin\Ticket\TicketController;
use App\Http\Controllers\Admin\Content\CommentController;
use App\Http\Controllers\Admin\Content\ShowCaseController;
use App\Http\Controllers\Admin\DashbordController;
use App\Http\Controllers\Admin\Market\BrandController;
use App\Http\Controllers\Admin\Market\CoupanController;
use App\Http\Controllers\Admin\Market\DeliveryController;
use App\Http\Controllers\Admin\Market\PeymentController;
use App\Http\Controllers\Admin\Market\ProductCategoryController;
use App\Http\Controllers\Admin\Market\ProductController;
use App\Http\Controllers\Admin\Market\ProductImageController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\Ticket\TicketAdminController;
use App\Http\Controllers\Admin\Ticket\TicketCategoryController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\CheckoutController;
use App\Http\Controllers\Home\Customer\AddressController;
use App\Http\Controllers\Home\Customer\OrderController as CustomerOrderController;
use App\Http\Controllers\Home\Customer\ProfileController as CustomerProfileController;
use App\Http\Controllers\Home\HomeControler;
use App\Http\Controllers\Home\OrderController;

Route::get('/', [HomeControler::class, 'index'])->name('home');
Route::get('product/{product}/{slug}', [HomeControler::class, 'product'])->name('product.show');

Route::middleware('auth')->group(function() {
    // cart routes
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart');
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/cart/decrease/{id}', [CartController::class, 'decreaseItem'])->name('cart.decrease');

    Route::post('/comment/create/{product}', [HomeControler::class, 'createComment'])->name('comment.create');

    // checkout routes
    Route::get('checkout', [CheckoutController::class, 'show'])->name('checkout');
    Route::post('checkout/apply-discount', [CheckoutController::class, 'applyDiscount'])->name('checkout.apply-discount');

    // order routes
    Route::post('order/store', [OrderController::class, 'orderStore'])->name('order.store');

    // user dashbord routes
    Route::resource('address', AddressController::class);


});


Route::middleware('auth')->prefix('profile')->name('profile.')->group(function() {
    Route::get('/my-orders', [CustomerOrderController::class, 'index'])->name('my-orders');

});


require __DIR__.'/auth.php';

Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function() {

    Route::get('/', DashbordController::class);

    Route::prefix('setting')->name('setting.')->group(function() {
        Route::get('/', [SettingController::class, 'index'])->name('index');
        Route::get('/create', [SettingController::class, 'create'])->name('create');
        Route::post('/store', [SettingController::class, 'storeOrUpdate'])->name('store');
    });

    Route::prefix('content')->name('content.')->group(function() {
        Route::resource('menu', MenuController::class);
        Route::resource('showcase', ShowCaseController::class);
        Route::resource('ads-banner', AdsBannerController::class);
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
        Route::get('/status/{ticket}', [TicketController::class, 'status'])->name('ticket.status');

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
        Route::resource('coupan', CoupanController::class);
        Route::resource('delivery', DeliveryController::class);
        Route::resource('peyment', PeymentController::class);
    });

});


Route::prefix('customer')->name('customer.')->group(function() {
    Route::resource('address', AddressController::class);
});
