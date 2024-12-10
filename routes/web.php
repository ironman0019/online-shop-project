<?php

use App\Http\Controllers\Admin\Content\FaqController;
use App\Http\Controllers\Admin\Content\MenuController;
use App\Http\Controllers\Admin\Content\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


require __DIR__.'/auth.php';

Route::prefix('admin')->name('admin.')->group(function() {

    Route::prefix('content')->name('content.')->group(function() {
        Route::resource('menu', MenuController::class);
        Route::resource('faq', FaqController::class);
        Route::resource('page', PageController::class);
    });

});
