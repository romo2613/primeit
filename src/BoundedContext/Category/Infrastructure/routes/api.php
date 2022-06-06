<?php

use Src\BoundedContext\Category\Infrastructure\Controllers\{
    CreateCategoryPostController,
    ListCategoriesGetController,
};


Route::get("categories", ListCategoriesGetController::class);
Route::post("categories", CreateCategoryPostController::class);
