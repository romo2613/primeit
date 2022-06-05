<?php

use Src\BoundedContext\User\Application\Actions\ListUsers;
use Src\BoundedContext\User\Infrastructure\Persistence\Eloquent\UserRepository;
use Illuminate\Support\Facades\Artisan;
use Src\BoundedContext\User\Infrastructure\Persistence\Eloquent\UserModelFactory;

Artisan::command("primeit:list-Users", function (UserRepository $repository){

    $userResponse = (new ListUsers($repository))();

    $headers = ["Id", "User", "E-mail"];

    $this->table($headers, $userResponse->toArray());

});

Artisan::command("primeit:generate-users", function (){

    $UserFactory = new UserModelFactory(20);
    $UserFactory->create();

});
