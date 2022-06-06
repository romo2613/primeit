<?php

use Src\BoundedContext\User\Infrastructure\Controllers\{
    CreateUserPostController,
    ListUsersGetController,
};


Route::get("hx-users", ListUsersGetController::class);
Route::post("hx-users", CreateUserPostController::class);
