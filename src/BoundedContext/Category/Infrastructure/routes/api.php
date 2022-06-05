<?php

use Src\BoundedContext\Product\Infrastructure\Controllers\{
    CreateCategoryPostController,
    ListCategoriesGetController,
};


Route::get("categories", ListCategoriesGetController::class);
Route::post("categories", CreateCategoryPostController::class);
