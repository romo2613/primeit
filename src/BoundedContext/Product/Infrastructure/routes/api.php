<?php

use Src\BoundedContext\Product\Infrastructure\Controllers\{
    CreateProductPostController,
};



Route::post("products", CreateProductPostController::class);
