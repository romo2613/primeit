<?php

use Src\BoundedContext\Product\Infrastructure\Controllers\{
    CreateProductPostController,
    ListProductsGetController,
};


Route::get("products", ListProductsGetController::class);
Route::post("products", CreateProductPostController::class);
