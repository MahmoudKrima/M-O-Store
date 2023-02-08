<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategorySizeController;
use App\Http\Controllers\Admin\ProductColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\products_props;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TagController;
use App\Models\Product_prop;
use App\Models\ProductColor;
use Illuminate\Support\Facades\Route;



Route::resource('/admins', AdminController::class);
Route::get('categories/{category_id}/sizes',[CategorySizeController::class,'index'])->name("categories.sizes");
Route::post('categories/{category_id}/sizes',[CategorySizeController::class,'store'])->name("categories.sizes.store");
Route::delete('categories/sizes/{id}',[CategorySizeController::class,'destroy'])->name("categories.sizes.destroy");
Route::resource('categories', CategoryController::class);
Route::resource('tag', TagController::class);
Route::resource('products', ProductController::class);
Route::resource('products_props', products_props::class);
Route::resource('products_colors', ProductColorController::class);
Route::resource('productimage', ProductImageController::class);
Route::resource('sliders', SliderController::class);


