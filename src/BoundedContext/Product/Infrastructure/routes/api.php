<?php

use Src\BoundedContext\Product\Infrastructure\Controllers\{
    CreateProductPostController,
    ListProductsGetController,
};


Route::get("hx-products", ListProductsGetController::class);
Route::post("hx-products", CreateProductPostController::class);
