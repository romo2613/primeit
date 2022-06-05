<?php

use Src\BoundedContext\User\Infrastructure\Controllers\{
    CreateUserPostController,
    ListUsersGetController,
};


Route::get("users", ListUsersGetController::class);
Route::post("users", CreateUserPostController::class);
