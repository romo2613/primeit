<?php

use Src\BoundedContext\Category\Infrastructure\Controllers\{
    CreateCategoryPostController,
    ListCategoriesGetController,
};


Route::get("hx-categories", ListCategoriesGetController::class);
Route::post("hx-categories", CreateCategoryPostController::class);
